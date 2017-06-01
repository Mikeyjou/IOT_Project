import time
import RPi.GPIO as GPIO

class motorController:

    def __init__(self):
        GPIO.setmode(GPIO.BOARD)
        self.MotorPin = 12
        GPIO.setup(self.MotorPin,GPIO.OUT)

        self.pwm_motor = GPIO.PWM(self.MotorPin, 50)
    
    def main(self):
        self.pwm_motor.start(7.5)
     
        while True:
            for a in range(100):
                self.pwm_motor.ChangeDutyCycle(4)
                time.sleep(0.01)
                print a
    #       pwm_motor.stop()
            for b in range(100):
                self.pwm_motor.ChangeDutyCycle(7.5)
                time.sleep(0.01)
                print b
    #       pwm_motor.stop()
            for c in range(100):
                self.pwm_motor.ChangeDutyCycle(11)
                time.sleep(0.01)
                print c
    #       pwm_motor.stop()
            for d in range(100):
                self.pwm_motor.ChangeDutyCycle(7.5)
                time.sleep(0.01)
                print d

if __name__ == "__main__":
    motor = motorController()
    motor.main()