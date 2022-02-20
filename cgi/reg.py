#!C:/python/python.exe
print ("Content-type:text/html\r\n\r\n")

import cgi, cgitb 
import mysql.connector
import re

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="bookshop"
)
mycursor = mydb.cursor()

form = cgi.FieldStorage() 

# Get data from fields
FullNam = form.getvalue('FullNam')
Emailid  = form.getvalue('Emailid')
MobNo  = form.getvalue('MobNo')
Gender  = form.getvalue('Gender')
Pass  = form.getvalue('Pass')
RPass  = form.getvalue('Cpass')
Address  = form.getvalue('Address')
mess=""

#rule = re.search(r'/^[0-9]{10,14}$/')
#rule = re.search(r"^[\w\.\+\-]+\@[\w]+\.[a-z]{2,3}$", Emailid)

#num_format = re.compile("^[\-]?[1-9][0-9]*\.?[0-9]+$")
#isnumber = re.match(num_format,MobNo)

#txt = "The rain in Spain"
#x = re.match("/^[0-9]{10,14}$/", MobNo) 
#print(x);

#print(len(str(Emailid)));
if Emailid==None:
	Emailid="";
if MobNo==None:
	MobNo="";
if FullNam==None:
	FullNam="";
if Pass==None:
	Pass="";
if RPass==None:
	RPass="";
if Address==None:
	Address="";

if not FullNam:
	mess=mess+"Enter Name, "
if not re.match("^[a-zA-Z ]*$", FullNam):
	mess=mess+"Enter valid Name, "
if not Emailid:
	mess=mess+"Enter Email, "
if not re.match("^[\w\.\+\-]+\@[\w]+\.[a-z]{2,3}$", Emailid):
	mess=mess+"Enter valid Email, "
if not MobNo:
	mess=mess+"Enter Mobile No, "
if not re.match("^[0-9]{10}$", MobNo):
	mess=mess+"Enter valid Mobile No., "
if not Pass:
	mess=mess+"Enter Password, "
if not RPass:
	mess=mess+"Enter Re-Password, "
if RPass != Pass:
	mess=mess+"Password Not Match, "
if not Address:
	mess=mess+"Enter Address "

mycursor.execute("SELECT * FROM user_reg where Email='"+Emailid+"'")
rcc=len(mycursor.fetchall())

if rcc >0:
	mess=mess+"Email All ready Register. "

if not mess:
	
	sql = "INSERT INTO user_reg (Name,Email,Mobile,Gender,Password,Address) VALUES (%s, %s, %s, %s, %s, %s)"
	val = (FullNam,Emailid,MobNo,Gender,Pass,Address)
	mycursor.execute(sql, val)
	mydb.commit()
	if mycursor.rowcount==1:
		print("<font color='#0000FF'>Registration Successfully.!</font><br><br>");
	else:
		print("<font color='#FF0000'>Registration Fail.!</font><br><br>");
else:
	print("<font color='#FF0000'>Registration Fail - %s </font><br><br>" % mess);
