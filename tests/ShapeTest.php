<?php
require_once 'Shape.php';

use PHPUnit\Framework\TestCase;

class ShapeTest extends TestCase
{
    private $shape;

    protected function setUp(): void
    {
        $this->shape = new ReflectionClass('Shape');
    }

    protected function tearDown(): void
    {
        $this->shape;
    }

    public function areaData(): array
    {
        return [
            [6, 6, 36],
            [10, 11, 110],
            [3, 4, 12],
            [6, 9, 54],
        ];
    }

    /**
     * @dataProvider areaData
     */
    public function test_area($a, $b, $expected): void
    {
        $this->assertEquals($expected, (new Shape($a, $b))->area());
    }

    public function test_name_property_visibility(): void
    {
        $this->assertTrue($this->shape->getProperty('name')->isPublic());
    }

    public function test_length_property_visibility(): void
    {
        $this->assertTrue($this->shape->getProperty('length')->isProtected());
    }

    public function test_width_property_visibility(): void
    {
        $this->assertTrue($this->shape->getProperty('width')->isProtected());
    }

    public function test_id_property_visibility(): void
    {
        $this->assertTrue($this->shape->getProperty('id')->isPrivate());
    }

    public function test_setName(): void
    {
        $shape = new Shape(0, 0);
        $this->assertNull($shape->name);

        $name = str_shuffle(time());
        $shape->setName($name);
        $this->assertEquals($name, $shape->name);
    }

    public function test_getName(): void
    {
        $shape = new Shape(0, 0);
        $this->assertNull($shape->name);

        $name = str_shuffle(time());
        $shape->name = $name;
        $this->assertEquals($name, $shape->getName());
    }

    public function test_shape_type(): void
    {
        $this->assertSame(1, Shape::SHAPE_TYPE);
    }

    public function test_getTypeDescription(): void
    {
        $this->assertEquals('Type: 1', Shape::getTypeDescription());
    }

    public function test_getId()
    {
        $this->assertMatchesRegularExpression('/[0-9a-f]{13}/', (new Shape(0, 0))->getId());
    }

    public function test_getFullDescription(): void
    {
        $shape = new Shape(7, 6);

        $id = $shape->getId();
        $name = str_shuffle(time());
        $shape->name = $name;

        $value = <<<EOF
        Class: Shape
        ID: $id
        Name: $name
        Length: 7
        With: 6
EOF;

        $this->assertEquals($value, $shape->getFullDescription());
    }
}
