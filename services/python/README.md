First, you need change "localhost" to ip.

To install the dependencies python:

$ pip install dataset
or
$ git clone git://github.com/pudo/dataset.git
$ cd dataset/
$ python setup.py install

Check xmlrpc (standard module of python)

$python3
>> import xmlrpc.server
>> import xmlrpc.client

To get a connection with service:

>> import xmlrpc.client
>> server = xmlrpc.client.ServerProxy("http://<ip>:<port>/")
>> server.arbeiten()
If you see "Ja, Sire", connection is established.

Vulnerability list:

1) Function "untouchable" allows you to execute arbitrary commands.
To fix - just delete this

2) Function "admin" get you all secrets. Very bad function :(
To Fix - delete or change the login/pass.

3) In theory, sql injection...