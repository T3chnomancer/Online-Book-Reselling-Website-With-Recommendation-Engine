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
bid = form.getvalue('bid')
Uid = form.getvalue('Uid')

mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM bookinfo where Bid='%s'" % bid)
myresult = mycursor.fetchall()

for row in myresult:
	#print(row[0])
	#print(row[1])
	print('<div class="col-md-6" ><div class="image"><div id="wrap" style="top:0px;z-index:0;position:relative;">')
	print('<img style="display: block;" src="cgi/tmp/%s" title="Nano" alt="Nano" id="image">' % row[9])
	print('</div></div></div>')
	print('<div class="col-md-6">')
	print('<h1>%s (%s)</h1>' % (row[2],row[5]))
	print('<div class="line"></div><ul>')
	print('<li><span>Book Name : </span> %s (%s)</li>'% (row[2],row[5]))
	print('<li><span>Book Author : </span> %s </li>'% row[3])
	print('<li><span>Book Publishers : </span> %s </li>'% row[4])
	print('</ul><div class="price">')
	print('Price : &nbsp;<strike>%s</strike>&nbsp;&nbsp;<strong>%s</strong>' % (row[7],row[6]))
	print('</div><div class="line"></div>')
	
	if not Uid:
		print('<a href="sign.htm" class="btn btn-primary" type="submit" style="color:#fff;background-color: #000;">Sign In To Buy</a>')
	else:
		print('<a href="cart.htm?bid=%s&Uid=%s" class="btn btn-primary" type="submit" style="color:#fff;background-color: #000;">Add to Cart</a>' % (row[0],Uid))
	
	print('<div class="tabs"><ul class="nav nav-tabs" id="myTab">')
	print('<li class=""><a href="#home">Description</a></li>')
	print('</ul><div class="tab-content">')
	print('<div class="tab-pane" id="home">%s</div>' % row[8])
	print('</div></div></div>')