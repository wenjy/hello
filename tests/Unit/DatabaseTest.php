<?php
/**
 * @author: jiangyi
 * @date: 下午11:04 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

/**
 * 必须有 mysqli 扩展
 * @requires extension mysqli
 */
class DatabaseTest extends TestCase
{
    protected function setUp()
    {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped('MySQLi 扩展不可用。');
        }
    }

    /**
     * PHP 版本 >= 5.3
     * @requires PHP 5.3
     */
    public function testConnection()
    {
        $this->assertTrue(true);
    }
}
