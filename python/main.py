#coding=utf-8  
import pymysql.cursors
import threading
import sys
import time
import datetime
from textToSpeech import textToSpeech
from LDR_Controller import LDR_Controller
from motor_Controller import motor_Controller

def initRaspberry():
    return (motor_Controller(), LDR_Controller())

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

def closeDB(conn):
    conn.close()

def getLatestScore(conn):

    userName = '123'

    with conn.cursor() as cursor:
        # Read a single record
        sql = "SELECT `value` FROM `iot_value` WHERE `owner`=%s"
        cursor.execute(sql, (userName,))
        result = cursor.fetchall()
        return result[-1]['value']

# 背景重複取得問卷分數
def repeatedlyExecute(conn):

    t = threading.Timer(10.0, repeatedlyExecute, args=(conn,))
    t.start()
    print ("分數為: " + getLatestScore(conn))

# 取得治療時間
def countThreatTime(score):
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

def isNeedToStart(threat, now, offset):
    if threat['halfDay'] == now['halfDay']:
        # offset分鐘前就預先開始啟動
        if threat['hour'] * 60 + threat['min'] < now['hour'] * 60 + now['min'] - offset:
            return True
        else:
            return False
    else:
        return False

gTTS = textToSpeech()
motor, ldr = initRaspberry()
connection = initDB()
score = getLatestScore(connection)
threatTimeStruct = countThreatTime(75)

if threatTimeStruct != None:
    print('強光治療時間為: 早上' + threatTimeStruct['hour'] + '點' + threatTimeStruct['min'] + '分')

nowStruct = getNow()
if nowStruct != None:
    if nowStruct['halfDay'] == 'AM':
        print('現在時間為: 早上' + nowStruct['hour'] + '點' + nowStruct['min'] + '分')
    elif nowStruct['halfDay'] == 'PM':
        print('現在時間為: 下午' + nowStruct['hour'] + '點' + nowStruct['min'] + '分')

# 5分鐘前開啟百葉窗
while isNeedToStart(threatTimeStruct, nowStruct, 5):
    gTTS.play("治療開始前5分鐘，請開始準備！")
    print("治療開始前5分鐘，請開始準備！")
    motor.start(30)
    while isNeedToStart(threatTimeStruct, getNow(), 0):
        lux = str(ldr.getLux())
        print("時間到了...")
        print("目前光照強度為:" + lux)
        gTTS.play("時間到，目前光照強度為" + lux)
        
        if lux < 10000:
            print("戶外光照強度不足，請於室內接受治療！")
            print("開始啟動光照儀器...")
            gTTS.play("戶外光照強度不足，請於室內接受治療30分鐘，開始啟動光照儀器")
        else:
            print("戶外光照強度充足，請外出曬太陽！")
            gTTS.play("戶外光照強度充足，請外出曬太陽")

# t = threading.Timer(10.0, repeatedlyExecute, args=(connection,))
# t.start() 
