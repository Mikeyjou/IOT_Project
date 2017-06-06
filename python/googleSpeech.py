import io
import os

# Imports the Google Cloud client library
from google.cloud import speech
from pydub import AudioSegment

# save audio
import pyaudio
import wave
class googleSpeech:
    def __init__(self):
        self.speech_client = speech.Client()

    def convertToFlac(self, filename, output):
        # K:\IOT_Project\python\output.wav
        song = AudioSegment.from_wav(filename)
        song.export(output, format = "flac")

    def saveAudio(self):
        CHUNK = 1024
        FORMAT = pyaudio.paInt16
        CHANNELS = 1
        RATE = 44100
        RECORD_SECONDS = 5
        WAVE_OUTPUT_FILENAME = "tmp.wav"

        p = pyaudio.PyAudio()

        stream = p.open(format=FORMAT,
                        channels=CHANNELS,
                        rate=RATE,
                        input=True,
                        frames_per_buffer=CHUNK)

        print("* recording")

        frames = []

        for i in range(0, int(RATE / CHUNK * RECORD_SECONDS)):
            data = stream.read(CHUNK)
            frames.append(data)

        print("* done recording")

        stream.stop_stream()
        stream.close()
        p.terminate()

        wf = wave.open(WAVE_OUTPUT_FILENAME, 'wb')
        wf.setnchannels(CHANNELS)
        wf.setsampwidth(p.get_sample_size(FORMAT))
        wf.setframerate(RATE)
        wf.writeframes(b''.join(frames))
        wf.close()

        convertToFlac(WAVE_OUTPUT_FILENAME, 'tmp.flac')

    def speechAPI(self):
        # The name of the audio file to transcribe
        file_name = 'tmp.flac'

        # Loads the audio into memory
        with io.open(file_name, 'rb') as audio_file:
            content = audio_file.read()
            sample = self.speech_client.sample(
                content,
                source_uri=None,
                encoding=speech.Encoding.FLAC,
                sample_rate_hertz=44100)

        # Detects speech in the audio file
        alternatives = sample.recognize('zh-tw')

        for alternative in alternatives:
            print('Transcript: {}'.format(alternative.transcript))
            print('confidence: ' + str(alternative.confidence))

    def speechToText(self):
        self.saveAudio()
        self.convertToFlac()
        self.speechAPI()
        
if __name__ == "__main__":
    # Instantiates a client
    speech_client = speech.Client()
    saveAudio()
    speechAPI()

