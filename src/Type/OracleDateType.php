<?php

// src/Type/OracleDateType.php

namespace App\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;

class OracleDateType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getDateTypeDeclarationSQL($column);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        // Conversion logic according to your date format
        $date = \DateTime::createFromFormat('d-M-y', $value);
        if (!$date) {
            throw ConversionException::conversionFailedFormat($value, $this->getName(), 'd-M-y');
        }
        return $date;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d');
        }
        return $value;
    }

    public function getName()
    {
        return 'dateoracle'; // Custom type name
    }
}
