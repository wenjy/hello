<?php
/**
 * @author: jiangyi
 * @date: 下午9:47 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class FileEqualsTest extends TestCase
{
    public function testAssertFileEquals()
    {
        $this->assertFileEquals(STUBS_ROOT . '/files/data.csv', STUBS_ROOT . '/files/data.csv');
    }

    public function testAssertFileNotEquals()
    {
        $this->assertFileNotEquals(STUBS_ROOT . '/files/data.csv', STUBS_ROOT . '/files/GoogleSearch.wsdl');
    }
}
