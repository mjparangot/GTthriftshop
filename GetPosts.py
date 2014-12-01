import urllib2
import json
import string
import re
import os
import psycopg2
import urlparse
import datetime

#in the next sprint this code will use the facebook login and the database which will obviously alter most of the functions
most_recent_date = datetime.datetime.today() + datetime.timedelta(hours=5)
delta = datetime.timedelta(minutes=10)
most_recent_date -= delta
print most_recent_date
accessToken = "397910377029373|XrTlZSB0o3cORQqrjGYBCVeTB2M"
url = "https://graph.facebook.com/199456403537988/feed?limit=500&access_token=397910377029373|XrTlZSB0o3cORQqrjGYBCVeTB2M&fields=id,from,to,message,actions,privacy,type,application,created_time,updated_time,likes,comments,attachments"

def getPosts(url):
    req = urllib2.Request(url)
    response = urllib2.urlopen(req)
    posts = response.read()
    postsDecoded = json.loads(posts)
    posts = json.dumps(postsDecoded)
    return postsDecoded["data"]

def getPost(posts,i):
    return posts["data"][i]


def getPicture(post):
    if "attachments" in post:
        if "subattachments" in post["attachments"]["data"][0]:
        	pics = ""
        	for subattachment in post["attachments"]["data"][0]["subattachments"]["data"]:
        		if "target" in subattachment:
        			pic_link = subattachment["target"]["id"] + ","
        			pics += pic_link
        	return pics
        else:
        	if "target" in post["attachments"]["data"][0]:
        		return post["attachments"]["data"][0]["target"]["id"]
    else:
        return ""

def getUser(post):
    return post["from"]["id"]

def getPostID(post):
    return post["id"]

def getDate(post):
    return post["updated_time"]

def getMessage(post):
    message = ""
    if "message" in post:
        return post["message"].replace("'","")      
    else:
        return "No Description"

def getPrice(message):
    try:
        price = re.search("([$]\d+|[$]\d+\.\d+)",message.replace(",",""))
        if price!=None:
            return float(price.group()[1:])
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

def getLink(post):
    return "https://www.facebook.com/groups/199456403537988/permalink/"+getPostID(post).split("_")[1]+"/"
            
class Item:
    def __init__(self,post):
        self.id = "\'"+ getPostID(post)+"\'"
        self.name = "\'test\'"
        self.description = "\'"+getMessage(post) + "\'"
        self.price = round(getPrice(self.description),2)
        self.status = "\'"+getStatus(post)+"\'"
        self.startdate = "\'"+getDate(post)+"\'"
        self.link = "\'"+getLink(post)+"\'"
        if (getPicture(post)!=None):
        	self.picture = "\'"+getPicture(post)+"\'"
        else:
        	self.picture = "\'\'"
        u = datetime.date.today()
        d = datetime.timedelta(days=7)
        self.enddate = "\'"+str(u+d)+"\'"
        self.seller = "\'"+getUser(post)+"\'"

def store(item, cur):
    if item.picture!=None:
        query = 'INSERT INTO \"items\" (name,description,startdate,enddate,picture,seller,postlink,fbid,status,price) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)'%(item.name,item.description,item.startdate,item.enddate,item.picture,item.seller,item.link,item.id,item.status,item.price)
    else:
        query = 'INSERT INTO \"items\" (name,description,startdate,enddate,seller,postlink,fbid,status,price) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s)'%(item.name,item.description,item.startdate,item.enddate,item.seller,item.link,item.id,item.status,item.price)
    cur.execute(query)
    

def getStatus(post):
    try:
        message = getMessage(post)
        if re.match("(a|A)(anyone|any one).*((s|S)elling|.*to sell).*?",message):
            return "Looking to buy"
        elif re.match("(s|S)elling",message):
            return "For sale"
        elif re.match("(a|A)(anyone|any one).*((b|b)uying|.*to buy).*?",message):
            return "For sale"
        elif re.match("(a|A)(anyone|any one) (l|L)ooking",message):
            return "For sale"
        elif re.match("(L|l)ooking",message):
            return "Looking to buy"
        else:
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
post_date = datetime.datetime.strptime("1993-11-16T20:53:43+0000","%Y-%m-%dT%H:%M:%S+%f")

for post in posts:
    item = Item(post)
    post_date = datetime.datetime.strptime(getDate(post),"%Y-%m-%dT%H:%M:%S+%f")
    #store(item,cursor)
    #print item.description
    #print item.picture
    # post_date
    if (post_date>=most_recent_date):
    	# print "\n"
    	# print "storing"
    	# print post_date
    	# print "\n"
    	store(item,cursor)
    	

# for i in range(len(posts)):
#     item = Item(posts[i])
#     post_arr.append(item)
#     print(item.link+"\n")
#     store(item,cursor)
conn.commit()
conn.close()
    
