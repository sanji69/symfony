<?php

namespace Actu\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Cocur\Slugify\Slugify;

/**
 * Articles
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="Actu\ArticleBundle\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"title"})
     */
    private $slug;


    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text", nullable=true)
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date_redac", type="datetime")
     */
    private $dateRedac;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_publish", type="datetime", nullable=true)
     */
    private $datePublish;


    /*
     * Constructeur
     */

    public function __construct()
    {
        $this->dateRedac = new \DateTime();
    }


    /*
     * Getter / Setter
     */

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Articles
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($this->title);

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set abstract.
     *
     * @param string $abstract
     *
     * @return Articles
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract.
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Articles
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateRedac.
     *
     * @param datetime_immutable $dateRedac
     *
     * @return Articles
     */
    public function setDateRedac($dateRedac)
    {
        $this->dateRedac = $dateRedac;

        return $this;
    }

    /**
     * Get dateRedac.
     *
     * @return datetime_immutable
     */
    public function getDateRedac()
    {
        return $this->dateRedac;
    }

    /**
     * Set datePublish.
     *
     * @param \DateTime|null $datePublish
     *
     * @return Articles
     */
    public function setDatePublish($datePublish = null)
    {
        $this->datePublish = $datePublish;

        return $this;
    }

    /**
     * Get datePublish.
     *
     * @return \DateTime|null
     */
    public function getDatePublish()
    {
        return $this->datePublish;
    }

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return Articles
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
