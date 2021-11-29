<?php

namespace App\DataFixtures;

use App\Entity\Record;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use joshtronic\LoremIpsum;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $lipsum = new LoremIpsum();
        for ($i = 0; $i < 100; $i++) {
            $record = new Record();
            $record->setTitle('record '.$i);
            $record->setDescription($lipsum->words(15));
            $record->setCreatedAt(new \DateTime(date("M-d-Y", mktime(0, 0, 0, date("m"), date("d")-mt_rand(0,30), date("Y")))));
            $manager->persist($record);
        }

        $manager->flush();
    }
}
