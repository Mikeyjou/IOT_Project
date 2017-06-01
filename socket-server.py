import socket
import commands
import RPi.GPIO as GPIO
HOST='192.168.0.106'
PORT=50007
GPIO.setmode(GPIO.BOARD)
LED_PIN = 12
GPIO.setwarnings(False)
GPIO.setup(LED_PIN, GPIO.OUT)
s= socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.bind((HOST,PORT))
s.listen(1)
while 1:
    conn,addr=s.accept()
    print ('Connected by',addr)
    while 1:
        data=conn.recv(1024)
        if data == "On":
            GPIO.output(LED_PIN, GPIO.HIGH)
            conn.sendall("On")
        elif data == "Off":
            GPIO.output(LED_PIN, GPIO.LOW)
            conn.sendall("Off")
conn.close()
