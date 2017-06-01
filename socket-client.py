#!/usr/bin/python
import socket

HOST='127.0.0.1'
PORT=50007
s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.connect((HOST,PORT))  
print("Start running socket client...\n\n")
print("Input 'commands' to see the function list!")
while 1:
    cmd=raw_input("Please input cmd to server: ")     
    s.sendall(cmd)
    data=s.recv(1024)
    print("Receive from server: " + data) 
s.close()