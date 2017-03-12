#!/usr/bin/python3
import json
import urllib.request as request
import codecs
import mysql.connector

db = mysql.connector.connect(host="localhost",    # your host, usually localhost
                     user="root",         # your username
                     passwd="30575flashevents",  # your password
                     db="flashevents",
                     charset='utf8')  

url="https://public.opendatasoft.com/api/records/1.0/search/?dataset=evenements-publics-cibul&q=Lux&facet=updated_at&facet=tags&facet=placename&facet=department&facet=region&facet=city&facet=date_start&facet=date_end&facet=pricing_info"

html = request.urlopen(url)
reader = codecs.getreader("utf-8")
data = json.load(reader(html))


for DATA in data['records'][0:100]:
    id="3"
    streetNumber=""
    if 'tags' not in DATA['fields']:
        tags=""
    else:
        tags=DATA['fields']['tags']

    if 'image' not in DATA['fields']:
        image=""
    else:
        image=DATA['fields']['image']
    
    if 'price' not in DATA['fields']:
        price=""
    else:
        try:
            price=float(DATA['fields']['pricing_info'])
        except:
            price=""

    if 'free_text' not in DATA['fields']:
        describe=""
    else: 
        describe=DATA['fields']['free_text']

    if 'date_start' not in DATA['fields']:
        start_date=""
    else:
        start_date=DATA['fields']['date_start']

    if 'date_end' not in DATA['fields']:
        end_date=""
    else:
        end_date=DATA['fields']['date_end']

    if 'address' not in DATA['fields']:
        address=""
    else:
        address=DATA['fields']['address']

    if 'link' not in DATA['fields']:
        link=""
    else:
        link=DATA['fields']['link']

    if 'title' not in DATA['fields']:
        title=""
    else:
        title=DATA['fields']['title']

    if 'city' not in DATA['fields']:
        city=""
    else:
        city=DATA['fields']['city']

    if 'latlon' not in DATA['fields'] or len(DATA['fields']['latlon']) < 2:
        lat=""
        lon=""
    else:
        lat=DATA['fields']['latlon'][0]
        lon=DATA['fields']['latlon'][1]

    zipcode=""

    print(city,zipcode,address,lat,lon)

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
    query3="INSERT into events (id_address,id_provider,startDate,endDate,cost,description,picture,name,eventLink,category,rating) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,NULL)"
    query.execute(query3,(addresseid,id,start_date,end_date,price,describe,image,title,link,tags))
    db.commit()
    query.close()

    
db.close()

