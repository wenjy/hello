<?php
/**
 * @author: jiangyi
 * @date: 下午9:49 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class FileExistsTest extends TestCase
{
    public function testAssertFileExists()
    {
        $this->assertFileExists(STUBS_ROOT . '/files/data.csv');
    }

    public function testAssertFileNotExists()
    {
        $this->assertFileNotExists(STUBS_ROOT . '/files/data.csv1');
    }

    public function testAssertFileIsReadable()
    {
        $this->assertFileIsReadable(STUBS_ROOT . '/files/data.csv');
    }

    public function testAssertFileIsWritable()
    {
        $this->assertFileIsWritable(STUBS_ROOT . '/files/data.csv');
    }
}
