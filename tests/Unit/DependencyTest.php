<?php
/**
 * @author: jiangyi
 * @date: 下午2:31 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

/**
 * 依赖测试
 * Class DependencyTest
 * @package Hello\Tests\Unit
 */
class DependencyTest extends TestCase
{
    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * 依赖 testEmpty 的返回值
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * 依赖 testPush 的返回值
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }
}
