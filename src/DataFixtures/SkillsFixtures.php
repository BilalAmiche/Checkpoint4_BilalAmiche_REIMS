<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Skills;

class SkillsFixtures extends Fixture
{
    public const SKILLSS = [
        [
            "name" => "PHP",
            "description" => "test",
        ],

        [
            "name" => "HTML/CSS",
            "description" => "test",
        ],

        [
            "name" => "SQL",
            "description" => "test",
        ],

        [
            "name" => "Symfony",
            "description" => "test",
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SKILLSS as $data) {
            $skills = new Skills();
            $skills->setName($data['name']);
            $skills->setDescription($data['description']);
            $manager->persist($skills);
        }
        $manager->flush();
    }    
}

