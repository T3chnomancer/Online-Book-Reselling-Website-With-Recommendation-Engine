#!C:/python/python.exe
print ("Content-type:text/html\r\n\r\n")

import cgi, cgitb 
import mysql.connector
from datetime import datetime

now = datetime.now()

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="bookshop"
)

form = cgi.FieldStorage() 

# Get data from fields
address  = form.getvalue('Shipping')
orderid = form.getvalue('orderid')
mess1=""

if not orderid:
	mess1="Set Shipping Details"

if not address:
	mess1="Order Id Not Found"


mycursor = mydb.cursor()

Rdate= now.strftime("%d/%m/%Y, %H:%M:%S")

if not mess1:
	#print("update bookcart set Shipinginfo='%s',ordercomplit='y',Shipingdt='%s' where cid=%s"% (address,Rdate,orderid))
	sql="update bookcart set Shipinginfo='%s',ordercomplit='y',Shipingdt='%s' where cid=%s"% (address,Rdate,orderid)
	#sql= "update bookcart set Shipinginfo='%s',ordercomplit='y',Shipingdt='%s' where cid=%s"
	#val = (address,Rdate,orderid)
	mycursor.execute(sql)
	mydb.commit()
	if mycursor.rowcount==1:
		print("<font color='#0000FF'>Shipping Details Set Successfully.!</font><br><br>");
	else:
		print("<font color='#FF0000'>Shipping Details Set Fail.!</font><br><br>");

else:
	#print("<font color='#FF0000'>Fail To Set Shipping Details- %s </font><br><br>" % mess);
	pass
