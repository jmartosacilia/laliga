FROM ubuntu:16.04

RUN apt-get update && apt-get upgrade -y && apt-get install -y apt-utils vim curl git unzip
RUN apt-get install -y php7.0 php7.0-fpm php7.0-mysql php7.0-xml php7.0-curl

ADD etc/php/7.0/cli/conf.d/config.ini /etc/php/7.0/cli/conf.d/
ADD etc/php/7.0/fpm/conf.d/config.ini /etc/php/7.0/fpm/conf.d/
ADD etc/php/7.0/fpm/pool.d/www.conf /etc/php/7.0/fpm/pool.d/
RUN mkdir /run/php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

EXPOSE 9000

WORKDIR /home/app

CMD ["php-fpm7.0", "-F"]