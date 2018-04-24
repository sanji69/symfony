<?php

namespace Actu\ArticleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionResolver\OptionResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // <input type="text" name = "title">
            ->add("title",TextType::class, [
                "label"=> "Titre de l'article",
            ])
        ;
    }
}
