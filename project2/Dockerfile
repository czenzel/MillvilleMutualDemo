FROM alpine:latest

EXPOSE 8082

RUN apk update
RUN apk add php curl php-mbstring php-zip php-phar php-openssl

RUN mkdir -p /app
WORKDIR /app
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN /usr/bin/composer require league/csv:^9.0
COPY . /app/

CMD php -S 0.0.0.0:8082
