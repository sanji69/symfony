<?php

namespace Actu\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@ActuCategoryBundle/Default/index.html.twig');
    }
}
