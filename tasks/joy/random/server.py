import socketserver
import random
class service(socketserver.BaseRequestHandler):
    def handle(self):
        a = ["ножницы", "бумага", "камень"]
        self.request.send("Привет мой друг!\nПоиграем сегодня с тобой в камень ножницы бумага\nМы будем играть 50 раундов\n".encode())
        self.request.send("Ты должен выиграть 15 раундов подряд или 60 раундов в течение всей игры, чтобы заполучить флаг!\nУдачи!\n".encode())
        raund = 1;        vinPlayer = 0;    vinComp = 0;    vinPoPlayer = 0
        while 1:
            self.request.send("Введи своё значение\n".encode())
            #self.request.recv(15).decode()
            player = self.request.recv(1024).decode()
            print(player)
            if player != "ножницы" and player != "бумага" and player != "камень":
                self.request.send("Ты пытаешься меня обмануть!!!\n Мне это совсем не нравится, я сделаю тебе -1 победу и 1 раунд выиграл я, хахахах\n".encode())
            else:
                variant = random.randint(0,2)
                string = "Твой выбор: " + player+ " мой выбор " + a[variant]
                self.request.send(string.encode())
                if player == "ножницы" and a[variant] == "бумага":
                    raund += 1;                    vinPlayer += 1;                    vinPoPlayer += 1
                    string = "ого, да ты смог выиграть 1 раунд, но ничего, мы посмотрим кто круче\nИгрок: " + \
                          str(vinPlayer) + " Компьютер: " + str(vinComp)  + "\n"
                    self.request.send(string.encode())
                elif player == "ножницы" and a[variant] == "камень":
                    raund += 1;                    vinPoPlayer = 0;                    vinComp += 1
                    string = "ахахах, ты даже компьютер обыграть не можешь!\nИгрок: " + \
                          str(vinPlayer) + " Компьютер: " + str(vinComp) + "\n"
                    self.request.send(string.encode())
                elif player == "камень" and a[variant] == "ножницы":
                    raund += 1;                    vinPlayer += 1;                    vinPoPlayer += 1
                    string = "ого, да ты смог выиграть 1 раунд, но ничего, мы посмотрим кто круче\nИгрок: " + \
                          str(vinPlayer) + " Компьютер: " + str(vinComp)+ "\n"
                    self.request.send(string.encode())
                elif player == "камень" and a[variant] == "бумага":
                    raund += 1;                    vinComp += 1;                    vinPoPlayer = 0
                    string = "ахахах, ты даже компьютер обыграть не можешь!\nИгрок: " + \
                          str(vinPlayer) + " Компьютер: " + str(vinComp) + "\n"
                    self.request.send(string.encode())
                elif player == "бумага" and a[variant] == "камень":
                    raund += 1;                    vinPlayer += 1;                    vinPoPlayer += 1
                    string = "ого, да ты смог выиграть 1 раунд, но ничего, мы посмотрим кто круче\nИгрок: " + \
                          str(vinPlayer) + " Компьютер: " + str(vinComp) + "\n"
                    self.request.send(string.encode())
                elif player == "бумага" and a[variant] == "ножницы":
                    raund += 1;                    vinComp += 1;                    vinPoPlayer = 0
                    string = "ахахах, ты даже компьютер обыграть не можешь!\nИгрок: " + \
                          str(vinPlayer) + " Компьютер: " + str(vinComp) + "\n"
                    self.request.send(string.encode())
                else:
                    raund += 1
                    string = "Вау, мы думаем одинаково!\nИгрок: "+ \
                          str(vinPlayer) + " Компьютер: " + str(vinComp) + "\n"
                    self.request.send(string.encode())

            if vinPlayer == 60 or vinPoPlayer == 15:
                self.request.send("SCTF{W0O0W_Y0uu_w1n_nn3}".encode())
            if raund == 150:
                string = "Игра окончена, ты не смог получить флаг\nИгрок: "+ \
                          str(vinPlayer) + " Компьютер: " + str(vinComp)+"\nА давай начнем сначала" \
                          "делай свой выбор\n"
                self.request.send(string.encode())
                raund = 1;                vinPlayer = 0;                vinComp = 0;
                vinPoPlayer = 0


if __name__ == "__main__":
    HOST, PORT = "0.0.0.0", 9001
    server = socketserver.TCPServer((HOST,PORT), service)
    server.serve_forever()
