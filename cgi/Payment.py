#!C:/python/python.exe
print ("Content-type:text/html\r\n\r\n")

import time
import cgi, cgitb 
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="bookshop"
)

form = cgi.FieldStorage() 

# Get data from fields
Uid  = form.getvalue('Uid')
border=""
mess1=""

if not Uid:
	mess1="User not Found"

mycursor = mydb.cursor()

if not mess1:
	border=Uid+str(round(time.time()));
	sql = "UPDATE bookcart SET border = '"+border+"' WHERE uid="+Uid+" and border=''"
	#val = (Uid,border)
	mycursor.execute(sql)
	mydb.commit()
	#print(sql)
	print("<font color='#0000FF'>Payment Process Successfully.!</font><br><br>");
	print("<script> alert('Payment Process Successfully.!'); location.href='http://localhost/Bookshop/index.htm';</script>");
else:
	print("<font color='#FF0000'>Payment Process Fail</font><br><br>");
	pass