<?php
/**
 * @author: jiangyi
 * @date: 下午10:14 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class InfiniteTest extends TestCase
{
    public function testAssertInfinite()
    {
        $this->assertInfinite(INF);
    }

    public function testAssertFinite()
    {
        $this->assertFinite(1);
    }
}
