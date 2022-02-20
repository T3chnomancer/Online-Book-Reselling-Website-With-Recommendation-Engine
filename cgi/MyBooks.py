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
Uid = form.getvalue('Uid')

mess=""

if not Uid:
	mess="User Not Found"

if not mess:
	mycursor = mydb.cursor()
	mycursor.execute("SELECT * FROM bookinfo where Uid=%s" % Uid)
	myresult = mycursor.fetchall()

	for row in myresult:
		#print(row[0])
		#print(row[1])
		print('<div class="col-md-3">')
		print('<div class="product" id="myproduct" style="height:350px;">')
		print('<a href="book.htm?bid=%s"><img alt="dress5" src="cgi/tmp/%s" style="height:150px;"></a>' % (row[0],row[9]))
		print('<hr>')
		print('<div class="name">')
		print('<a href="book.htm">%s (%s)</a>'% (row[2],row[5]))
		print('</div>')
		print('<div class="price">')
		print('<p>Rs.%s &nbsp;&nbsp;<strike> %s </strike></p>' % (row[7],row[6]))
		print('<p>%s</p>' % row[3])
		print('</div>')
		print('</div>')
		print('</div>')
else:
	print("<font color='#FF0000'>Books Not Found.!</font><br><br>");