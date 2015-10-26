<?php

namespace Clinic\MediaBundle\Entity;

use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;
use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table("media_media")
 * @ORM\Entity(repositoryClass="Clinic\MediaBundle\Entity\MediaRepository")
 */
class Media extends BaseMedia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     */
    private $identification_name;

    /**
     * @var \Clinic\FrontBundle\Entity\Brand
     * @ORM\OneToOne(targetEntity="Clinic\FrontBundle\Entity\Brand", mappedBy="picture", cascade={"all"})
     */
    private $brand;

    /**
     * @var \Clinic\FrontBundle\Entity\Product
     * @ORM\OneToOne(targetEntity="Clinic\FrontBundle\Entity\Product", mappedBy="picture", cascade={"all"})
     */
    private $product;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set identification_name
     *
     * @param string $identificationName
     * @return Media
     */
    public function setIdentificationName($identificationName)
    {
        $this->identification_name = $identificationName;

        return $this;
    }

    /**
     * Get identification_name
     *
     * @return string
     */
    public function getIdentificationName()
    {
        return $this->identification_name;
    }

    /**
     * Set brand
     *
     * @param \Clinic\FrontBundle\Entity\Brand $brand
     * @return Media
     */
    public function setBrand(\Clinic\FrontBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \\Clinic\FrontBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }


    /**
     * Set product
     *
     * @param \Clinic\FrontBundle\Entity\Product $product
     * @return Media
     */
    public function setProduct(\Clinic\FrontBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \\Clinic\FrontBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

}
