<?php

namespace Clinic\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Sonata\MediaBundle\Entity\Media;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clinic\FrontBundle\Entity\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Clinic\FrontBundle\Entity\ProductCategory", inversedBy="products")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Clinic\FrontBundle\Entity\Animal", inversedBy="products")
     * @ORM\JoinTable(name="products_animals")
     */
    private $animals;


    /**
     * @ORM\ManyToOne(targetEntity="Clinic\FrontBundle\Entity\Brand", inversedBy="products")
     */
    private $brand;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToOne(targetEntity="\Clinic\MediaBundle\Entity\Media", inversedBy="product", cascade={"all"})
     */
    private $picture;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", options={"default" = 0})
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created = new \Datetime();
    }


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
     * @return Product
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
     * @return Product
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
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Product
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set category
     *
     * @param \Clinic\FrontBundle\Entity\ProductCategory $category
     * @return Product
     */
    public function setCategory(\Clinic\FrontBundle\Entity\ProductCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Clinic\FrontBundle\Entity\ProductCategory
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * Set picture
     *
     * @param \Clinic\MediaBundle\Entity\Media $picture
     * @return Product
     */
    public function setPicture(\Clinic\MediaBundle\Entity\Media $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \Clinic\MediaBundle\Entity\Media
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Product
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Product
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set brand
     *
     * @param \Clinic\FrontBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\Clinic\FrontBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Clinic\FrontBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Add animals
     *
     * @param \Clinic\FrontBundle\Entity\Animal $animals
     * @return Product
     */
    public function addAnimal(\Clinic\FrontBundle\Entity\Animal $animals)
    {
        $this->animals[] = $animals;

        return $this;
    }

    /**
     * Remove animals
     *
     * @param \Clinic\FrontBundle\Entity\Animal $animals
     */
    public function removeAnimal(\Clinic\FrontBundle\Entity\Animal $animals)
    {
        $this->animals->removeElement($animals);
    }

    /**
     * Get animals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnimals()
    {
        return $this->animals;
    }
}
