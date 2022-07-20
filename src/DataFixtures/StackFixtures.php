<?php

namespace App\DataFixtures;

use App\Entity\Stack;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StackFixtures extends Fixture
{
    public const STACKS = [
        ['name' => 'HTML'],
        ['name' => 'CSS'],
        ['name' => 'PHP'],
        ['name' => 'Symfony'],
        ['name' => 'JavaScript'],
        ['name' => 'MySQL'],
        ['name' => 'Twig'],
        ['name' => 'Bootstrap']
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self::STACKS as $key => $stackName) {
            $stack = new Stack();
            $stack->setName($stackName['name']);
            $manager->persist($stack);
        }
        $manager->flush();
    }
}
