FROM registry.unity.software/php:7.1

RUN set -x \
 && apt-get update \
    ##
    # Install msmtp
    ##
 && apt-get install -y msmtp \
    ##
    # Install mysql
    ##
 && docker-php-ext-install mysqli \
 && apt-get clean

##
# Configure msmtp for PHP
##
COPY ./dev/docker/app/msmtp/msmtp.conf.tmpl /etc/msmtp.conf.tmpl
COPY ./dev/docker/app/php/smtp.ini /usr/local/etc/php/conf.d/smtp.ini

##
# Configure entrypoint
##
COPY ./dev/docker/app/run.sh /run.sh
RUN set -x && chmod +x /run.sh
ENTRYPOINT ["/run.sh"]
CMD ["php-fpm", "--allow-to-run-as-root"]

ENV DB_HOST database
ENV DB_PORT 3306
ENV MAIL_HOST mailcatcher
ENV MAIL_PORT 1025
ENV WAIT_FOR_DEPENDENCIES 1
