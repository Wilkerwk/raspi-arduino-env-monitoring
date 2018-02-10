def callback(message):
	print(message)

while True:
	h,t = dht.read_retry(dht.DHT22, 4)
	pubnub.publish('tempeon', {
		'columns': [
		['x', time.time()],
		['temperature_celcius', t]
		]

		})
	pubnub.publish('humeon', {
		'columns': [
		['humidity', h]
		[

		})
