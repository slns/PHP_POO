<?php

class Circle extends Shape
{
    const SHAPE_TYPE = 3;

    protected $radius;

    public function __construct($radius)
    {
        parent::__construct();

        $this->radius = $radius;
    }

    public function area(): float
    {
        return pi() * $this->radius * $this->radius;
    }

    public function getFullDescription(): string
    {
        $class = get_class($this);
        $id = $this->getID();
        $name = $this->name;
        $radius = $this->radius;

        return <<<EOF
        Class: $class
        ID: $id
        Name: $name
        Radius: $radius
EOF;
    }

}
