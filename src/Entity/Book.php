<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="books")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $cover;

    /**
     * @var Page[]
     *
     * @ORM\OneToMany(targetEntity="Page", mappedBy="book")
     */
    protected $pages;

    public function __construct() {
        $this->pages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param mixed $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return Page[]
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param Page[] $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }
}