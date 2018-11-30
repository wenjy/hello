<?php
/**
 * @author: jiangyi
 * @date: 上午9:57 2018/11/30
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class SameTest extends TestCase
{
    /**
     * 当两个变量 $expected 和 $actual 的值与类型不完全相同时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testOne()
    {
        $this->assertSame(2204, 2204);
    }

    /**
     * 当两个变量 $expected 和 $actual 不是指向同一个对象的引用时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testTwo()
    {
        $class = new \stdClass();
        $this->assertSame($class, $class);
    }
}
