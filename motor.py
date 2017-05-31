import time
import RPi.GPIO as GPIO
 
GPIO.setmode(GPIO.BOARD)
MotorPin=12
GPIO.setup(MotorPin,GPIO.OUT)
pwm_motor = GPIO.PWM(MotorPin, 50)
pwm_motor.start(7.5)
 
while True:
        for a in range(100):
                pwm_motor.ChangeDutyCycle(4)
                time.sleep(0.01)
                print a
#       pwm_motor.stop()
        for b in range(100):
                pwm_motor.ChangeDutyCycle(7.5)
                time.sleep(0.01)
                print b
#       pwm_motor.stop()
        for c in range(100):
                pwm_motor.ChangeDutyCycle(11)
                time.sleep(0.01)
                print c
#       pwm_motor.stop()
        for d in range(100):
                pwm_motor.ChangeDutyCycle(7.5)
                time.sleep(0.01)
                print d

