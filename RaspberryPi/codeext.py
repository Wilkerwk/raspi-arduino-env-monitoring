from ubidots import ApiClient
from readSerial import getData
import Adafruit_DHT as dht
import RPi.GPIO as GPIO
import MySQLdb
import random
import time
#GPIO.setmode(GPIO.BOARD)
#GPIO.setup(7, GPIO.IN) # 7 = input sensor DHT-22

# VARIABEL: MYSQL DATABASE
host = 'localhost'
username = 'root'
password = 'root'
database = 'doaIbuProject'

# VARIABEL: UBIDOTS CLOUD SERVICE
tokenAPI = 'fXoR0JSy20Qs0mGb2M5bsZdTDHp9MA'
tokenVar1 = '574fa59e7625424c226c58dd' #temperature (DHT22)
tokenVar2 = '574fa5ca7625424df9809460' #humidity (DHT22)
tokenVar3 = '57624cf27625423c41778fcb' #gas1 = MQ2 flamable gas sensor
tokenVar4 = '57624cfc7625423c5f8ec690' #gas2 = MQ7 CO gas sensor

#VARIABEL: MAIN FUNCTION
maxIterasi = 10
DHTpinInput = 4
waktuJeda = 5 #dalam detik


##CONNECT DATABASE
try:
	db = MySQLdb.connect(host, username, password, database)
	cursor = db.cursor()
except:
	print 'ERROR! cant connect to local database'


##CONFIGURE UBIDOTS API OBJECT
api = ApiClient(token=tokenAPI)

try:
	variable1 = api.get_variable(tokenVar1)
	variable2 = api.get_variable(tokenVar2)
	variable3 = api.get_variable(tokenVar3)
	variable4 = api.get_variable(tokenVar4)
except:
    	print "ERROR! at 'Configure Ubidots API'"


##SEND TO UBIDOTS
def send(t, h, g1, g2):
	try:
        	variable1.save_value({'value': t})
        	variable2.save_value({'value': h})
		variable3.save_value({'value': g1})
		variable4.save_value({'value': g2})
	except:
		print 'ERROR! cant send to Ubidots'


##INSERT DATA TO MYSQL
def insert(t, h, g1, g2):
	try:
		temp =  t
		humid = h
		gas1 = g1
		gas2 = g2
		cursor.execute("insert into sensorDataExt (temperature, humidity, gas1, gas2) values ('%lf', '%lf', '%lf', '%lf')" % (temp, humid, gas1, gas2))
		db.commit()
	except:
		db.rollback()
		print 'ERROR! cant send to local database'


##MAIN || READ DATA FROM SENSOR
getData() #ini untuk kalibrasi ajahh
cursor.execute('delete from sensorDataExt')
i = 0
notInitialLoop = False
while(True):
	if i >= maxIterasi or notInitialLoop:
		try:
			cursor.execute("delete from sensorDataExt limit 1")
			db.commit()
			notInitialLoop = True
		except:
			db.rollback()
			print "Database gagal dihapus. Sudah mencapai limit"
	try:
		h, t = dht.read_retry(dht.DHT22, DHTpinInput)
		g1, g2 = getData().split(";")		
		t = float("%.1f" % t)
		h = float("%.1f" % h)
		g1 = float(g1)
		g2 = float(g2)

		print 'Temp=',t,', Humidity=',h,', Gas1=',g1,', Gas2=',g2
	        send(t,h,g1,g2)
       	 	insert(t,h,g1,g2)
		time.sleep(waktuJeda)
		i= i+1
	except:
        	print "ERROR"
