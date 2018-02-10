import os
import time
import sys
from pubnub import Pubnub
import Adafruit_DHT as dht
pubnub = Pubnub(publish_key='pub-c-2ebb940a-7849-4708-a64b-233543b328e6', subscribe_key='sub-c-061fafb8-2ba0-11e6-9f24-02ee2ddab7fe')
