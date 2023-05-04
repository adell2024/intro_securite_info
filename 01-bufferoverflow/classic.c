#include <stdio.h>
#include <unistd.h>
/* Compile: gcc -g -fno-stack-protector -z execstack classic.c -o classic */
/* Disable ASLR: echo 0 | sudo tee /proc/sys/kernel/randomize_va_space   */

int vuln()
{
    char buf[80]; // 0x50
    int r;
    r = read(0, buf, 400); // 0x190
    printf("\nadress of buf=%p", buf);
    printf("\nRead %d bytes \nbuf contains %s\n", r, buf);
    return 0;
}

int main(int argc, char *argv[])
{
    printf("/bin/sh");
    vuln();
    return 0;
}