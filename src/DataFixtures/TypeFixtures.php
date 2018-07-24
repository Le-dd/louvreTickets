<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Type;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

      $type = new Type();
      $type->setName("Journée")
           ->setStartTime(new \DateTime("09:00:00"))
           ->setEndTime(new \DateTime("17:00:00"));
      $manager->persist($type);

      $type = new Type();
      $type->setName("Demi-journée")
           ->setStartTime(new \DateTime("14:00:00"))
           ->setEndTime(new \DateTime("17:00:00"));
      $manager->persist($type);

        $manager->flush();
    }
}
