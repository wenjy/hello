<?php
/**
 * @author: jiangyi
 * @date: 下午10:12 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\ExampleFile;
use Hello\Tests\TestCase;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;

class ExampleVfsStreamWrapperTest extends TestCase
{
    /**
     * @throws \org\bovigo\vfs\vfsStreamException
     * @author jiangyi
     */
    public function setUp()
    {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory('exampleDir'));
    }

    /**
     * 测试本身更加简洁。
     * vfsStream 让开发者能够完全控制被测代码所处的文件系统环境。
     * 由于文件系统操作不再对真实文件系统进行操作，tearDown() 方法中的清理操作不再需要了。
     * @throws \Exception
     * @author jiangyi
     */
    public function testDirectoryIsCreated()
    {
        $example = new ExampleFile('id');
        $this->assertFalse(vfsStreamWrapper::getRoot()->hasChild('id'));

        $example->setDirectory(vfsStream::url('exampleDir'));
        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild('id'));
    }
}
