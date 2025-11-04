<?php

abstract class Animal
{
    public $name = "Kucing";

    public abstract function run();
}

class Cat extends Animal
{
    public function run()
    {
        return $this->name . " berlari dengan cepat!";
    }
}

$cat = new Cat();
echo $cat->run();
