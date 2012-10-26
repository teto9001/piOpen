import RPi.GPIO as GPIO
import time

GPIO.cleanup()
GPIO.setmode(GPIO.BOARD)
for i in range(12,13):
	print str(i)
	GPIO.setup(i, GPIO.OUT)
	GPIO.output(i, True)
	time.sleep(2)
	GPIO.output(i,False)

GPIO.cleanup()
