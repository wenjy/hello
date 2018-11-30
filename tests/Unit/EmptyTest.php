<?php
/**
 * @author: jiangyi
 * @date: 下午9:12 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class EmptyTest extends TestCase
{
    public function testAssertEmpty()
    {
        $this->assertEmpty([]);
    }

    public function testAssertNotEmpty()
    {
        $this->assertNotEmpty(123);
    }
}
