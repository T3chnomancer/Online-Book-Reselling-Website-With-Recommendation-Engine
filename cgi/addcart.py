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
bid = form.getvalue('bid')
Uid  = form.getvalue('Uid')
bidp = form.getvalue('bidp')
mess1=""
mess2=""
mess3=""

if not bid:
	mess1="Book not Found"

if not Uid:
	mess2="User not Found"

if not bidp:
	mess3="User Process"

mycursor = mydb.cursor()


if not mess1:
	sql = "INSERT INTO bookcart (uid,bid,cdatetime,border) VALUES (%s, %s, now(), '')"
	val = (Uid,bid)
	mycursor.execute(sql, val)
	mydb.commit()
	if mycursor.rowcount==1:
		print("<font color='#0000FF'>Book Added Into Cart Successfully.!</font><br><br>");

if not mess3:
	sql = "DELETE FROM bookcart WHERE uid= %s and bid= %s	"
	val = (Uid,bid)
	mycursor.execute(sql, val)
	mydb.commit()
	if mycursor.rowcount==1:
		print("<font color='#0000FF'>Book Deleted From Cart Successfully.!</font><br><br>");

Totalval=0

if not mess2:
	#print("SELECT *,count(bookinfo.Bid),count(bookinfo.Bid)*SPrice FROM bookcart,bookinfo where bookcart.bid=bookinfo.Bid and border='' and bookcart.uid=%s group by bookcart.bid" % Uid);
	mycursor.execute("SELECT *,count(bookinfo.Bid),count(bookinfo.Bid)*SPrice FROM bookcart,bookinfo where bookcart.bid=bookinfo.Bid and border='' and bookcart.uid=%s group by bookcart.bid" % Uid)
	myresult = mycursor.fetchall()

	print('<div class="col-md-12"><div class="cart-info">')
	print('<table class="table">')
	print('<thead><tr><th>Delete</th><th>Product Type</th><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr></thead>')
	print('<tbody>')
	for row in myresult:
		#print(row[0])
		#print(row[1])
		print('<tr>')
		print('<td class="image"><a href="cart.htm?bid=%s&Uid=%s&bidp=Y">[X]</a></td>'% (row[2],row[1]))
		print('<td class="image">%s</td>'% (row[10]))
		print('<td class="name"><a href="book.htm">%s </a></td>'% (row[7]))
		print('<td class="image">%s &nbsp;&nbsp;&nbsp;&nbsp;<a href="cart.htm?bid=%s&Uid=%s"> [Add More]</a></td>'% (row[15],row[2],row[1]))
		print('<td>Rs.%s/-</td>'% (row[12]))
		print('<td>Rs.%s/-</td>'% (row[16]))
		print('</tr>')

		Totalval=Totalval+int(row[16])

	else:
		pass

	print('</tbody></table>')
	print('<table class="table"><tbody><tr><th style="text-align:right;"><span>Order Total</span></th>')
	print('<th>Rs.%s/-</th>'% (Totalval))
	print('</tr></tbody></table>')
	print('</div></div>')		

	print('<div class="row">')
	print('<div class="col-sm-12 ">')
	print('<div class="cart-totals">')
	print('<p>')
	print('<form action="Payment.htm?Uid=%s&Payment=%s" method="post" class="loginbox form-horizontal" id="logform">'% (Uid,Totalval))
	print('<button class="btn btn-primary" style="color:#fff;background-color: #000;float:right;" type="submit">Proceed to Checkout</button>')
	print('<br><br></form></p></div></div></div>')

else:
	#print("<font color='#FF0000'>Book Added Into Cart Fail - %s </font><br><br>" % mess);
	pass
