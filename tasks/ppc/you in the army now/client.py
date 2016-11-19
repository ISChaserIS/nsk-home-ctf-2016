import socket

sock = socket.socket()
sock.connect(('localhost', 5000))

    #n = input("\n\nTrue, False or Correct?: ")
    #sock.send(str.encode(n))
for i in range(100):
    f = open("%d.png" % i, "wb")
    data = sock.recv(4096)
    #print(data)
    f.write(data)
    f.close()
    n = input("Please recognize letter (1 sec) ")
    sock.send(str.encode(n))
    #sock.send(b(i))
print("WTF")
sock.close()
