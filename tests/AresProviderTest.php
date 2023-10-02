<?php

use PHPUnit\Framework\TestCase;
use Ares\AresProvider;
use Ares\Exception\InvalidIcoException;
use Ares\Exception\NotExistingCompanyException;
use Ares\Model\Company;

class AresProviderTest extends TestCase
{

    public function testGetByIcoValid()
    {
        $aresProvider = new AresProvider();
        $ico = '11708727';

        $company = $aresProvider->getByIco($ico);

        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals($ico, $company->getIco());
    }

    public function testGetByIcoInvalidIcoException()
    {
        $aresProvider = new AresProvider();
        $ico = '111';

        $this->expectException(InvalidIcoException::class);
        $aresProvider->getByIco($ico);
    }

    public function testGetByIcoNotExistingCompanyException()
    {
        $aresProvider = new AresProvider();
        $ico = '12345679';

        $this->expectException(NotExistingCompanyException::class);
        $aresProvider->getByIco($ico);
    }
}