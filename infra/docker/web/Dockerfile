FROM ubuntu:16.04

RUN apt-get update && apt-get upgrade -y && apt-get install -y apt-utils vim curl git unzip
RUN apt-get install -y nginx-extras

ADD etc/nginx/nginx.conf /etc/nginx/
ADD etc/nginx/sites-available/vhost.conf /etc/nginx/sites-available/

RUN ln -s /etc/nginx/sites-available/vhost.conf /etc/nginx/sites-enabled/010-vhost.conf

RUN rm /etc/nginx/sites-enabled/default

EXPOSE 80

CMD ["nginx"]
