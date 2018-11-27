<?php

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

/**
 * 简单测试数组
 * Class StackTest
 * @package Hello\Tests\Unit
 */
class StackTest extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}
