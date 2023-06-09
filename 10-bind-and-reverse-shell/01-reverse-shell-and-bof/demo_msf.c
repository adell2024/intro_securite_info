#include <stdio.h>
#include <unistd.h>
/* Compile: gcc -fno-stack-protector -z execstack demo_msf.c -o demo_msf -g */
int vuln(){
 char buffer[600];
 int characters_read;
 //printf("bufer =%p\n",buffer);
 printf("Enter message:\n");
 characters_read = read(0, buffer, 1000);
 printf("You entered: %s", buffer);
 return 0;
}
void main(){
  vuln();
  //atterissage après retour de vuln  
}
