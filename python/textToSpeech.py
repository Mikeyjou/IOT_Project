# -*- coding: utf-8 -*-
from gtts import gTTS
from time import sleep
import os
import pygame
class textToSpeech():
    def __init__(self):
        self.filename = 'tmp/temp.mp3'
        
    # 開始google小姐
    def play(self,string):
        tts = gTTS(text=string, lang='zh-tw')
        tts.save(self.filename)

        pygame.mixer.init()
        pygame.mixer.music.load(self.filename)
        pygame.mixer.music.play()
        while pygame.mixer.music.get_busy(): 
            pygame.time.Clock().tick(10)

if __name__ == "__main__":
    textToSpeech().play('1000')