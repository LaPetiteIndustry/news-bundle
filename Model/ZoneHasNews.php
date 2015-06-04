<?php

namespace Lpi\NewsBundle\Model;

use Application\Lpi\KernelBundle\Entity\Zone;

abstract class ZoneHasNews implements ZoneHasNewsInterface
{
    protected $position;

    protected $updatedAt;

    protected $createdAt;

    protected $zone;

    protected $news;

    public function __construct()
    {
        $this->position = 0;
        $this->enabled  = false;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(\DateTime $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getZone().' | '.$this->getNews();
    }

    /**
     * @param Zone $group
     *
     */
    public function setZone(Zone $group = null)
    {
       $this->zone = $group;
    }

    /**
     * @return Zone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param NewsInterface $event
     *
     * @return void
     */
    public function setNews(NewsInterface $event = null)
    {
        $this->news = $event;
    }

    /**
     * @return NewsInterface
     */
    public function getNews()
    {
        return $this->news;
    }


}
