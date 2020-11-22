<?php

class Shape {

    const SHAPE_TYPE = 1;

    public $name;
    protected $length, $width;
    private $id;

    public function __construct($length = 0, $width = 0) {
        $this->length   = $length;
        $this->width    = $width;
        $this->id       = uniqid();
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getID() {
        return $this->id;
    }

    public function area() {
        return $this->length * $this->width;
    }

    public static function getTypeDescription() {
        // return sprintf('Type: %d', get_called_class()::SHAPE_TYPE);
        $class = get_called_class();
        return  <<<EOF
        Type: "$class"::SHAPE_TYPE)
EOF;
    }

    public function getFullDescription() {
       $class = get_class($this);
       $id = $this->getID();
       $name = $this->name;
       $length = $this->length;
       $with = $this->width;
       
       return  <<<EOF
        Class: "$class"
        ID: "$id"
        Name: "$name"
        Length: "$length"
        With: "$with
EOF;       
    }

}