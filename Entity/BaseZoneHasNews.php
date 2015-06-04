<?php
namespace Lpi\NewsBundle\Entity;

use Lpi\NewsBundle\Model\ZoneHasNews;

abstract class BaseZoneHasNews extends ZoneHasNews
{
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}