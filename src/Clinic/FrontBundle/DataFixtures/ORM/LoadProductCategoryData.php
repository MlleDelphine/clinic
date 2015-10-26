<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 22/04/2015
 * Time: 11:53
 */

namespace Clinic\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Clinic\FrontBundle\Entity\ProductCategory;


class LoadProductCategoryData implements FixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category = new ProductCategory();
        $category->setTitle('Croquettes');
      

        $category1 = new ProductCategory();
        $category1->setTitle('Pâtées');
       
        $category2 = new ProductCategory();
        $category2->setTitle('Anti-puce');

        $manager->persist($category);
        $manager->persist($category1);
        $manager->persist($category2);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }

}