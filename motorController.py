import time
import RPi.GPIO as GPIO

class motorController:

    def __init__(self):
        GPIO.setmode(GPIO.BOARD)
        self.MotorPin = 12
        GPIO.setup(self.MotorPin,GPIO.OUT)

        self.pwm_motor = GPIO.PWM(self.MotorPin, 50)
        self.isRunning = False


    def start(self, runningTime):
        self.pwm_motor.start(7.5)
        t0 = time.time()
        while time.time() - t0 < runningTime:
            for a in range(100):
                self.pwm_motor.ChangeDutyCycle(4)
                time.sleep(0.01)
                # print a
    #       pwm_motor.stop()
            for b in range(100):
                self.pwm_motor.ChangeDutyCycle(7.5)
                time.sleep(0.01)
                # print b
    #       pwm_motor.stop()
            for c in range(100):
                self.pwm_motor.ChangeDutyCycle(11)
                time.sleep(0.01)
                # print c
    #       pwm_motor.stop()
            for d in range(100):
                self.pwm_motor.ChangeDutyCycle(7.5)
                time.sleep(0.01)
                # print d
        self.pwm_motor.stop()

if __name__ == "__main__":
    motor = motorController()
    motor.start()