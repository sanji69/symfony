<?php

namespace App\ArticleBundle\DataFixtures\ORM;

// Gestionnaire des fixtures de Doctrine
// use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;

// Gestionnaire du Domain object de doctrine
use Doctrine\Common\Persistence\ObjectManager;

// L'entité Articles
use Actu\ArticleBundle\Entity\Articles;


class LoadArticlesFixtures implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $articles = new Articles();

        // title
        $articles->setTitle("Le titre de mon article");

        // content
        $articles->setContent("Excepturi consequuntur? Quasi laoreet quisque ultricies itaque pellentesque. Ullamco suspendisse exercitationem mollitia ligula incididunt placeat! Labore tempor semper! Phasellus ipsum adipiscing fugiat fuga eligendi risus id dignissim a do posuere, dui convallis. Adipiscing cubilia asperiores mollitia, neque curabitur fermentum? Netus tincidunt sit, pharetra cillum anim, provident morbi lectus, mollitia iste! Lobortis nisi, aliquip rhoncus, dapibus qui per amet atque vel architecto phasellus, euismod porro curabitur, amet! Repellendus cubilia dolorem augue, pede voluptas asperiores nam occaecat ultrices ea donec cursus commodo mattis, architecto consequatur nobis? Occaecat. Mattis ducimus malesuada animi voluptas scelerisque! Ut, irure incididunt, earum fringilla tempor blandit! Consequatur. Blanditiis.");

        $manager->persist($articles);

        $manager->flush();
    }
}