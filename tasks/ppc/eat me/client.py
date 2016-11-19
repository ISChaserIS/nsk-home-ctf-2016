import socket

sock = socket.socket()
sock.connect(('localhost', 6000))

    #n = input("\n\nTrue, False or Correct?: ")
    #sock.send(str.encode(n))
for i in range(100):
    data = sock.recv(4096)
    print(data.decode('utf-8'))
    n = input("Eatable or noteatable (1 sec)? ")
    sock.send(bytearray(n.encode('utf-8')))
print("WTF")
sock.close()
