<?php

namespace Lpi\NewsBundle\Model;

use Lpi\KernelBundle\Entity\Behaviour\Enablable;
use Lpi\KernelBundle\Entity\Behaviour\Timestampable;

abstract class FacebookVideoContent
{
    use Timestampable, Enablable;

    protected $title;
    protected $link;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }


}