#include <stdio.h>
#include <unistd.h>
#include <string.h>
//gcc hello.c -o hello -Wno-format
int main()
{
  char input[100];
    char password[10] = "hello";
 
    printf ("\nEnter your password: ");
    scanf("%100s", &input);
    printf("\n Your string is :");
    printf(input);
    if (strncmp(password,input,5) == 0){
        printf("\nYour password is correct\n");
    }
    else
        {
        printf("\n Password doesn't match\n");
    }
}