SolrPHP-Ex
==================

Example apps using php with apache solr

Requirements
=============

1. PHP Version: >= 5.3
2. [Solr](http://lucene.apache.org/solr/downloads.html)
3. [PHP Solr Extension](http://www.php.net/manual/en/solr.installation.php)
4. Tomcat
5. Java SDK (7)

Install Tomcat
==============

Based on Debian/Ubuntu:

sudo apt-get install tomcat7


Install PHP Extension (C-compiled) via package
==============================================

Based on Debian/Ubuntu :

1. sudo apt-get install php5-curl
2. sudo apt-get install libcurl4-gnutls-dev
3. sudo apt-get install libxml2
4. sudo apt-get install libxml2-dev
5. sudo pecl install -n solr
6. sudo vim /etc/php5/conf.d/solr.ini
7. after open/create solr ini file, then add : "extension=solr.so"
8. restart your webserver or maybe php5-fpm services