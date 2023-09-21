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
    public function setName(string $name): self
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
    public function setIco(string $ico): self
    {
        $this->ico = $ico;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDic(): ?string
    {
        return $this->dic;
    }

    /**
     * @param string|null $dic
     * @return Company
     */
    public function setDic(?string $dic): self
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
    public function setStreet(string $street): self
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
    public function setCity(string $city): self
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
    public function setZip(string $zip): self
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
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'ico' => $this->ico,
            'dic' => $this->dic,
            'street' => $this->street,
            'city' => $this->city,
            'zip' => $this->zip,
            'country' => $this->country
        ];
    }
}