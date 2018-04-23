<?php

namespace Actu\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@ActuArticle/Default/index.html.twig');
    }

    public function createAction()
    {
        return $this->render('@ActuArticle/Default/create.html.twig');
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
