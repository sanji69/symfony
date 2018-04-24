<?php

namespace Actu\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Actu\ArticleBundle\Entity\Articles;
use Actu\ArticleBundle\Form\Type\ArticlesType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@ActuArticle/Default/index.html.twig');
    }

    public function createAction()
    {
        // instance de l'entité
        $articles = new Articles;

        // Création du formulaire a partir du FormType et basé sur l'entité
        $form = $this->createForm(ArticlesType::class, $articles);

        //Génération  de la vue du formulaire
        $form = $form->createView();

        return $this->render('@ActuArticle/Default/create.html.twig', [
            "Myform"->$form;
        ]);
    }

    public function retriveAction()
    {
        return $this->render('@ActuArticle/Default/retrive.html.twig');
    }

    public function updateAction()
    {
        return $this->render('@ActuArticle/Default/update.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('@ActuArticle/Default/delete.html.twig');
    }
}
