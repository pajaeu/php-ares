<?php

namespace Ares\Exception;

class InvalidIcoException extends \Exception
{
    protected $message = 'Cannot process data, ICO is in wrong format.';
}