<?php

namespace App\Entity;

/**
 * @Entity
 * @table(name="posts")
 */
class Post{
    
    /**
     *@Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;
    
    /**
     *@column(type="string", length=100)
     * @var type 
     */
    private $title;
    
    /**
     *@column(type="text")
     * @var type 
     */
    private $content;

    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    function setContent($content) {
        $this->content = $content;
        return $this;
    }


}
