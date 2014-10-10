import urllib2
import json

#in the next sprint this code will use the facebook login and the database which will obviously alter most of the functions
accessToken = ""
url = "https://graph.facebook.com/199456403537988/feed?access_token=" + accessToken

def getPosts(url):
    req = urllib2.Request(url)
    response = urllib2.urlopen(req)
    posts = response.read()
    postsDecoded = json.loads(posts)
    posts = json.dumps(postsDecoded)
    return postsDecoded
    

def getMessages(posts):
    messages = []
    for i in range(len(posts["data"])):
        if "message" in posts["data"][i]:
            messages.append(posts["data"][i]["message"])
        else:
            messages.append(None)
    return messages

def getUsers(posts):
    users = []
    for i in range(len(posts["data"])):
        users.append(posts["data"][i]["from"]["id"])
    return users

def getComments(posts):
    comments = []
    for i in range(len(posts["data"])):
        if "comments" in posts["data"][i]:
            for j in range(len(posts["data"][i]["comments"]["data"])):
                comments.append(posts["data"][i]["comments"]["data"][j]["message"])
        else:
            comments.append(None)
    return comments

def getIds(posts):
    ids = []
    for i in range(len(posts["data"])):
        ids.append(posts["data"][i]["id"])
    return ids

