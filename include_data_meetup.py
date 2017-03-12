#!/usr/bin/python3
import json
import urllib.request as request
import codecs
import mysql.connector 
import datetime
import sys

db = mysql.connector.connect(host="localhost",    # your host, usually localhost
                     user="root",         # your username
                     passwd="30575flashevents",  # your password
                     db="flashevents",
                     charset='utf8mb4')  

url="https://api.meetup.com/find/events?key=4f692523435b24306351266b267171b&fields=country,lu"

html = request.urlopen(url)
reader = codecs.getreader("utf-8")
data = json.load(reader(html))

def calc_time(starttime,duration):
    result=[]
    startdate=starttime / 1000.0
    startdate=datetime.datetime.fromtimestamp(startdate).strftime('%Y-%m-%d %H:%M:%S')
    enddate=starttime + duration
    enddate=enddate / 1000.0
    enddate=datetime.datetime.fromtimestamp(enddate).strftime('%Y-%m-%d %H:%M:%S')
    result.append(startdate)
    result.append(enddate)
    return result

for DATA in data[0:100]:
    id="2"
    streetNumber=""
    if 'tags' not in DATA:
        tags=""
    else:
        tags=DATA

    if 'image' not in DATA:
        image=""
    else:
        image=DATA['fields']
    
    if 'visibility' not in DATA:
        price=""
    else:
        try:
            price=float(DATA['visibility'])
        except:
            price=""

    if 'description' not in DATA:
        describe=""
    else: 
        try:
            describe=str(DATA['description'])
        except:
            describe=""

    if 'time' not in DATA:
        start_date=""
    else:
        start_date=DATA['time']

    if 'duration' not in DATA:
        end_date=""
    else:
        end_date=DATA['duration']

    if end_date != "":
        parsetime=calc_time(start_date,end_date)
        start_date=parsetime[0]
        end_date=parsetime[1]
    else:
        start_date=""
        end_date=""

    if 'venue' not in DATA:
        address=""
    else:
        if 'address_1' not in DATA['venue']:
            address=""
        else:
            address=DATA['venue']['address_1']
        
        if 'city' not in DATA['venue']:
            city=""
        else:
            city=DATA['venue']['city']

    if 'link' not in DATA:
        link=""
    else:
        link=DATA['link']

    if 'title' not in DATA:
        title=""
    else:
        title=DATA['name']

    lat=DATA['group']['lat']
    lon=DATA['group']['lon']

    zipcode=""
    print(start_date,end_date,address,lat,lon)
    query=db.cursor(buffered=True)
    query.execute("""INSERT into addresses (streetNumber,city,zipcode,streetname,latitude,longitude) VALUES (%s,%s,%s,%s,%s,%s)
    """,(streetNumber,city,zipcode,address,lat,lon))
    db.commit()
    query.close()
    
    query=db.cursor(buffered=True)
    query2="SELECT id from addresses where streetname=%s"
    addresseid=query.execute(query2,(address,))
    db.commit()
    query.close()

    query=db.cursor(buffered=True)



    if (end_date == "" or start_date == "" ):
        query3="INSERT into events (id_address,id_provider,startDate,endDate,cost,description,picture,name,eventLink,category,rating) VALUES (%s,%s,NULL,NULL,%s,%s,%s,%s,%s,%s,NULL)"
        query.execute(query3,(addresseid,id,price,describe,image,title,link,tags))
    else:
        query3="INSERT into events (id_address,id_provider,startDate,endDate,cost,description,picture,name,eventLink,category,rating) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,NULL)"
        query.execute(query3,(addresseid,id,start_date,end_date,price,describe,image,title,link,tags))

    db.commit()
    query.close()

    
db.close()

