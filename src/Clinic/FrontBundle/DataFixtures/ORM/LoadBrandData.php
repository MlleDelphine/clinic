<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 22/04/2015
 * Time: 11:56
 */

namespace Clinic\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Clinic\FrontBundle\Entity\Brand;


class LoadBrandData implements FixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $brand = new Brand();
        $brand->setTitle('Hill\'s');
        $brand->setDescription("Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.");

        $brand1 = new Brand();
        $brand1->setTitle('Royal Canin');
        $brand1->setDescription("Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.");


        $brand2 = new Brand();
        $brand2->setTitle('Frontline');
        $brand2->setDescription("Illud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.");


        $manager->persist($brand);
        $manager->persist($brand1);
        $manager->persist($brand2);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 3;
    }

}