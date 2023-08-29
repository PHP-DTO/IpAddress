Installation
```shell script
composer require php-dto/ip-address
```

Usage

```php
<?php
use \PhpDto\EmailAddress\EmailAddress;
use \PhpDto\EmailAddress\Exception\InvalidIpAddressException;

$ip = new IpAddress('192.168.1.1'); //spaces will be trimmed

echo $ip->get();              //will print '192.168.1.1'
echo (string) $ip;            //will print '192.168.1.1'
echo json_encode([$ip]);      //will print '["192.168.1.1"]'


new IpAddress('invalid.value'); //will throw InvalidIpAddressException (validate by FILTER_VALIDATE_IP)
```
