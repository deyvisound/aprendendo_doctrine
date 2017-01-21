<?php

namespace App\Entity;

/**
 * @Entity
 * @table(name="categories")
 */
class Category{
    
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
    private $name;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }
    
    function setName($name) {
        $this->name = $name;
        return $this;
    }
    
}
