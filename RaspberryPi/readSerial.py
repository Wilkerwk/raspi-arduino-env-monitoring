import serial
ser = serial.Serial('/dev/ttyACM0', 9600)

def getData():
	return ser.readline()
