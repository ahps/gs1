<?php
namespace Ayeo\Gs1\Validator;

use Ayeo\Gs1\Utils\CheckDigitCalculator;
use Ayeo\Gs1\Validator\Constraint\GcpFormat;
use Ayeo\Gs1\Validator\Constraint\GlnFormat;
use Ayeo\Gs1\Validator\Constraint\Gtin\Gtin13;
use Ayeo\Validator\Constraint;
use Ayeo\Validator\ValidationRules;

class StandardLogisticLabelRules extends ValidationRules
{
    /**
     * @return array
     */
    public function getRules()
    {
        return
        [
            ['company',
                [
                    ['gcp', new GcpFormat()],
                    ['name', new Constraint\MinLength(10)],
                    ['location',
                        [
                            ['gln', new GlnFormat()],
                            ['telephoneNumber', new Constraint\MinLength(5)],
                            ['faxNumber', new Constraint\MinLength(5)],
                            ['websiteAddress', new Constraint\MinLength(5)],
                            ['address',
                                [
                                    ['streetName', new Constraint\MinLength(2)],
                                    ['buildingNumber', new Constraint\MinLength(1)],
                                    ['townName', new Constraint\MinLength(5)],
                                    ['postcode', new Constraint\MinLength(2)],
                                    ['countryName', new Constraint\MinLength(2)]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            
            ['content',
                [
                    ['name', new Constraint\NotNull()],

                    ['gtin', new Gtin13(new CheckDigitCalculator())],
                    //['gtin', new Constraint\NotClassInstance('\Ayeo\Gs1\Model\Gtin\InvalidFormat')],

                    ['bestBefore', new Constraint\DateTimeHigherThan(new \DateTime())],
                    ['bestBefore', new Constraint\NotNull()],
                    ['quantity', new Constraint\NumericMin(1)],
                    ['grossWeight', new Constraint\NumericMin(1)],
                    ['batchSymbol', new Constraint\MinLength(5)]
                ]
            ],

            ['orderNumber', new Constraint\NumericMin(1)],
            ['sscc', new Constraint\Length(18)],
        ];
    }
}