<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $relationship;

    /**
     * @ORM\Column(type="text")
     */
    private $details;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastContacted;

    /**
     * @ORM\Column(type="text")
     */
    private $username;

    //Gettters and Setters 

    public function updateLastContacted(){
        $this->lastContacted = new \DateTime("now");
    }

    public function getLastContacted(){
        return $this->lastContacted->format('Y-m-d H');
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDetails(){
        return $this->details;
    }

    public function setDetails($details){
        $this->details = $details;
    }

    public function getRelationship(){
        return $this->relationship;
    }

    public function setRelationship($relationship){
        $this->relationship = $relationship;
    }

    public function getEmail(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }
    
}
