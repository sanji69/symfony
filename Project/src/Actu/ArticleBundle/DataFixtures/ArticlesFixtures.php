<?php

namespace App\ArticleBundle\DataFixtures;

// Gestionnaire des fixtures de doctrine
use Doctrine\Bundle\FixturesBundle\Fixture;

// Gestionnaire du domain objet de doctrine
use Doctrine\Common\Persistence\ObjectManager;

//L'entité Articles
use App\Entity\ArticleBundle\Articles;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 article! Bam!
        // for ($i = 0; $i < 20; $i++)
        // {
            $article = new Articles();
            $article->setTitle('Titre : '.$i);
            $article->setContent('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." : '.$i);
            $manager->persist($articles);
        // }
        $manager->flush();
    }
}
