<?php
/**
 * @author: jiangyi
 * @date: 下午2:19 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

/**
 * 依赖失败测试
 *
 * Class DependencyFailureTest
 * @package Hello\Tests\Unit
 */
class DependencyFailureTest extends TestCase
{
    public function testOne()
    {
        //$this->assertTrue(false);
        $this->assertTrue(true);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
        $this->assertTrue(true);
    }
}
