<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public const IMAGES = [
        ['name' => 'cv_home2.png', 'is_main' => true, 'project' => 'project_0'],
        ['name' => 'cv_back.png', 'is_main' => false, 'project' => 'project_0'],
        ['name' => 'cv_skills.png', 'is_main' => false, 'project' => 'project_0'],
        ['name' => 'cv_contact.png', 'is_main' => false, 'project' => 'project_0'],
        ['name' => 'ss_home.png', 'is_main' => true, 'project' => 'project_1'],
        ['name' => 'ss_connex.png', 'is_main' => false, 'project' => 'project_1'],
        ['name' => 'ss_register.png', 'is_main' => false, 'project' => 'project_1'],
        ['name' => 'ss_index.png', 'is_main' => false, 'project' => 'project_1'],
        ['name' => 'ss_show.png', 'is_main' => false, 'project' => 'project_1'],
        ['name' => 'ss_show-own.png', 'is_main' => false, 'project' => 'project_1'],
        ['name' => 'ss_edit.png', 'is_main' => false, 'project' => 'project_1'],
        ['name' => 'pote_home.png', 'is_main' => true, 'project' => 'project_2'],
        ['name' => 'pote_cat2.png', 'is_main' => false, 'project' => 'project_2'],
        ['name' => 'pote_index.png', 'is_main' => false, 'project' => 'project_2'],
        ['name' => 'pote_add.png', 'is_main' => false, 'project' => 'project_2'],
        ['name' => 'pote_register.png', 'is_main' => false, 'project' => 'project_2'],
        ['name' => 'ev_home.png', 'is_main' => true, 'project' => 'project_3'],
        ['name' => 'ev_connexion.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_welcome.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_dashboard.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_new.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_result.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_graph.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_admin.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_list.png', 'is_main' => false, 'project' => 'project_3'],
        ['name' => 'ev_voter.png', 'is_main' => false, 'project' => 'project_3']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::IMAGES as $key => $imageName) {
            $image = new Image();
            $image->setName($imageName['name']);
            $image->setIsMain($imageName['is_main']);
            $image->setProject($this->getReference($imageName['project']));
            $manager->persist($image);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [(ProjectFixtures::class)];
    }
}
