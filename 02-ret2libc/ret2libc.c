#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

//Hyptothèses: le mécanisme ASLR désactivé, Pas de CANRAY
// sudo apt-get update
//sudo apt-get install nasm

void vuln()
{
	char buf[128];
	read(0, buf, 256);
	printf("\nadress of buf=%p\n", buf);
}

int main()
{
	vuln();
	write(1, "Hello, World\n", 13);
}
