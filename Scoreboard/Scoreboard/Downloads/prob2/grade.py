import os
cmd = "ls /var/www/html/hello.txt"
if os.system(cmd):
	print(10)
else:
	print(0)
