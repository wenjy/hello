<?php
/**
 * @author: jiangyi
 * @date: 下午4:26 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class ExpectedErrorTest extends TestCase
{
    /**
     * @expectedException PHPUnit\Framework\Error\Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
}
