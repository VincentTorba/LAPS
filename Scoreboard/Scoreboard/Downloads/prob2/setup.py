# this is the hack
import os
cmd = "sshpass -p'goodyear123!@#' ssh -t root@192.168.1.8 touch /var/www/html/hello.txt"
os.system(cmd)
