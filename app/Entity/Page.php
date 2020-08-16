<?php

namespace App\Entity;


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
     * @var string $content
     *
     * @ORM\Column(type="string")
     */
    protected $content;

    /**
     * @var Book $book
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Book", inversedBy="pages")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    protected $book;

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
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

    public function jsonSerialize()
    {
        return [
            'content' => $this->getContent(),
            'book' => $_SERVER['HTTP_HOST'] . url('book', ['id' => $this->getBook()->getId()])
        ];
    }
}