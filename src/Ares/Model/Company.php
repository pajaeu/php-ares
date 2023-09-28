<?php

namespace Ares\Model;

class Company
{

    private string $name;
    private string $ico;
    private string $dic;
    private string $street;
    private string $city;
    private string $zip;
    private string $country;
    private string $dateCreated;
    private CompanyType $type;
    private TradeLicensingAuthority $tradeLicensingAuthority;
    private FinancialAuthority $financialAuthority;
    private array $businessSubjects = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Company
     */
    public function setName(string $name): Company
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIco(): string
    {
        return $this->ico;
    }

    /**
     * @param string $ico
     * @return Company
     */
    public function setIco(string $ico): Company
    {
        $this->ico = $ico;
        return $this;
    }

    /**
     * @return string
     */
    public function getDic(): string
    {
        return $this->dic;
    }

    /**
     * @param string $dic
     * @return Company
     */
    public function setDic(string $dic): Company
    {
        $this->dic = $dic;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Company
     */
    public function setStreet(string $street): Company
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Company
     */
    public function setCity(string $city): Company
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return Company
     */
    public function setZip(string $zip): Company
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Company
     */
    public function setCountry(string $country): Company
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    /**
     * @param string $dateCreated
     * @return Company
     */
    public function setDateCreated(string $dateCreated): Company
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return CompanyType
     */
    public function getType(): CompanyType
    {
        return $this->type;
    }

    /**
     * @param CompanyType $type
     * @return Company
     */
    public function setType(CompanyType $type): Company
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return TradeLicensingAuthority
     */
    public function getTradeLicensingAuthority(): TradeLicensingAuthority
    {
        return $this->tradeLicensingAuthority;
    }

    /**
     * @param TradeLicensingAuthority $tradeLicensingAuthority
     * @return Company
     */
    public function setTradeLicensingAuthority(TradeLicensingAuthority $tradeLicensingAuthority): Company
    {
        $this->tradeLicensingAuthority = $tradeLicensingAuthority;
        return $this;
    }

    /**
     * @return FinancialAuthority
     */
    public function getFinancialAuthority(): FinancialAuthority
    {
        return $this->financialAuthority;
    }

    /**
     * @param FinancialAuthority $financialAuthority
     * @return Company
     */
    public function setFinancialAuthority(FinancialAuthority $financialAuthority): Company
    {
        $this->financialAuthority = $financialAuthority;
        return $this;
    }

    /**
     * @return array
     */
    public function getBusinessSubjects(): array
    {
        return $this->businessSubjects;
    }

    /**
     * @param array $businessSubjects
     * @return Company
     */
    public function setBusinessSubjects(array $businessSubjects): Company
    {
        foreach ($businessSubjects as $subject) {
            $this->addBusinessSubject(new BusinessSubject($subject));
        }

        return $this;
    }

    /**
     * @param BusinessSubject $subject
     * @return void
     */
    public function addBusinessSubject(BusinessSubject $subject): void
    {
        $this->businessSubjects[] = $subject;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'ico' => $this->ico,
            'dic' => $this->dic,
            'street' => $this->street,
            'city' => $this->city,
            'zip' => $this->zip,
            'country' => $this->country,
            'date_created' => $this->dateCreated,
            'type' => $this->type->toArray(),
            'trade_licensing_authority' => $this->tradeLicensingAuthority->toArray(),
            'financial_authority' => $this->financialAuthority->toArray(),
            'business_subjects' => array_map(fn(BusinessSubject $subject) => $subject->getName(), $this->businessSubjects)
        ];
    }
}