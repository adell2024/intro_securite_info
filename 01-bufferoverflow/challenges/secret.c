#include <stdio.h>

/**Challenge : invoquer la fonction secretFunction**/

void secretFunction() {
    printf("Bravo!\n");
    printf("Vous connaissez maintenant le secret!\n");
}

void echo() {
    char buffer[20];
    printf("Saisir votre texte:\n");
    scanf("%s", buffer);
    printf("Vous avez saisi: %s\n", buffer);    
}

int main(){
    printf("main : %p\n", main);
    echo();
    return 0;
}
