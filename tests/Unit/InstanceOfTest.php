<?php
/**
 * @author: jiangyi
 * @date: 下午10:17 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class InstanceOfTest extends TestCase
{
    /**
     * 当 $actual 不是 $expected 的实例时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf(\Exception::class, new \RuntimeException());
    }
}
