<?php

namespace Clinic\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProductCategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clinic\FrontBundle\Entity\Repository\ProductCategoryRepository")
 */
class ProductCategory
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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="Clinic\FrontBundle\Entity\Product", mappedBy="category", cascade={"remove", "persist"})
     */
    private $products;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


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
     * @return ProductCategory
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
     * Set slug
     *
     * @param string $slug
     * @return ProductCategory
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
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->created = new \Datetime();
    }

    /**
     * Add products
     *
     * @param \Clinic\FrontBundle\Entity\Product $product
     * @return ProductCategory
     */
    public function addProduct(\Clinic\FrontBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        // On lie le produit à la catégorie /!\ que de ce côté là !
        $product->setCategory($this);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
        // $product->setCategory(null);

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Clinic\FrontBundle\Entity\Product $products
     */
    public function removeProduct(\Clinic\FrontBundle\Entity\Product $products)
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

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ProductCategory
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
     * @return string
     */
    public function __toString()
    {
        return (string) $this->title;
    }

}
