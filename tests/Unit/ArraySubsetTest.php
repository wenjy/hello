<?php
/**
 * @author: jiangyi
 * @date: 下午5:20 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class ArraySubsetTest extends TestCase
{
    /**
     * 当 $array 不包含 $subset 时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertArraySubset()
    {
        $this->assertArraySubset(['config' => ['key-a', 'key-b']], ['config' => ['key-a', 'key-b']]);
    }
}
