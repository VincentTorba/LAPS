import os
cmd = "wget --spider http://192.168.1.8/hello.txt"
if os.system(cmd):
	print(0)
else:
	print(10)
