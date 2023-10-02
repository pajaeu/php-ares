<?php

namespace Ares;

use Ares\Exception\DatabaseNotRespondingException;
use Ares\Exception\InvalidIcoException;
use Ares\Exception\NotExistingCompanyException;
use Ares\Model\Company;
use Ares\Model\Factory\CompanyFactory;

class AresProvider
{

    private const ARES_URL = 'http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=';

    /**
     * @param string $ico
     * @return Company
     * @throws DatabaseNotRespondingException
     * @throws InvalidIcoException
     * @throws NotExistingCompanyException
     */
    public function getByIco(string $ico): Company
    {
        if (!$this->verifyIco($ico)) {
            throw new InvalidIcoException('ICO is invalid.');
        }

        $content = file_get_contents(self::ARES_URL . $ico);
        $xml  = simplexml_load_string($content);

        if (!$xml) {
            throw new DatabaseNotRespondingException('Ares is currently not responding. Please try again later.');
        }

        $docNamespaces = $xml->getDocNamespaces();
        $data = $xml->children($docNamespaces['are']);
        $data = $data->children($docNamespaces['D'])->VBAS;

        if (!$data) {
            throw new NotExistingCompanyException('Company does not exist.');
        }

        return CompanyFactory::createFromArray([
            'name' => (string) $data->OF,
            'ico' => (string) $data->ICO,
            'dic' => (string) $data->DIC,
            'street' => (string) $data->AD->UC,
            'city' => (string) $data->AA->N,
            'zip' => (string) $data->AA->PSC,
            'country' => (string) $data->AA->NS,
            'dateCreated' => (string) $data->DV,
            'typeCode' => (string) $data->PF->KPF,
            'typeString' => (string) $data->PF->NPF,
            'tradeLicensingAuthorityCode' => (string) $data->RRZ->ZU->KZU,
            'tradeLicensingAuthorityName' => (string) $data->RRZ->ZU->NZU,
            'financialAuthorityCode' => (string) $data->RRZ->FU->KFU,
            'financialAuthorityName' => (string) $data->RRZ->FU->NFU,
            'businessSubjects' => (array) $data->PPI->PP->T
        ]);
    }

    /**
     * @param string $ico
     * @return bool
     */
    private function verifyIco(string $ico): bool
    {
        $ico = preg_replace('#\s+#', '', $ico);

        if (!preg_match('#^\d{8}$#', $ico)) {
            return false;
        }

        $a = 0;
        for ($i = 0; $i < 7; $i++) {
            $a += $ico[$i] * (8 - $i);
        }

        $a = $a % 11;
        if ($a === 0) {
            $c = 1;
        } elseif ($a === 1) {
            $c = 0;
        } else {
            $c = 11 - $a;
        }

        return (int) $ico[7] === $c;
    }
}