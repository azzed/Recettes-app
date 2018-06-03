<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 01/05/2018
 * Time: 11:38
 */
namespace App\Entity;

class Recettes
{
    use HydratorTrait;

    protected $id;
    protected $nom;
    protected $ingredients;
    protected $liens;
    protected $description;

    public function __construct($data)
    {
        $this->hydrate($data);

    }

    public function videoLink()
    {
        return str_replace('watch?v=','embed/',$this->getLiens());
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredient
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getPratique()
    {
        return $this->pratique;
    }

    /**
     * @param mixed $pratique
     */
    public function setPratique($pratique)
    {
        $this->pratique = $pratique;
    }

    /**
     * @return mixed
     */
    public function getLiens()
    {
        return $this->liens;
    }

    /**
     * @param mixed $liens
     */
    public function setLiens($liens)
    {
        $this->liens = $liens;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



    public function link()
    {
        return '/Recette-app/?recette/'.$this->getId();
    }
    public function linkDelete()
    {
        return '/Recette-app/?delete/'.$this->getId();
    }
    public function linkUpdate()
    {
        return '/Recette-app/?update/'.$this->getId();
    }
}