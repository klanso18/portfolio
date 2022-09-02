<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECTS = [
        [
            'name' => 'Evote',
            'description' => 'Construction d\'une application web permettant de créer une campagne de vote en ligne.',
            'created_at' => '2022-06-05',
            'stacks' => [0, 1, 2, 3, 4, 5, 6, 7]
        ],
        [
            'name' => 'Potes\'agers',
            'description' => 'Création d\'une application web de petites annonces dans l\'univers du potager.',
            'created_at' => '2022-05-05',
            'stacks' => [0, 1, 2, 4, 5, 6, 7]
        ],
        [
            'name' => 'Serial Series',
            'description' => 'Création d\'une application web regroupant et présentant toutes les meilleures séries du moment.',
            'created_at' => '2022-04-10',
            'stacks' => [0, 1, 2, 4, 5, 6, 7]
        ],
        [
            'name' => 'CV de Darth Vader',
            'description' => 'Création du CV de Darth Vader, mettant en valeur sa force et son côté obscur.',
            'created_at' => '2022-03-15',
            'stacks' => [0, 1, 2]
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

            foreach ($projectName['stacks'] as $stack) {
                $project->addStack($this->getReference('stack_'. $stack));
            }
            
            $manager->persist($project);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            StackFixtures::class,
        ];
    }
}
