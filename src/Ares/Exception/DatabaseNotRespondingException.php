<?php

namespace Ares\Exception;

class DatabaseNotRespondingException extends \Exception
{
    protected $message = 'Ares is currently not responding.';
}