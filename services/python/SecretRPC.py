import subprocess, os, dataset
from xmlrpc.server import SimpleXMLRPCServer

server = SimpleXMLRPCServer(("localhost", 14880))

if os.path.isfile("DatabaseFails.db") == False:
    db = dataset.connect('sqlite:///DatabaseFails.db')
    db.query('CREATE TABLE IF NOT EXISTS `fails` (`experiment_number` INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL , `secret` varchar(255) NOT NULL);')
else:
    db = dataset.connect('sqlite:///DatabaseFails.db')

def new(secret):
    resutl = db.query("INSERT INTO fails (secret) VALUES ('%s');" % ('%s'*len(secret) % tuple(map(ord, secret))))
    result = db.query("SELECT last_insert_rowid() as rowid FROM fails;")
    for row in result:
        guid = row['rowid']
    return("Information about secret #%s added" % guid)

def output(number):
    result = db.query("SELECT * FROM fails WHERE experiment_number = %s" % number)
    one = ""
    for row in result:
        one += str('Experiment Number: ') + str(row['experiment_number']) + str('  Info about Experiment (encrypted): ') + str(row['secret'][::-1]) + "\r\n"
    return(one)

def test(login, password):
    if login == 'admin' and password == 'VeryHardPass':
        result = ''
        for id in db['fails'].all():
            result += str(id['secret']) + "      "
        return(result)

def untouchable(info):
    return(subprocess.check_output([info]))

def arbeiten():
    return("Ja Sire")

print ("Ist bereit, Sire")
server.register_function(new)
server.register_function(output)
server.register_function(arbeiten)
server.register_function(untouchable)
server.register_function(test)
server.serve_forever()
