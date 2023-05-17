#!/usr/bin/python3
import sys
from scapy.all import *
print("SENDING TCP RST PACKET.........")
IPLayer = IP(src="@@@@", dst="@@@@")
TCPLayer = TCP(sport=@, dport=@,flags="@", seq=@)
pkt = IPLayer/TCPLayer
ls(pkt)
send(pkt, verbose=0)
