import urllib2
import json
import string
import re
import os
import psycopg2
import urlparse
import datetime

#in the next sprint this code will use the facebook login and the database which will obviously alter most of the functions
accessToken = "397910377029373|XrTlZSB0o3cORQqrjGYBCVeTB2M"
url = "https://graph.facebook.com/199456403537988/feed?limit=25&access_token=" + accessToken

def getPosts(url):
    req = urllib2.Request(url)
    response = urllib2.urlopen(req)
    posts = response.read()
    postsDecoded = json.loads(posts)
    posts = json.dumps(postsDecoded)
    return postsDecoded["data"]

def getPost(posts,i):
    return posts["data"][i]

def getUser(post):
    return post["from"]["id"]

def getPostID(post):
    return post["id"]

def getDate(post):
    return post["created_time"]

def getMessage(post):
    message = ""
    if "message" in post:
        return post["message"].replace("'","")      
    else:
        return "No Description"

def getPrice(message):
    try:
        price = re.search("([$]\d+|[$]\d+\.\d+)",message)
        if price!=None:
            return int(price.group()[1:])
        else:
            return -1
    except:
        return ()

def isSold(post):
    if "comments" in post:
        comment = ""
        for i in range(len(post["comments"]["data"])):
            if "message" in post["comments"]["data"][i]:
                comment = post["comments"]["data"][i]["message"]
                if re.match("(s|S)old",comment)!=None:
                    return "Sold"
    return 0


            
class Item:
    def __init__(self,post):
        self.itemid = "\'"+ getPostID(post)+"\'"
        self.itemname = "\'test\'"
        self.itemdescription = "\'"+getMessage(post) + "\'"
        self.itemprice = getPrice(self.itemdescription)
        self.itemstatus = "\'"+getStatus(post)+"\'"
        self.startdate = "\'"+getDate(post)+"\'"
        u = datetime.date.today()
        d = datetime.timedelta(days=7)
        self.enddate = "\'"+str(u+d)+"\'"
        self.seller = "\'"+getUser(post)+"\'"

def store(item, cur):
    query = 'INSERT INTO \"Items\" (itemname,itemprice,itemstatus,startdate,enddate,seller, itemid, itemdescription) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)'%(item.itemname,item.itemprice,item.itemstatus,item.startdate,item.enddate,item.seller,item.itemid,item.itemdescription)
    cur.execute(query)
    

def getStatus(post):
    try:
        message = getMessage(post)
        print message
        if re.match("(a|A)(anyone|any one).*((s|S)elling|.*to sell).*?",message):
            print "case 1"
            return "Looking to buy"
        elif re.match("(s|S)elling",message):
            print "case 2"
            return "For sale"
        elif re.match("(a|A)(anyone|any one).*((b|b)uying|.*to buy).*?",message):
            print "case 3"
            return "For sale"
        elif re.match("(a|A)(anyone|any one) (l|L)ooking",message):
            print "case 4"
            return "For sale"
        elif re.match("(L|l)ooking",message):
            print "case 5"
            return "Looking to buy"
        else:
            print "case 6"
            return "For sale"
    except:
        return "For sale"


conn = psycopg2.connect(
    database="d9cg95qfnscd29",
    user="prqorunfzkghvr",
    password="jc2hyAmXE23mp9iS2wGn7CD6zU",
    host="ec2-184-73-194-196.compute-1.amazonaws.com",
    port="5432"
    )
    
    

posts = getPosts(url)
post_arr = []
cursor = conn.cursor()
for i in range(len(posts)):
    item = Item(posts[i])
    post_arr.append(item)
    store(item,cursor)
conn.commit()
conn.close()
    
