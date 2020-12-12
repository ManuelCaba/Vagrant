<?php


class Person
{
    private $idPerson;
    private $name;
    private $surname;
    private $age;
    //Se establece una imagen por defecto.
    private $picture="https://www.yerbabuena.gob.ar/sites/default/files/150150.jpg";

    /**
     * @return int
     */
    public function getIdPerson()
    {
        return $this->idPerson;
    }

    /**
     * @param int $idPerson
     */
    public function setIdPerson($idPerson)
    {
        $this->idPerson = $idPerson;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    public function __toString(){
        $string="<div style='height:155px'><p><img width='125px' style='float:left;padding:15px' src='".$this->getPicture()."'/>    <br><b>Nombre:</b>".$this->getName()." <br>  <b>Apellido:</b>".$this->getSurname()." <br>    <b>Edad:</b>".$this->getAge()." <br> </p></div>";
        return $string;
    }
}