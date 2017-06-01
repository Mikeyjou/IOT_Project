import socket
import RPi.GPIO as GPIO
from getLight import getLight
from motorController import motorController


HOST='127.0.0.1'
PORT=50007
GPIO.setmode(GPIO.BOARD)
LED_PIN = 12
GPIO.setwarnings(False)
GPIO.setup(LED_PIN, GPIO.OUT)
s= socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.bind((HOST,PORT))
s.listen(1)

light = getLight()
motor = motorController()


print("Start running socket server...\n\n")
while 1:
    conn,addr=s.accept()
    print ('Connected by',addr)
    while 1:
        data=conn.recv(1024)
        if data != "":
            print("Receive from client: " + data)

        if data == "commands":
            conn.sendall("\n'0' : Get the Lux of environment.\n'1' : Start/Stop the motor\n")
        elif data == "0":
            lux = light.ReadADC(0)
            print("Lux of enviroment: " + str(lux))
            conn.sendall("Lux of enviroment: " + str(lux))
        elif data == "1":
            time = 10
            motor.start(time)
            conn.sendall("Start running motor for " + str(time) + 'seconds.')
        else:
            conn.sendall("Not a valid input!")

conn.close()
