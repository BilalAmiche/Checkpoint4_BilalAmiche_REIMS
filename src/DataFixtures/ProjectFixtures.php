<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Project;

class ProjectFixtures extends Fixture
{
    public const PROJECTS = [
        [
            "name" => "Le book des Wilders",
            "description" => "Création d\'un book de la promo 2021-2022 de la wild code School ayant pour but de mettre en valeur les différentes compétences de chaque personnes. Le site à été développé en HTML et CSS",
            "date" => "2021-09-28",
            "lien" => "https://github.com/AmandineLalle/Projet-Book-des-Wilders",
            "image" => "https://"
        ],

        [
            "name" => "Baker Street Fighters",
            "description" => "Création d\'une application web orienté jeu en tour par tour dans l\'univers de Sherlock Holmes. On à créer plusieurs personnages jouables avec différentes stats ayant la capacité de donner des coups, esquiver, faire des coups critiques et récupérer de la vie. Chaque match était enregistré en base de données et possible de visionner dans la page historique. Le site à été développé en PHP via le système MVC",
            "date" => "2021-10-26",
            "lien" => "https://github.com/WildCodeSchool/reims-php-2109-project2-baker-street-fighter",
            "image" => "https://"
        ],

        [
            "name" => "Incit\'easy",
            "description" => "Création d\'une application web ayant pour but de limiter la consomation de déchets. Le site se divise en 3 parties ayant chaqu\'une une fonctionnalité différentes. Le dashboard permets de visualiser le poids des déchets à la semaine. Le profil permets de visualiser l\'historique des levées des semaines précédents ainsi que visualiser les informations du compte et de se déconnecter. La partie Communauté permet de partager, liker, commenter ou éditer un post. Le site à été développé en PHP à l\'aide du framework Symfony.",
            "date" => "2021-12-08",
            "lien" => "https://github.com/WildCodeSchool/reims-202109-php-project3-incit-easy",
            "image" => "https://"
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECTS as $data) {
            $project = new Project();
            $project->setName($data['name']);
            $project->setDescription($data['description']);
            $project->setDate($data['date']);
            $project->setLien($data['lien']);
            $project->setImage($data['image']);
            $manager->persist($project);
        }
        $manager->flush();
    }    
}
