<?php
namespace Lpi\NewsBundle\Model;

use Application\Lpi\KernelBundle\Entity\Zone;

interface ZoneHasNewsInterface
{
    /**
     * @param Zone $slider
     *
     */
    public function setZone(Zone $group = null);

    /**
     * @return void
     */
    public function getZone();

    /**
     * @param NewsInterface $media
     *
     * @return void
     */
    public function setNews(NewsInterface $event = null);

    /**
     * @return NewsInterface
     */
    public function getNews();

    /**
     * @param int $position
     *
     * @return int
     */
    public function setPosition($position);

    /**
     * @return int
     */
    public function getPosition();

    /**
     * @param \DateTime|null $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(\DateTime $updatedAt = null);

    /**
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * @param \DateTime|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(\DateTime $createdAt = null);

    /**
     * @return void
     */
    public function getCreatedAt();

    /**
     * @return void
     */
    public function __toString();
}
