<?php
/**
 * @author: jiangyi
 * @date: 下午10:12 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class GreaterThanTest extends TestCase
{
    /**
     * 当 $actual 的值不大于 $expected 的值时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertGreaterThan()
    {
        $this->assertGreaterThan(2, 3);
    }

    /**
     * 当 $actual 的值不大于且不等于 $expected 的值时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertGreaterThanOrEqual()
    {
        $this->assertGreaterThanOrEqual(2, 3);
    }

    /**
     * 当 $actual 的值不小于 $expected 的值时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertLessThan()
    {
        $this->assertLessThan(3, 2);
    }

    /**
     * 当 $actual 的值不小于且不等于 $expected 的值时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertLessThanOrEqual()
    {
        $this->assertLessThanOrEqual(2, 2);
    }
}
