<?php
namespace Lpi\NewsBundle\Model;


use Application\Sonata\MediaBundle\Entity\Gallery;
use Sonata\MediaBundle\Model\GalleryInterface;
use Sonata\MediaBundle\Model\MediaInterface;

interface NewsInterface
{
    /**
     * @return mixed
     */
    public function getId();

    public function getImage();

    public function getExcerpt();

    public function getGallery();

    public function setGallery(Gallery $gallery);

    public function setImage(MediaInterface $image);

    /**
     * Set name
     *
     * @param string $name
     */
    public function setTitle($name);

    public function setExcerpt($excerpt);

    /**
     * Get name
     *
     * @return string $name
     */
    public function getTitle();

    /**
     * Get name
     *
     * @return string $header
     */
    public function getHeader();

    /**
     * Set header
     *
     * @param string $header
     */
    public function setHeader($header);

    /**
     * Set date
     *
     * @param string $date
     */
    public function setDate(\DateTime $date);

    /**
     * Get date
     *
     * @return string $date
     */
    public function getDate();

    /**
     * Set description
     *
     * @param string $description
     */
    public function setContent($description);

    /**
     * Get description
     *
     * @return string $description
     */
    public function getContent();

    /**
     * Set updated_at
     *
     * @param \Datetime $updatedAt
     */
    public function setUpdatedAt(\Datetime $updatedAt = null);

    /**
     * Get updated_at
     *
     * @return \Datetime $updatedAt
     */
    public function getUpdatedAt();

    /**
     * Set created_at
     *
     * @param \Datetime $createdAt
     */
    public function setCreatedAt(\Datetime $createdAt = null);

    /**
     * Get created_at
     *
     * @return \Datetime $createdAt
     */
    public function getCreatedAt();

    public function __toString();
}
