<?php
namespace Lpi\NewsBundle\Entity;

use Lpi\NewsBundle\Model\News;

abstract class BaseNews extends News
{
//    protected $zones;

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