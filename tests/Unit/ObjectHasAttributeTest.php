<?php
/**
 * @author: jiangyi
 * @date: 上午9:40 2018/11/30
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class ObjectHasAttributeTest extends TestCase
{
    public function testAssertObjectHasAttribute()
    {
        $class = new \stdClass();
        $class->foo = 'foo';
        $this->assertObjectHasAttribute('foo', $class);
    }

    public function testAssertObjectNotHasAttribute()
    {
        $class = new \stdClass();
        $this->assertObjectNotHasAttribute('foo', $class);
    }
}
