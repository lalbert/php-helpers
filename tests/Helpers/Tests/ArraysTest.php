<?php

namespace Lalbert\Helpers\Tests;

use Lalbert\Helpers\Arrays;

class ArraysTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getArray
     */
    public function testIsIndexed($array, $type)
    {
        $expected = $type;
        if (!\is_bool($type)) {
            $expected = 'indexed' == $type;
        }

        $this->assertEquals($expected, Arrays::isIndexed($array));
    }

    /**
     * @dataProvider getArray
     */
    public function testIsAssociative($array, $type)
    {
        $expected = $type;
        if (!\is_bool($type)) {
            $expected = 'associative' == $type;
        }

        $this->assertEquals($expected, Arrays::isAssociative($array));
    }

    public function getArray()
    {
        return array(
            // Indexed
            array(array(), 'indexed'),
            array(array('a', 'b', 'c'), 'indexed'),
            array(array(5, 10, 15), 'indexed'),
            array(array(array('a', 'b', 'c'), array(5, 10, 15)), 'indexed'),
            array(array('0' => 'a', '1' => 'b', '2', 'c'), 'indexed'),

            // Bad indexed (associative)
            array(array(1 => 0, 2 => 1, 3 => 2), 'associative'),

            // Associative
            array(array('foo' => 'bar', 'other' => 'value'), 'associative'),

            // Other
            array('string', 'string'),
            array(new \stdClass(), 'object'),
        );
    }
}
