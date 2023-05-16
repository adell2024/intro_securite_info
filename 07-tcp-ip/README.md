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
