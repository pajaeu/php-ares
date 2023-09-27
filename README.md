<p align="center">
    <img src="https://beeimg.com/images/y49059711382.png" height="100" alt="Logo" />
    <h1 align="center">PHP Ares Library</h1>
</p>
<p align="center">Simple PHP library that verifies and loads informations about economical subjects registered in the Czech Republic from the ARES database.</p>
<p align="center">
    <img src="https://img.shields.io/github/languages/top/pajaeu/php-ares" alt="Package Language" />
    <img src="https://img.shields.io/github/license/pajaeu/php-ares" alt="Package License" />
    <img src="https://img.shields.io/packagist/dt/pajaeu/php-ares" alt="Total Downloads" />
</p>

## Instalation
```bash
composer require pajaeu/php-ares
```

### How to use 

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
