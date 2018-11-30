<?php
/**
 * @author: jiangyi
 * @date: 下午9:45 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class FalseTest extends TestCase
{
    public function testAssertFalse()
    {
        $this->assertFalse(false);
        $this->assertNotFalse('');
    }

    public function testAssertTrue()
    {
        $this->assertTrue(true);
        $this->assertNotTrue('');
    }
}
