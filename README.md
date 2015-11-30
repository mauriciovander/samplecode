# samplecode
PHP Sample Code

UrlParser class located in src fiolder is responsible for parsing a URL

The class is based on standard PHP (^4) parse_url function


1. clone the code
```#sh
git clone https://github.com/mauriciovander/samplecode.git
cd samplecode
```
2. install [composer](http://composer.org/) dependencies
```#sh
composer install
```
3. run tests
```#sh
./vendor/phpunit/phpunit/phpunit --tap tests/UrlParserTest.php
```