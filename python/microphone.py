Led = 13
buttonpin = 3
val = 0


def setup():
    pinMode(Led,OUTPUT)
    pinMode(buttonpin,INPUT)

def loop()
    val=digitalRead(buttonpin)
    if val==HIGH:
        digitalWrite(Led,HIGH)
    else:
        digitalWrite(Led,LOW)

