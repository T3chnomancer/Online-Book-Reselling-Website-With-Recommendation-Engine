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
Bid = form.getvalue('Bid')

mycursor = mydb.cursor()

mess1=""
Quryc="SELECT * FROM bookinfo where ( Bid=0 ";


if not Bid:
	mess1="Book not Found"

if not mess1:
	mycursor.execute("SELECT bookcart.bid from (SELECT border,bid from bookcart where bookcart.bid=%s and bookcart.border!='') as v1,bookcart where v1.border=bookcart.border and bookcart.bid!=v1.bid group by bookcart.bid" % Bid)
	myresult = mycursor.fetchall()
	for row in myresult:
		mess2="Cart Empty"
		Quryc="%s or Bid=%s"% (Quryc,row[0]);

Quryc=Quryc+")"
#print(Quryc)

mycursor.execute(Quryc)
myresult = mycursor.fetchall()

for row in myresult:
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