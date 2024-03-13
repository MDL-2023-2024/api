<?php

use App\Kernel;
use Doctrine\DBAL\Types\Type;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

Type::addType('dateoracle', 'App\Type\OracleDateType');


return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
