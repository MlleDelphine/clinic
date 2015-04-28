<?php

namespace Clinic\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clinic\FrontBundle\Entity\Repository\AnimalRepository")
 */
class Animal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=125)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="fontcode", type="string", length=125)
     */
    private $fontcode;

    /**
     * @ORM\ManyToMany(targetEntity="Clinic\FrontBundle\Entity\Animal", mappedBy="animals")
     */
    private $products;


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
     * Set title
     *
     * @param string $title
     * @return Animal
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Animal
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->title;
    }


    /**
     * Set fontcode
     *
     * @param string $fontcode
     * @return Animal
     */
    public function setFontcode($fontcode)
    {
        $this->fontcode = $fontcode;

        return $this;
    }

    /**
     * Get fontcode
     *
     * @return string 
     */
    public function getFontcode()
    {
        return $this->fontcode;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add products
     *
     * @param \Clinic\FrontBundle\Entity\Animal $products
     * @return Animal
     */
    public function addProduct(\Clinic\FrontBundle\Entity\Animal $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Clinic\FrontBundle\Entity\Animal $products
     */
    public function removeProduct(\Clinic\FrontBundle\Entity\Animal $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
