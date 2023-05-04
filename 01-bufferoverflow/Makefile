CFLAGS = -Wall -Wextra -Wno-unused-function -Wno-unused-variable -g -O0 -Wl,-z,norelro -fno-PIC -z execstack -fno-stack-protector
LDFLAGS = -no-pie

all: classic

.PHONY: clean

classic: classic.c

clean:
	rm -f classic
	rm -f *.o
