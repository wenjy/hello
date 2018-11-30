<?php
/**
 * @author: jiangyi
 * @date: 下午6:00 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class DirectoryExistsTest extends TestCase
{
    public function testAssertDirectoryExists()
    {
        $this->assertDirectoryExists(STUBS_ROOT);
    }

    public function testAssertDirectoryIsReadable()
    {
        $this->assertDirectoryIsReadable(STUBS_ROOT);
    }

    public function testAssertDirectoryIsWritable()
    {
        $this->assertDirectoryIsWritable(STUBS_ROOT);
    }
}
