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
Searchkey = form.getvalue('Searchkey')
Searchtype = form.getvalue('Searchtype')

mycursor = mydb.cursor()

mess1=""
mess2=""
Quryc="SELECT * FROM bookinfo where concat(BName,' ',Author,' ',Publishers,' ',Btype,' ',Information) like '%s' and Btype like '%s'  and ( Bid=0 "% ("%"+Searchkey+"%","%"+Searchtype+"%");


if not Uid:
	mess1="User not Found"

if not mess1:
	#print("SELECT bookcart.bid from (SELECT border,t1.bid from (SELECT bid FROM bookcart where border='' and bookcart.Uid=%s group by bookcart.bid order by bookcart.cid) as t1,bookcart where t1.bid=bookcart.bid and bookcart.border!='') as v1,bookcart where v1.border=bookcart.border and bookcart.bid!=v1.bid group by bookcart.bid" % Uid)
	mycursor.execute("SELECT bookcart.bid from (SELECT border,t1.bid from (SELECT bid FROM bookcart where border='' and bookcart.Uid=%s group by bookcart.bid order by bookcart.cid) as t1,bookcart where t1.bid=bookcart.bid and bookcart.border!='') as v1,bookcart where v1.border=bookcart.border and bookcart.bid!=v1.bid group by bookcart.bid" % Uid)
	myresult = mycursor.fetchall()
	for row in myresult:
		mess2="Cart Empty"
		Quryc="%s or Bid=%s"% (Quryc,row[0]);

if not mess2:
	mycursor.execute("SELECT *,count(*) as maxval FROM bookcart where border!='' group by bookcart.bid order by maxval limit 0,5")
	myresult = mycursor.fetchall()
	for row in myresult:
		Quryc="%s or Bid=%s"% (Quryc,row[2]);

Quryc=Quryc+")"
#print(Quryc)

mycursor.execute(Quryc)
myresult = mycursor.fetchall()

for row in myresult:
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