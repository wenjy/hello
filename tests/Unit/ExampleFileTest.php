<?php
/**
 * @author: jiangyi
 * @date: 下午9:54 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\ExampleFile;
use Hello\Tests\TestCase;

class ExampleFileTest extends TestCase
{
    protected function setUp()
    {
        if (file_exists(dirname(__FILE__) . '/id')) {
            rmdir(dirname(__FILE__) . '/id');
        }
    }

    /**
     * 如果不使用诸如 vfsStream 这样的虚拟文件系统，
     * 就无法在隔离外部影响的情况下对 setDirectory() 方法进行测试
     * 和任何其他外部资源一样，文件系统可能会间歇性的出现一些问题，这使得和它交互的测试变得不可靠。
     * 在 setUp() 和 tearDown() 方法中，必须确保这个目录在测试前和测试后均不存在。
     * 如果测试在 tearDown() 方法被调用之前就终止了，这个目录就会遗留在文件系统中。
     * @throws \Exception
     * @author jiangyi
     */
    public function testDirectoryIsCreated()
    {
        $example = new ExampleFile('id');
        $this->assertFalse(file_exists(dirname(__FILE__) . '/id'));

        $example->setDirectory(dirname(__FILE__));
        $this->assertTrue(file_exists(dirname(__FILE__) . '/id'));
    }

    protected function tearDown()
    {
        if (file_exists(dirname(__FILE__) . '/id')) {
            rmdir(dirname(__FILE__) . '/id');
        }
    }
}
