<?php
namespace Ayeo\Gs1\Model\ApplicationIdentifier;

class GtinBox extends AbstractIdentifier
{
    public function getCode()
    {
        return '02';
    }

    public function getValue()
    {
        return "0".(string)$this->label->getContent()->getGtin();
    }


}