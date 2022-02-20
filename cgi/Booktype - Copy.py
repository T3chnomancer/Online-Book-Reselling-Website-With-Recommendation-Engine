#!C:/python/python.exe

import cgi, os
import cgitb; cgitb.enable()
import datetime

import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="bookshop"
)

print("Content-Type: text/html\n")

form = cgi.FieldStorage()
Searchkey = form.getvalue('Searchkey')

print("SELECT Btype,count(*) FROM bookinfo where concat(BName,' ',Author,' ',Publishers,' ',Btype,' ',Information) like '%s' group by Btype"% ("%"+Searchkey+"%"))

mycursor = mydb.cursor()
#mycursor.execute("SELECT Btype,count(*) FROM bookinfo where concat(BName,' ',Author,' ',Publishers,' ',Btype,' ',Information) like '%s' group by Btype" % ("%"+Searchkey+"%"))
#mycursor.execute("SELECT Btype,count(*) FROM bookinfo where concat(BName,' ',Author,' ',Publishers,' ',Btype,' ',Information) like '"+Searchkey+"' group by Btype")
mycursor.execute("SELECT Btype,count(*) FROM bookinfo where concat(BName,' ',Author,' ',Publishers,' ',Btype,' ',Information) like '%"+Searchkey+"%' group by Btype")
myresult = mycursor.fetchall()

#print("SELECT Btype,count(*) FROM bookinfo where concat(BName,' ',Author,' ',Publishers,' ',Btype,' ',Information) like '%s' group by Btype" % ("%"+Searchkey+"%"))
print('<h2>Book Type</h2>')
print('<ul>')
print('<li><a href="index.htm">All</a></li>')

for row in myresult:
	#print(row[0])
	#print(row[1])
	print('<li><a href="index.htm?Searchtype=%s">%s (%s) </a></li>'% (row[0],row[0],row[1]))

print('<ul>')