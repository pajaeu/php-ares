<?php

namespace Ares\Model\Factory;

use Ares\Model\Company;
use Ares\Model\CompanyType;
use Ares\Model\FinancialAuthority;
use Ares\Model\TradeLicensingAuthority;

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
            ->setType(new CompanyType($data['typeCode'], $data['typeString']))
            ->setTradeLicensingAuthority(new TradeLicensingAuthority($data['tradeLicensingAuthorityCode'], $data['tradeLicensingAuthorityName']))
            ->setFinancialAuthority(new FinancialAuthority($data['financialAuthorityCode'], $data['financialAuthorityName']));
    }
}