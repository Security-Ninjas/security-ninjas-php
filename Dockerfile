FROM ubuntu:trusty
MAINTAINER CJ Niemira <siege@siege.org>
RUN apt-get -q update && apt-get install -y apache2
RUN apt-get install -y php5 libapache2-mod-php5 php5-mcrypt
RUN apt-get install -y php5-common
RUN apt-get install -y php5-sqlite
RUN apt-get install -y whois
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
ENV updated 20160518-1309
ADD src/Final /var/www/html
RUN chmod -R 755 /var/www/html
RUN chmod 777 /var/www/html/user1.txt /var/www/html/user2.txt /var/www/html/comments.txt /var/www/html/management.txt /var/www/html/votes.sqlite
ADD php.ini /etc/php5/apache2/php.ini
ADD ninjas.conf /etc/apache2/conf-enabled/ninjas.conf
ENV DEBIAN_FRONTEND noninteractive
CMD /usr/sbin/apache2ctl -D FOREGROUND
