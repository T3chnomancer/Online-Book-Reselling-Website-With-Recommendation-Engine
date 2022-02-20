#!C:/python/python.exe
print ("Content-type:text/html\r\n\r\n")

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
UserEmail  = form.getvalue('UserEmail')
UserPass  = form.getvalue('UserPass')
mess=""

if not UserEmail:
	mess="Enter Email and Password."
if not UserPass:
	mess="Enter Email and Password."

if not mess:
	mycursor = mydb.cursor()
	mycursor.execute("SELECT * FROM user_reg where Email='"+UserEmail+"' and Password='"+UserPass+"'")
	myresult = mycursor.fetchall()
	UserID=""
	UserName=""

	for row in myresult:
		UserID=row[0]
		UserName=row[1]

	mess="%s#%s" % (UserID,UserName)

	if not UserID:
		print("<font color='#FF0000'>Login Fail.!</font><br><br>");
	else:
		#print("<font color='#0000FF'>Login Successfully.!</font><br><br>");
		print(mess);

else:
	print("<font color='#FF0000'>Login Fail - %s </font><br><br>" % mess);
