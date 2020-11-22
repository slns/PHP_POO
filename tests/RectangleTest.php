<?php
require_once 'Shape.php';
require 'Rectangle.php';

use PHPUnit\Framework\TestCase;

class RectangleTest extends TestCase
{
    private $rectangle;

    protected function setUp(): void
    {
        $this->rectangle = new ReflectionClass('Rectangle');
    }

    protected function tearDown(): void
    {
        $this->rectangle;
    }

    public function test_inherits_from_shape(): void
    {
        $this->assertEquals('Shape', get_parent_class('Rectangle'));
    }

    public function test_shape_type(): void
    {
        $this->assertSame(2, Rectangle::SHAPE_TYPE);
    }

    public function test_getTypeDescription(): void
    {
        $this->assertEquals('Type: 2', Rectangle::getTypeDescription());
    }

    public function test_getFullDescription(): void
    {
        $rectangle = new Rectangle(10, 2);

        $id = $rectangle->getId();
        $name = str_shuffle(time());
        $rectangle->name = $name;

        $value = <<<EOF
        Class: Rectangle
        ID: $id
        Name: $name
        Length: 10
        With: 2
EOF;

        $this->assertEquals($value, $rectangle->getFullDescription());
    }

    public function test_inheritance(): void
    {
        $methods = $this->rectangle->getMethods();

        $this->assertEmpty(array_filter($methods, function ($method) {
            return $method->class != 'Shape';
        }), 'Rectangle class should not contain any methods.');
    }
}
