<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page implements JsonSerializable
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var Book $book
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Book", inversedBy="pages")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    protected $book;

    /**
     * @var PageFormat[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\PageFormat", mappedBy="page")
     */
    protected $pageFormats;


    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->pageFormats = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param Book $book
     */
    public function setBook(Book $book)
    {
        $this->book = $book;
    }

    /**
     * @return PageFormat[]
     */
    public function getPageFormats()
    {
        return $this->pageFormats;
    }

    /**
     * @param PageFormat[] $pageFormats
     */
    public function setPageFormats(array $pageFormats)
    {
        $this->pageFormats = $pageFormats;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'book' => $_SERVER['HTTP_HOST'] . url('book', ['id' => $this->getBook()->getId()])
        ];
    }
}