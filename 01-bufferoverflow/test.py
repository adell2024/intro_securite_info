#!/usr/bin/env python3

from pwn import *

# Set the architecture context to 64-bit
context.arch = 'amd64'

# Generate shellcode for spawning /bin/sh
shellcode = asm(shellcraft.sh())

# Print the shellcode as a byte string
print(shellcode)
