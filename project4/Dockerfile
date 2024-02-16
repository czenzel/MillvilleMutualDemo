FROM alpine:latest

EXPOSE 8084

RUN apk update
RUN apk add php

RUN mkdir -p /app
WORKDIR /app

COPY . /app/

CMD php -S 0.0.0.0:8084
