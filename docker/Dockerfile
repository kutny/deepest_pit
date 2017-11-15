FROM php:7.1.9

RUN apt-get update \
    && pecl install xdebug-2.5.5 \
    && echo "xdebug.cli_color=1\nxdebug.remote_autostart=1\nxdebug.remote_connect_back=1\nxdebug.idekey=PHPSTORM\nxdebug.remote_enable=1\nxdebug.remote_log=/tmp/xdebug_remote.log" > /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /app
