<?php

namespace Ares\Model\Factory;

use Ares\Model\Company;

class CompanyFactory
{

    public static function createFromArray(array $data): Company
    {
        return (new Company())
            ->setName($data['name'])
            ->setIco($data['ico'])
            ->setDic($data['dic'])
            ->setStreet($data['street'])
            ->setCity($data['city'])
            ->setZip($data['zip'])
            ->setCountry($data['country'])
            ->setDateCreated($data['dateCreated'])
            ->setTypeCode($data['typeCode'])
            ->setTypeString($data['typeString']);
    }
}