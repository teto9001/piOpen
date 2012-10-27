import urllib2
import subprocess
arg='ip route list'
p=subprocess.Popen(arg,shell=True,stdout=subprocess.PIPE)
data = p.communicate()
split_data = data[0].split()
ipaddr = split_data[split_data.index('src')+1]
arg='cat /sys/class/net/eth0/address'
p=subprocess.Popen(arg,shell=True,stdout=subprocess.PIPE)
data = p.communicate()
id=data[0]
urllib2.urlopen('http://piopen.0xteto.com/hit.php?ip=' + ipaddr +'&id='+id).read()
