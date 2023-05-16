## TCP/IP

Installez netwox 

La boîte à outils netwox aide à trouver et résoudre des problèmes réseau : 

sniff, spoof, - clients, serveurs, - dns, ftp, http, irc, nntp, smtp, snmp, syslog, telnet, tftp - scan, ping, traceroute, - etc. actuellement, netwox contient 217 outils basés sur la bibliothèque réseau netwib

Debian 11:

sudo apt -y install netwox


La boite netwox comprend plusieurs outils. Chaque outil est identifié par un numéro unique.


## Outil numéro 76 : Synflood

Usage: netwox 76 -i ip -p port [-s spoofip]

Parameters:

-i|--dst-ip ip                =>[description: destination IP address]

-p|--dst-port port             =>[description: destination port number]

-s|--spoofip spoofip           =>[description: IP spoof initialzation type]



## Outil numéro 78 : Reset every TCP packet

Usage: netwox 78 [-d device] [-f filter] [-s spoofip]

Parameters:

-d|--device device  =>device name {Eth0}

-f|--filter filter =>pcap filter

-s|--spoofip spoofip =>IP spoof initialization type {linkbraw}


## Outil numéro 40 : Spoof IP4/TCP packet

Usage: netwox 40 [parameters ...]

Parameters:

-l|--ip4-src ip =>Source IP

-m|--ip4-dst ip =>Destination IP

-j|--ip4-ttl uint32 =>Time to live

-o|--tcp-src port =>TCP Source port number

-p|--tcp-dst port =>TCP Destination port number

-q|--tcp-seqnum uint32 =>TCP sequence number

-E|--tcp-window uint32 =>TCP window size

-r|--tcp-acknum uint32 =>TCP acknowledge number

-z|--tcp-ack|+z|--no-tcp-ack =>TCP ack bit

-H|--tcp-data data =>TCP data
