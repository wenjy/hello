<?php
/**
 * @author: jiangyi
 * @date: 下午5:14 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class ArrayHasKeyTest extends TestCase
{
    /**
     * 当 $array 不包含 $key 时报告错误，错误讯息由 $message 指定
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertArrayHasKey()
    {
        $this->assertArrayHasKey('foo', ['foo' => 'baz']);
    }

    /**
     * 当 $array 包含 $key 时报告错误，错误讯息由 $message 指定
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertArrayNotHasKey()
    {
        $this->assertArrayNotHasKey('foo', ['bar' => 'baz']);
    }
}
