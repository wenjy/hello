<?php
/**
 * @author: jiangyi
 * @date: 下午10:54 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class NanTest extends TestCase
{
    public function testAssertNan()
    {
        $this->assertNan(NAN);
    }
}
