from gtts import gTTS
from time import sleep
import os
import pyglet

class textToSpeech():
    def __init__(self):
        self.filename = 'tmp/temp.mp3'
        
    def play(self,string):
        tts = gTTS(text=string, lang='zh-tw')
        tts.save(self.filename)

        music = pyglet.media.load(self.filename, streaming=False)
        music.play()

        sleep(music.duration) #prevent from killing
        os.remove(self.filename) #remove temperory file

if __name__ == "__main__":
    textToSpeech().play('1000')