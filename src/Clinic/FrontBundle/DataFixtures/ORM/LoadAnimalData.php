<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 22/04/2015
 * Time: 11:34
 */

namespace Clinic\FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Clinic\FrontBundle\Entity\Animal;


class LoadAnimalData implements FixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $animal = new Animal();
        $animal->setTitle('Lapins & lapereaux');
        $animal->setDescription('Ils aiment les carottes mais avant tout ils aiment être en forme ! Ici nous soignons avec plaisir les petites, et grosses, peluches qu\'elles aient de grandes oreilles tombantes ou dressées !');
        $animal->setFontcode('6');

        $animal1 = new Animal();
        $animal1->setTitle('Chats & chatons');
        $animal1->setDescription('Ils adorent chasser les souris qui sont dans le jardin et ignorer celles de la cuisine ! Malgré leurs fortes têtes ils ont toujours besoin de nous et nous serons là pour qu\'ils puissent retourner empoiler vos coussins en toute sérenité.');
        $animal1->setFontcode('c');

        $animal2 = new Animal();
        $animal2->setTitle('Chiens & chiots');
        $animal2->setDescription('Ils apprécient d\'aller chercher la baballe et se jouent de vous lorsqu\'il s\'agit de la ramener ! Le meilleur ami de l\'Homme mérite les meilleurs soins ! Petits ou grands formats, ils seront bien traités, pas de jaloux.');
        $animal2->setFontcode('d');

        $manager->persist($animal);
        $manager->persist($animal1);
        $manager->persist($animal2);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }

}