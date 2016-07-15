<?php
/**
 * Description of Category
 *
 * obs: Não pode haver annotation aqui em cima.
 * 
 * author Deyvison Rodrigo B. Estevam <deyvison_rodrigo@hotmail.com>
 * date Jul 15, 2016
 * 
 */

namespace App\Entity;

/**
 * @Entity
 * @Table(name="categories")
 */
class Category {
    
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @Column(type="string", length=100)
     */
    private $name;
    
    /**
     * 
     * @return type
     */
    function getId() {
        return $this->id;
    }

    /**
     * 
     * @return type
     */
    function getName() {
        return $this->name;
    }
    
    /**
     * 
     * @param type $name
     * @return \App\Entity\Category
     */
    function setName($name) {
        $this->name = $name;
        return $this;
    }

}
