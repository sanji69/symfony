<?php

namespace Actu\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Actu\ArticleBundle\Entity\Articles;
use Actu\ArticleBundle\Form\Type\ArticlesType;

class DefaultController extends Controller
{
    /**
     * Liste des articles
     */
    public function indexAction()
    {
        //Appel de l'Entity Manager
        $em = $this->getDoctrine()->getManager();

        $articles = $em
            ->getRepository('ActuArticleBundle:Articles')
            ->findAll();

        return $this->render('@ActuArticle/Default/index.html.twig', [
            "articles" => $articles
        ]);
    }

    /**
     * Création d'un article
     */
    public function createAction(Request $request)
    {
        // Instance de l'entité
        $articles = new Articles;

        // Création du formulaire à partire du FormType et basé sur l'entité
        $form = $this->createForm(ArticlesType::class, $articles);

        // Récupération des donéee du formulaire
        if($form->handleRequest($request)->isSubmitted())
        {
            //Appel de l'Entity Manager
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();

            //les données du formulaire "$form" sont automatiquement associées a l'entité "$articles"

            //Ajoute les donnée de l'entité dans la mémoire de l'entity Manager
            $em->persist($articles);

            //enregistre les données en BDD et on vide la mémoire de l'entityManager
            $em->flush();

            //redirection
            return $this->redirectToRoute("actu_article_retrieve", [
                "slug"=>$articles->getSlug('slug'),
                "id"=>$articles->getID('id')
            ]);
        }

        // Génération de la vue du formulaire
        $form = $form->createView();

        // Envois du formulaire au fichier de vu
        return $this->render('@ActuArticle/Default/create.html.twig',[
            "form" => $form
        ]);
    }

    /**
     * Lecture d'un article
     */
    public function retrieveAction($slug, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $article = $em
            ->getRepository('ActuArticleBundle:Articles')
            ->find($id);

        return $this->render('@ActuArticle/Default/retrieve.html.twig',
            ["article" => $article]
        );
    }

    /**
     * MAJ d'un article
     */
    public function updateAction(request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em
            ->getRepository('ActuArticleBundle:Articles')
            ->find($id);

        $form = $this->createForm(ArticlesType::class, $article);


        if($form->handleRequest($request)->isSubmitted())
        {
            $data = $form->getData();

            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute("actu_article_retrieve", [
                "slug"=>$article->getSlug('slug'),
                "id"=>$article->getID('id')
            ]);
        }

        $form = $form->createView();
        return $this->render('@ActuArticle/Default/update.html.twig',
            ["form" => $form]
        );
    }

    /**
     * Suppression d'un article
     */
    public function deleteAction()
    {
        return $this->render('@ActuArticle/Default/delete.html.twig');
    }
}
