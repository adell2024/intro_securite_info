## TCP RST

L'attaque TCP RST peut mettre fin à une connexion TCP établie entre deux victimes.

## Comment détruire une connexion établie entre deux entités


![tcp2](https://github.com/aabda2000/sti3a-security/assets/38082725/b98f7940-63ac-44b6-acd0-249e6bbcea48)

Pour "casser" la connexion, l'attaquant doit forger un segment TCP RST destiné à l'une de des deux entités. Par contre, si une entité reçoit un segment avec un numéro de séquence qui est "trop" dans le désordre, elle le rejettera. Une attaque par TCP RST réussie nécessite donc un numéro de séquence crédible.
