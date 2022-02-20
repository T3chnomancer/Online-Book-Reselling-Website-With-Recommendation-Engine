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
Uid  = form.getvalue('Uid')
mess1=""

if not Uid:
	mess1="User not Found"

mycursor = mydb.cursor()

Totalval=0

if not mess1:
	#print("SELECT *,count(bookinfo.Bid),count(bookinfo.Bid)*SPrice FROM bookcart,bookinfo where bookcart.bid=bookinfo.Bid and border='' and bookcart.uid=%s group by bookcart.bid" % Uid);
	mycursor.execute("SELECT *,count(bookinfo.Bid),count(bookinfo.Bid)*SPrice FROM bookcart,bookinfo where bookcart.bid=bookinfo.Bid and bookcart.uid=%s group by bookcart.bid" % Uid)
	myresult = mycursor.fetchall()


	orderid=0;
	for row in myresult:
		print('<div class="col-md-12"><div class="cart-info">')
		print('<table class="table">')
		print('<thead><tr><th>Order ID</th><th>Product Type</th><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>')
		print('<tbody>')
		#print(row[0])
		#print(row[1])
		print('<tr>')
		print('<td class="image">%s</a></td>'% (row[4]))
		print('<td class="image">%s</td>'% (row[15]))
		print('<td class="name"><a href="book.htm">%s </a></td>'% (row[12]))
		print('<td class="image">%s &nbsp;&nbsp;&nbsp;&nbsp;</td>'% (row[20]))
		print('<td>Rs.%s/-</td>'% (row[17]))
		print('<td>Rs.%s/-</td>'% (row[21]))
		print('</tr>')
		#Totalval=Totalval+int(row[21])
		print('</tbody></table>')

		#if orderid!=row[4]:
		print('<table class="table"><tbody><tr><th style="text-align:right;"><span>Order Total</span></th>')
		print('<th>Rs.%s/-</th>'% (int(row[21])))
		print('</tr></tbody></table>')
		Totalval=0

		orderid=row[4]
		print('</div></div>')	

	else:
		pass

	

else:
	#print("<font color='#FF0000'>Fail To Show Orders- %s </font><br><br>" % mess);
	pass
