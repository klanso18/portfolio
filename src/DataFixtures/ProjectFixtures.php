<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjectFixtures extends Fixture
{
    public const PROJECTS = [
        [
            'name' => 'CV de Darth Vader',
            'description' => 'Création du CV de Darth Vader, mettant en valeur sa force et son côté obscur.',
            'created_at' => '2022-03-15'
        ],
        [
            'name' => 'Serial Series',
            'description' => 'Création d\'une application web regroupant et présentant toutes les meilleures séries du moment.',
            'created_at' => '2022-04-10'
        ],
        [
            'name' => 'Potes\'agers',
            'description' => 'Création d\'une application web de petites annonces dans l\'univers du potager.',
            'created_at' => '2022-05-05'
        ],
        [
            'name' => 'Evote',
            'description' => 'Construction d\'une application web permettant de créer une campagne de vote en ligne.',
            'created_at' => '2022-05-05'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROJECTS as $key => $projectName) {
            $project = new Project();
            $project->setName($projectName['name']);
            $project->setDescription($projectName['description']);
            $project->setCreatedAt(new DateTime($projectName['created_at']));
            $this->addReference('project_' . $key, $project);
            $manager->persist($project);
        }
        $manager->flush();
    }
}
