#!/usr/bin/env python2.7
import sys
import requests #pip install requests
import base64
import hashlib
import random
import socket
from bs4 import BeautifulSoup
from datetime import datetime

OK, CORRUPT, MUMBLE, DOWN, CHECKER_ERROR = 101, 102, 103, 104, 110
link = 'localhost:5000'.split(':')
COMMAND, IP, PORT, ID_FLAG, FLAG = 'put', link[0], link[1], 1, 'flag'

P_REGISTRATION = "http://{}:{}/index.php?r=site/registration"
P_LOGIN = "http://{}:{}/index.php?r=site/login"
P_MAIN = "http://{}:{}/index.php?r=site/index"
P_PROFILE = "http://{}:{}/index.php?r=site/profile"

#P_REGISTRATION = "http://{}:{}/matrix.ctf/index.php?r=site/registration"
#P_LOGIN = "http://{}:{}/matrix.ctf/index.php?r=site/login"
#P_MAIN = "http://{}:{}/matrix.ctf/index.php?r=site/index"
#P_PROFILE = "http://{}:{}/matrix.ctf/index.php?r=site/profile"


def info(session):
    #what am i created for
    return OK, 'The best people search service', 'My Author is Morpheus'


def check(session):
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    result = sock.connect_ex((IP, int(PORT)))
    sock.close()
    if result != 0:
        return DOWN, 'service is not responding on this port'
    test = requests.Session()
    text = put(test, 0, 'test')
    if(text[0] == OK):
        req = get(test, 0, text[3], text[2], pass_sha(text[2]))
        return req
    else:
        return text[0], text[1]
    return OK, 'Success'


def get(session, id_flag, flag, login, password):    
    flag_profile = ''
    data = ({"Users[nick]" : login, "Users[password]" : password })
    LOGIN = session.post(P_LOGIN.format(IP, PORT), data=data)
    if('Authorisation Error.' in LOGIN.text):
        return CORRUPT, 'Authorisation Error', login, password
    PROFILE = session.post(P_PROFILE.format(IP, PORT), cookies=session.cookies)
    html = BeautifulSoup(PROFILE.text, "lxml")
    for incident in html('div', {'class': 'form-group'}):
        if (incident.find('div', {'class': 'col-sm-4'}).find('h3')).text == 'Info:':
            flag_profile = incident.find('div', {'class': 'col-sm-6'}).find('h3').text
    if flag_profile != '':
        if(flag_profile == flag):
            return OK, 'Success'
        else:
            return CORRUPT, 'Flag does not match',  flag, flag_profile
    else:
        return CORRUPT, 'Field not found on page', login, password


def put(session, id_flag, flag):
    name = openAllFile('first-names.json')
    last = openAllFile('last-names.json')
    subemail = ['mail.ru','gmail.com','ctf.omgtu','example.com','ya.ru','bk.ru','inbox.ru','list.ru','xakep.ru']
    domen = ['ru','com','org','list','ctf','omgtu','run']
    nameP = random.choice(name)
    lastP = random.choice(last)
    nick = nameP+'_'+lastP
    password = pass_sha(nick)
    email = lastP+'@'+random.choice(subemail)
    if(id_flag != 0):
        info = flag
    else:
        info = 'I need here random text'
    site = nameP+'.'+random.choice(domen)
    #data for registration
    data = ({"Users[nick]": nick, "Users[password]": password, "Users[email]": email, "Users[info]": info, "Users[site]": site})
    registration = session.post(P_REGISTRATION.format(IP, PORT), data=data)
    if(id_flag == 0):
        return OK, 'Success', nick, info
    PROFILE = session.post(P_PROFILE.format(IP, PORT), cookies=session.cookies)
    html = BeautifulSoup(PROFILE.text, "lxml")
    flag_profile = ''
    for incident in html('div', {'class': 'form-group'}):
        if (incident.find('div', {'class': 'col-sm-4'}).find('h3')).text == 'Info:':
            flag_profile = incident.find('div', {'class': 'col-sm-6'}).find('h3').text
    if flag_profile != '':
        if(flag_profile == flag):
            save_flag(id_flag, flag, nick)
            return OK, 'Success'
        else:
            return MUMBLE, 'Wrong flag set'
    else:
        return MUMBLE, 'Registration failed'

def openAllFile(text):
    f = open(text, 'r')
    text = f.read()
    f.close()
    return text.replace('"','').replace(',','').split('\n')

def log(text):
   now = datetime.now()
   f = open('log.log', 'a')
   f.write(IP+':'+ PORT+' ' + datetime.strftime(datetime.now(), "%d.%m.%Y %H:%M:%S") + ' ' + str(text) + '\n')
   f.close()

def save_flag(id_flag, flag, nick):
   f = open('flag.log', 'a')
   f.write(IP+':'+ PORT+' ' + id_flag + ' ' + nick + ' ' + flag + '\n')
   f.close()

def pass_sha(text):
    text = text+base64.b64encode(text)[:-2]
    text = hashlib.sha1(text).hexdigest()[7:-7]
    return text

if __name__ == "__main__":
    if(len(sys.argv)>1):
        COMMAND = sys.argv[1]
    if(len(sys.argv)>2):
        temp = sys.argv[2].split(':')
        IP = temp[0]
        if(len(temp)>1):
            PORT = temp[1]
    if(len(sys.argv)>3):
        ID_FLAG = sys.argv[3]
    if(len(sys.argv)>4):
        FLAG = sys.argv[4]

IP = IP.replace('HeadHunter.','')
#print IP, PORT, COMMAND, ID_FLAG, FLAG

data = ''
f = open('flag.log', 'a')
f.close()
fulltext = ''
f = open('flag.log', 'r')
for line in f:
    fulltext += line
    if(line != ''):
        if((IP+':'+ PORT+' ' in line) and (line.split(' ')[1] == ID_FLAG)):
            data = line
f.close()

session = requests.Session()
if(COMMAND == 'put'):
    if(data == ''):
        result = put(session, ID_FLAG, FLAG)
    else:
        result = CHECKER_ERROR, 'Flag with such id '+ str(ID_FLAG)+' already exists', IP+':'+ PORT
if(COMMAND == 'get'):
    if(data != ''):
        data = data.split(' ')
        result = get(session, ID_FLAG, FLAG, data[2], pass_sha(data[2]))
    elif(fulltext == ''):
        result = CHECKER_ERROR, 'Flags file is empty'
    else:
        result = CHECKER_ERROR, 'Flag with such id '+ str(ID_FLAG)+' not found', IP+':'+ PORT
if(COMMAND == 'check'):
    result = check(session)
if(COMMAND == 'info'):
    result = info(session)
log(result)

#print(result[1])
#sys.exit(result[0])
if(result[0]!=101):
    print (result[1])
sys.exit(result[0])



