<?php
/**
 * @author: jiangyi
 * @date: 下午5:59 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class CountTest extends TestCase
{
    /**
     * 当 $haystack 中的元素数量不是 $expectedCount 时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertCount()
    {
        $this->assertCount(1, ['foo']);
    }
}
