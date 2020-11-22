<?php
require_once 'Shape.php';
require 'Circle.php';

use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    private $circle;

    protected function setUp(): void
    {
        $this->circle = new ReflectionClass('Circle');
    }

    protected function tearDown(): void
    {
        $this->circle;
    }

    public function areaData(): array
    {
        return [
            [2, 12.57],
            [7, 153.94],
            [6, 113.1],
            [12, 452.39],
        ];
    }
    
    /**
     * @dataProvider areaData
     */
    public function test_area($area, $expected): void
    {
        $this->assertEquals($expected, round((new Circle($area))->area(), 2));
    }

    public function test_radius_property_visibility(): void
    {
        $this->assertTrue($this->circle->getProperty('radius')->isProtected());
    }

    public function test_inherits_from_shape(): void
    {
        $this->assertEquals('Shape', get_parent_class('Rectangle'));
    }

    public function test_shape_type(): void
    {
        $this->assertSame(3, Circle::SHAPE_TYPE);
    }

    public function test_getTypeDescription(): void
    {
        $this->assertEquals('Type: 3', Circle::getTypeDescription());
    }

    public function test_getFullDescription(): void
    {
        $circle = new Circle(27);

        $id = $circle->getId();
        $name = str_shuffle(time());
        $circle->name = $name;

        $value = <<<EOF
        Class: Circle
        ID: $id
        Name: $name
        Radius: 27
EOF;

        $this->assertEquals($value, $circle->getFullDescription());
    }
}
