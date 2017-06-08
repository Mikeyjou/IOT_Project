import io
import os

# Imports the Google Cloud client library
from google.cloud import speech
from pydub import AudioSegment
import pydub

# save audio
import pyaudio
import wave
class googleSpeech:
    def __init__(self):
        self.speech_client = speech.Client()
        self.alternatives = None

    # 轉成FLAC格式
    def convertToFlac(self, filename, output):
        # K:\IOT_Project\python\output.wav
        pydub.AudioSegment.ffmpeg = "ffmpeg-3.3.1/ffmpeg"
        song = AudioSegment.from_wav(filename)
        song.export(output, format = "flac")

    # 儲存音源擋
    def saveAudio(self):
        CHUNK = 512
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

        self.convertToFlac(WAVE_OUTPUT_FILENAME, 'tmp.flac')

    # 連接google speech API
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
        try:
            # Detects speech in the audio file
            self.alternatives = sample.recognize('zh-tw')

            # for alternative in self.alternatives:
            #     print('Transcript: {}'.format(alternative.transcript))
            #     print('confidence: ' + str(alternative.confidence))
        except ValueError:
            print("No results returned from the Speech API.")

    # 取得google speech結果
    def getAlternatives(self):
        return self.alternatives

    # 判斷是否包含關鍵字
    def isContain(self, keyword, speech):
        for word in speech:
            if keyword in word:
                return True
        return False

    # 語音轉文字
    def speechToText(self):
        self.saveAudio()
        self.speechAPI()
        return self.getAlternatives()

if __name__ == "__main__":
    googleSpeech = googleSpeech()


