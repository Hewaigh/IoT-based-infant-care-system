
import mysql.connector
from mysql.connector import Error
import sys
import time
import os
import urllib

x = sys.argv[1]
y = sys.argv[2]




	


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
			urllib.urlopen("http://127.0.0.1/api/api.php?request="+ x)
	    	cursor.execute("SELECT * FROM device WHERE name = %s AND product_ID = %s", (x, y))
	    	check2 = cursor.fetchone()
	    	time.sleep(15)
	    	if check2[2] == 'off':
	    		check1 = 'off'	
	    	
		   
		conn.close()
myMainconn.close()

