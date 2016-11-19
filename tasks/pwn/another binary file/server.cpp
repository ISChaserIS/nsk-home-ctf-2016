
#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include <netinet/in.h>
#include <unistd.h>
#include <arpa/inet.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <pthread.h>
#define BUF 1024


void *func(void *ar){
	struct l{
		char buf[256];
		long long a;
	}l1;

	int ac = (int)ar;
	l1.a = 10;
	if(recv(ac, l1.buf, 260, 0) < 0){
		printf("Recv упал\n");
		pthread_exit(NULL);
	}
	send(ac, l1.buf, strlen(l1.buf)-5, 0);
	char buf[15];
	sprintf(buf, "\na :%08x\n", l1.a);
	send(ac, buf, 15, 0);
	if(l1.a != 0xbeefdead){
		if(send(ac, "good A\n", 8, 0) < 0)
			printf("good A упал\n");
	}else{
		char flag[] = "SCTF{PwN_N000_3at_N0o_sl33p}"; // Сюда флаг поместить
		if(send(ac, flag, strlen(flag), 0) < 0)
			printf("flag упал\n");
	}
	close(ac);
	pthread_exit(NULL);
}

int main(){
	int sock;
	struct sockaddr_in server, client;
	socklen_t slen = sizeof(client), recv_len;
	if ((sock = socket(AF_INET, SOCK_STREAM, 0)) == -1){
		printf("СОкет не создан\n");
	}
	server.sin_family = AF_INET;
	server.sin_addr.s_addr = inet_addr("0.0.0.0");	// тут ip сервера
	server.sin_port = htons(9002);				// тут порт сервера

	if (bind(sock, (struct sockaddr *)&server, sizeof(server)) == -1){
		close(sock);
		printf("Bind не сработал");
		return -1;
	}
	if(listen(sock, 10) < 0){
		close(sock);
		printf("Listen не работает!!\n");
		return -1;
	}
	printf("Жду соединения\n");
	while (1){
		slen = sizeof(client);
		int ac = accept(sock,(struct sockaddr *) &client, &slen);
		pthread_t thread;
		if( pthread_create(&thread,NULL,func,(void*)ac) != 0){
			close(ac);
			printf("pthread упал\n");
			break;
		}
	}
	close(sock);
	return 0;
}
