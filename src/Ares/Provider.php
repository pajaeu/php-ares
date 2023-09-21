<?php

namespace Ares;

use Ares\Exception\DatabaseNotRespondingException;
use Ares\Exception\NotExistingCompanyException;
use Ares\Model\Company;
use Ares\Model\Factory\CompanyFactory;

class Provider
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

        return CompanyFactory::create(
            (string) $data->OF,
            (string) $data->ICO,
            (string) $data->DIC,
            (string) $data->AD->UC,
            (string) $data->AA->N,
            (string) $data->AA->PSC,
            (string) $data->AA->NS,
        );
    }
}