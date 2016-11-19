import socket
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("192.168.1.5", 7788))
import random
import re
a = ["ножницы","бумага","камень"]
print(s.recv(200).decode())
print(s.recv(218).decode())
while 1:
    data = s.recv(1024).decode()
    print(data)
    flags = re.findall("SCTF\{\w{0,20}\}", data)
    print(flags)
    if len(flags) != 0: break
    n = random.randint(0,2)
    s.send(a[n].encode())
    data = s.recv(1024).decode()
    print(data)
s.close()

