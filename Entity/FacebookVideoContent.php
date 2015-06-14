<?php

namespace Lpi\NewsBundle\Entity;

use Lpi\NewsBundle\Model\FacebookVideoContent as BaseFacebookVideoContent;

class FacebookVideoContent extends BaseFacebookVideoContent
{
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}