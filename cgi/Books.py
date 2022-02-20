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

try: # Windows needs stdio set for binary mode.
    import msvcrt
    msvcrt.setmode (0, os.O_BINARY) # stdin  = 0
    msvcrt.setmode (1, os.O_BINARY) # stdout = 1
except ImportError:
    pass

form = cgi.FieldStorage()
filed=datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S')
# Get filename here.
fileitem = form['filename']

Uid = form.getvalue('Uid')
Name = form.getvalue('Name')
Author  = form.getvalue('Author')
Publishers  = form.getvalue('Publishers')
Booktype  = form.getvalue('Booktype')
Actual  = form.getvalue('Actual')
Selling  = form.getvalue('Selling')
Information  = form.getvalue('Information')
mess=""

if not Name:
	mess=mess+"Enter Book Name, "
if not Author:
	mess=mess+"Enter Book Author, "
if not Publishers:
	mess=mess+"Enter Book Publishers, "
if not Actual:
	mess=mess+"Enter Actual Book Price, "
if not Selling:
	mess=mess+"Enter Selling Book Price, "
if not Information:
	mess=mess+"Enter Book Information "

if not mess:
	# Test if the file was uploaded
	if fileitem.filename:
		# strip leading path from file name to avoid 
		# directory traversal attacks
		fn = filed+"_"+os.path.basename(fileitem.filename)
		open('tmp/' + fn, 'wb').write(fileitem.file.read())
		message = 'The file "' + fn + '" was uploaded successfully'

		mycursor = mydb.cursor()
		sql = "INSERT INTO bookinfo (Uid,BName,Author,Publishers,Btype,APrice,SPrice,Information,imgpath) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)"
		val = (Uid,Name,Author,Publishers,Booktype,Actual,Selling,Information,fn)
		mycursor.execute(sql, val)
		mydb.commit()
		if mycursor.rowcount==1:
			print("<font color='#0000FF'>Book Added Successfully.!</font><br><br>");
			print("<script>window.location.href='Addbooks.htm';</script>");
		else:
			print("<font color='#FF0000'>Book Added Fail.!</font><br><br>");
   
	else:
		message = 'Image file not uploaded'
		print("<font color='#FF0000'>Book Added Fail - %s </font><br><br>" % message);
else:
	print("<font color='#FF0000'>Book Added Fail - %s </font><br><br>" % mess);

 