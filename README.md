# PHP Ares Library

Simple PHP library that verifies and loads informations about economical subjects registered in the Czech Republic from the ARES database.


## Instalation
```bash
composer require pajaeu/php-ares
```

### Example 

```php
<?php

use Ares\Provider;

require __DIR__ . '/vendor/autoload.php';

$ares = new Provider();

try{
    $company = $ares->getByIco('PASTE-ICO-HERE');
} catch (Exception $exception){
    echo $exception->getMessage();
}
```
