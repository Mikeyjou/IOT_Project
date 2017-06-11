# -*- coding: utf-8 -*-
from googleSpeech import googleSpeech
from turing123 import turing123
from textToSpeech import textToSpeech
import threading
import time

class speech:
    def __init__(self):
        self._speech = googleSpeech()
        self._turing = turing123()
        self._text2Speech = textToSpeech()
        thread = threading.Thread(target=self.run, args=())
        thread.daemon = True                            # Daemonize thread
        thread.start()                                  # Start the execution

    def run(self):
        while True:
            alternatives = self._speech.speechToText()
            print(alternatives[0].transcript)
            self._text2Speech.play(self._turing.chatResult(alternatives[0].transcript))
            time.sleep(1)


if __name__=='__main__':
    speech()
    time.sleep(100)