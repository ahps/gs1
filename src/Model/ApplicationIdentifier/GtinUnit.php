<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class GtinUnit extends AbstractIdentifier
{
    public function getCode()
    {
        return '01';
    }

    public function getValue()
    {
        return (string) $this->label->getContent()->getGtin();
    }


}