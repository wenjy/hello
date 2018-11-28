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
    protected $stack;

    /**
     * 测试类的每个测试方法都会运行一次 setUp() 和 tearDown() 模板方法
     * （同时，每个测试方法都是在一个全新的测试类实例上运行的）
     * @author jiangyi
     */
    protected function setUp()
    {
        $this->stack = [];
    }

    public function testEmpty()
    {
        $this->assertTrue(empty($this->stack));
    }

    public function testPush()
    {
        $this->assertEquals(0, count($this->stack));

        array_push($this->stack, 'foo');
        $this->assertEquals('foo', $this->stack[count($this->stack)-1]);
        $this->assertEquals(1, count($this->stack));
    }

    public function testPop()
    {
        array_push($this->stack, 'foo');
        $this->assertEquals('foo', array_pop($this->stack));
        $this->assertTrue(empty($this->stack));
    }
}
