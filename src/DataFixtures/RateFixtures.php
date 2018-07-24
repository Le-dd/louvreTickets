<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Rate;

class RateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rate = new Rate();
        $rate->setName("Normal")
             ->setPrice("16")
             ->setStatus("à partir de 12 ans");
        $manager->persist($rate);

        $rate = new Rate();
        $rate->setName("Enfant")
             ->setPrice("8")
             ->setStatus("à partir de 4 ans jusqu'à 12 ans");
        $manager->persist($rate);
        $rate = new Rate();
        $rate->setName("Gratuit")
             ->setPrice("0")
             ->setStatus("moins de 4 ans");
        $manager->persist($rate);
        $rate = new Rate();
        $rate->setName("Senior")
             ->setPrice("12")
             ->setStatus("à partir de 60 ans");
        $manager->persist($rate);
        $rate = new Rate();
        $rate->setName("Réduit")
             ->setPrice("10")
             ->setStatus("accordé sous certain condition (étudiant,militaire..)");
        $manager->persist($rate);
        $manager->flush();
    }
}
