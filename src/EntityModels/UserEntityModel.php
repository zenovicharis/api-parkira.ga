<?php

namespace Parkiraga\EntityModels;



class UserEntityModel
{
    public $name;
    public $surname;
    public $email;
    public $password;
    public $link;
    public $picture;

    public function __construct($name, $surname, $email, $password, $link, $picture)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->link = $link;
        $this->picture = $picture;
    }

}