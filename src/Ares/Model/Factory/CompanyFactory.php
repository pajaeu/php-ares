<?php

namespace Ares\Model\Factory;

use Ares\Model\Company;

class CompanyFactory
{

    public static function create(
        string $name,
        string $ico,
        string $dic,
        string $street,
        string $city,
        string $zip,
        string $country
    ): Company
    {
        return (new Company())
            ->setName($name)
            ->setIco($ico)
            ->setDic($dic)
            ->setStreet($street)
            ->setCity($city)
            ->setZip($zip)
            ->setCountry($country);
    }
}