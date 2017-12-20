
# import urllib

# productID = '123456'
# weightValue = '681'
# 631.5 + the bottle whirht 50 gram


# urllib.urlopen("http://127.0.0.1/InfantFyp/weghitReciever.php?productID="+ productID+"&weightValue="+weightValue);

# urllib.urlopen("http://127.0.0.1/InfantFyp/weghitReciever.php?productID="+ productID);

# let url = "http://10.113.105.167/api/api.php?request=ali";


# params = '?productID='+fffff+'&type=title'
# url = 'http://www.it-ebooks.info/search/{}'.format(params)
import mysql.connector
from mysql.connector import Error
import sys
import time
import os
import urllib

x = sys.argv[1]
y = sys.argv[2]   #string

# x = 'weight'
# y = '123456'
weightValue = '68555'

# we assume that this python file belong to the product 123456

if y == '123456':
	myMainconn = mysql.connector.connect(host='127.0.0.1',
	                                   database='MyFYP',
	                                   user='root',
	                                   password='root')
	if myMainconn.is_connected():
		myCursor = myMainconn.cursor()
		myCursor.execute("SELECT * FROM device WHERE name = %s AND product_ID = %s", (x, y))
		check1 = myCursor.fetchone()
	 
	 



		while check1[2] == 'on':
			conn = mysql.connector.connect(host='127.0.0.1',
		                                   database='MyFYP',
		                                   user='root',
		                                   password='root')
			if conn.is_connected():
				cursor = conn.cursor()
				# urllib.urlopen("http://127.0.0.1/api/api.php?request="+ x)
				# write the code that read from the sensor
				urllib.urlopen("http://127.0.0.1/InfantFyp/weghitReciever.php?productID="+ y+"&weightValue="+weightValue);
		    	cursor.execute("SELECT * FROM device WHERE name = %s AND product_ID = %s", (x, y))
		    	check2 = cursor.fetchone()
		    	time.sleep(15)
		    	if check2[2] == 'off':
		    		check1 = 'off'	
		    	
			   
			conn.close()
	myMainconn.close()

