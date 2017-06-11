# -*- coding: utf-8 -*-
import urllib.request
import requests
import sys
import json
import codecs
import threading
import time 
class turing123:
    def __init__(self):
        # 我們的API
        # self.API_KEY = '313c6c419bb649189e65ad8651afe6e8'
        # 皓予的API
        self.API_KEY = '07a06989b8cf457faaece0101cacb1a2'
        self.raw_TULINURL = "http://www.tuling123.com/openapi/api?key=%s&info=" % self.API_KEY
        self.reader = codecs.getreader("utf-8")

    def result(self):
        index = 0
        isFinish = False
        while True:
            queryStr = input("me:")
            TULINURL = "%s%s" % (self.raw_TULINURL,urllib.request.quote(queryStr))
            r = requests.get(TULINURL)
            
            hjson = json.loads(r.content.decode('utf-8'))
            length=len(hjson.keys())
            content=hjson['text']
            # with open('chatResult.txt', 'w', encoding = 'utf8') as file:
            #     file.write(content)

            print(content.encode(sys.stdin.encoding, "replace").decode(sys.stdin.encoding))
            time.sleep(1)
            # if length==3:
            #     return 'robots:' +content+hjson['url']
            # elif length==2:
            #     return 'robots:' +content

    def chatResult(self, queryStr):
        TULINURL = "%s%s" % (self.raw_TULINURL,urllib.request.quote(queryStr))
        r = requests.get(TULINURL)
        hjson = json.loads(r.content.decode('utf-8'))
        length=len(hjson.keys())
        content=hjson['text']
        with open('chatResult.txt', 'w', encoding = 'utf8') as file:
            file.write(content)

        return content

            
if __name__=='__main__':
    turing = turing123()
    time.sleep(100)
