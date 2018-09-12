FROM webdevops/php-apache-dev:7.2
COPY startup.sh /entrypoint.d
RUN chmod +x /entrypoint.d/startup.sh
