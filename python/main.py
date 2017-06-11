#coding=utf-8  
import pymysql.cursors
import threading
import sys
import time
import datetime
import RPi.GPIO as GPIO
import time
from textToSpeech import textToSpeech
from LDR_Controller import LDR_Controller
from motor_Controller import motor_Controller
from googleSpeech import googleSpeech
from turing123 import turing123
score = 0

def initRaspberry():
    return (motor_Controller(30), LDR_Controller())

def initDB():
    # Connect to the database
    connection = pymysql.connect(host='140.138.152.207',
                                 user='frank85',
                                 password='ak800730',
                                 db='atm',
                                 charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)

    
    # connection is not autocommit by default. So you must commit to save
    # your changes.
    connection.commit()
    return connection

# 關閉資料庫連接
def closeDB(conn):
    conn.close()

# 開啟燈泡
def startLight():
    GPIO.setmode(GPIO.BOARD)
    GPIO.setup(18, GPIO.OUT)
    GPIO.output(18,GPIO.LOW)

# 關閉燈泡
def closeLight():
    GPIO.setmode(GPIO.BOARD)
    GPIO.setup(18, GPIO.OUT)
    GPIO.output(18,GPIO.HIGH)

# 取得最新問卷分數
def getLatestScore(conn):

    userName = '123'

    with conn.cursor() as cursor:
        # Read a single record
        sql = "SELECT `value` FROM `iot_value` WHERE `owner`=%s"
        cursor.execute(sql, (userName,))
        result = cursor.fetchall()
        global score
        score = result[-1]['value']
        print ("分數為: " + str(score))
        return result[-1]['value']

# 背景重複取得問卷分數
def repeatedlyExecute(conn):
    thread = threading.Thread(target=getLatestScore, args=(conn,))
    thread.daemon = True                            # Daemonize thread
    thread.start()                                  # Start the execution

# 取得治療時間
def countTreatTime(score):
    mins = [0,15,30,45]
    if score < 23 or score > 78:
        return None
    else:
        time = int((score - 23) / 4)
        treat = 8.25 - (time * 0.25)

        timeArr = {'hour': str(int(treat)), 'min': str(mins[int((treat-int(treat)) / 0.25)]), 'halfDay' : 'AM'}
        return (timeArr)

# 取得現在時間
def getNow():
    date = datetime.datetime.now()
    timeArr = {'hour': date.strftime("%I"), 'min': date.strftime("%M"), 'halfDay' : date.strftime("%p")}
    # print(datetime.datetime.now().strftime("%I:%M%p"))
    return timeArr

# 判斷是否需要開始治療
def isNeedToStart(threat, now, offset):
    if threat['halfDay'] == now['halfDay']:
        # offset分鐘前就預先開始啟動
        if int(threat['hour']) * 60 + int(threat['min']) < int(now['hour']) * 60 + int(now['min']) - offset:
            return True
        else:
            return False
    else:
        return False

googleSpeech = googleSpeech()
# speechThread = threading.Thread(target=googleSpeech.speech2Text, args=())
# speechThread.daemon = True                            # Daemonize thread
# speechThread.start()                                  # Start the execution
turing = turing123()
speechConverter = textToSpeech()
motor, ldr = initRaspberry()
connection = initDB()
score = getLatestScore(connection)
threatTimeStruct = countTreatTime(score)

# 判斷是否完成判斷光度
isFinish = False
# 判斷是否準備好接受治療
isReady = False

threatTimeStruct['hour'] = str(2)
threatTimeStruct['min'] = str(0)
threatTimeStruct['halfDay'] = 'PM'

if threatTimeStruct != None:
    print('強光治療時間為: 早上' + threatTimeStruct['hour'] + '點' + threatTimeStruct['min'] + '分')

nowStruct = getNow()
if nowStruct != None:
    if nowStruct['halfDay'] == 'AM':
        print('現在時間為: 早上' + nowStruct['hour'] + '點' + nowStruct['min'] + '分')
    elif nowStruct['halfDay'] == 'PM':
        print('現在時間為: 下午' + nowStruct['hour'] + '點' + nowStruct['min'] + '分')


while isNeedToStart(threatTimeStruct, getNow(), 10):
    speechConverter.play("早安")
    alternatives = googleSpeech.speechToText()
    
    if googleSpeech.isContain("早", alternatives):
        speechConverter.play("請問10分鐘後可以接受治療嗎?")
        alternatives = googleSpeech.speechToText()
        if googleSpeech.isContain("不可以", alternatives):
            speechConverter.play("療程幫您延後")
        elif googleSpeech.isContain("可以", alternatives):
            isReady = True
            break

# 5分鐘前開啟百葉窗
while isNeedToStart(threatTimeStruct, getNow(), 5) and isFinish == False and isReady == True:
    speechConverter.play("治療開始前5分鐘，請開始準備，正在開啟百葉窗！")
    print("治療開始前5分鐘，請開始準備，正在開啟百葉窗！")
    motor.start(8)
    while isNeedToStart(threatTimeStruct, getNow(), 0) and isFinish == False:
        lux = int(ldr.getLux())
        print("時間到了...")
        print("目前光照強度為:" + str(lux))
        speechConverter.play("時間到，目前光照強度為" + str(lux))
        
        if lux < 10000:
            print("戶外光照強度不足，請於室內接受治療！")
            print("開始啟動光照儀器...")
            speechConverter.play("戶外光照強度不足，請於室內接受治療30分鐘，開始啟動光照儀器")
            startLight()
            isFinish = True
        else:
            print("戶外光照強度充足，請外出曬太陽！")
            speechConverter.play("戶外光照強度充足，請外出曬太陽")
            isFinish = True


time.sleep(5) 
while isNeedToStart(threatTimeStruct, getNow(), -30):
    closeLight()
    speechConverter.play("光照治療結束，請再用網站或APP確認資料")
    break
