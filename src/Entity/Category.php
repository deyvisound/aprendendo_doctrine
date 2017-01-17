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
    private $nome;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }
    
    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }
    
}
