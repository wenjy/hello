<?php
/**
 * @author: jiangyi
 * @date: 上午10:29 2018/11/30
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

/**
 * Class DocCommentTest
 * @package Hello\Tests\Unit
 * @backupGlobals disabled 全局变量的备份与还原操作可以对某个测试用例类中的所有测试彻底禁用
 */
class DocCommentTest extends TestCase
{
    /**
     * @before
     */
    public function setupSomeFixtures()
    {
        // ...
    }

    /**
     * @beforeClass
     */
    public static function setUpSomeSharedFixtures()
    {
        // ...
    }

    /**
     * 标注用于指明此方法应当在测试用例类中的每个测试方法运行完成之后调用。
     * @after
     */
    public function tearDownSomeFixtures()
    {
        // ...
    }

    /**
     * 标注用于指明此静态方法应该于测试类中的所有测试方法都运行完成之后调用，用于清理共享基境。
     * @afterClass
     */
    public static function tearDownSomeSharedFixtures()
    {
        // ...
    }

    /**
     * 标注也可以用在测试方法这一级别
     * @backupGlobals enabled
     */
    public function testThatInteractsWithGlobalVariables()
    {
        $this->assertTrue(true);
    }

    public function testOne()
    {
        $this->assertTrue(true);
    }

    public function testTwo()
    {
        /* @codeCoverageIgnoreStart */
        $this->assertTrue(true);
        /* @codeCoverageIgnoreEnd */
    }
}
