FROM ubuntu:trusty
MAINTAINER Maks Smirnov <by.sm@protonmail.com>

ENV DEBIAN_FRONTEND noninteractive
RUN apt-get -yqq update && \
    apt-get -yqq install build-essential g++ gcc && \
    apt-get clean

COPY . /root
WORKDIR /root
RUN chmod +x server2

CMD [ "./server2" ]
