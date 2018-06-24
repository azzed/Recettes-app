<?php
/**
 * Created by PhpStorm.
 * UserController: Azzedine
 * Date: 01/05/2018
 * Time: 11:38
 */
namespace App\Entity;

use App\Router\URL;

class Recettes
{
    use HydratorTrait;

    protected $id;
    protected $nom;
    protected $ingredients;
    protected $liens;
    protected $user;
    protected $description;

    public function getUserId()
    {
        return $this->user;
    }


    public function __construct($data)
    {
        $this->hydrate($data);
        $this->user = $data['userId'];
    }

    public function videoLink()
    {
        return str_replace('watch?v=', 'embed/', $this->getLiens());
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
        return URL::RECETTE.$this->getId();
    }
    public function linkDelete()
    {
        return URL::DELETE_RECIPE.$this->getId();
    }
    public function linkUpdate()
    {
        return URL::UPDATE_RECIPE .$this->getId();
    }
}
