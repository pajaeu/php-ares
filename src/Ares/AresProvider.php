<?php

namespace Ares;

use Ares\Exception\DatabaseNotRespondingException;
use Ares\Exception\NotExistingCompanyException;
use Ares\Model\Company;
use Ares\Model\Factory\CompanyFactory;

class AresProvider
{

    private const ARES_URL = 'http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=';

    /**
     * @throws DatabaseNotRespondingException
     * @throws NotExistingCompanyException
     */
    public function getByIco(string $ico): Company
    {
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
}