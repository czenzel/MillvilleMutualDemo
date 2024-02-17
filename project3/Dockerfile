FROM alpine:latest

EXPOSE 8083

RUN apk update
RUN apk add php curl php-mbstring php-zip php-phar php-openssl php-session

RUN mkdir -p /app
RUN mkdir -p /app/queue/
WORKDIR /app
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

COPY . /app/
RUN /usr/bin/composer install

CMD php -S 0.0.0.0:8083
