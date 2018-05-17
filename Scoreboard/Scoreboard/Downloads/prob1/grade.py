import os
cmd = "wget -q --spider http://192.168.1.8"
if os.system(cmd):
	print(0)
else:
	print(10)
