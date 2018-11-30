<?php
/**
 * @author: jiangyi
 * @date: 下午10:36 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class JsonFileEqualsJsonFileTest extends TestCase
{
    protected $arr = ['foo' => 'foo', 'bar' => 'bar'];

    /**
     * 当 $actualFile 对应的值与 $expectedFile 对应的值不匹配时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertJsonFileEqualsJsonFile()
    {
        file_put_contents(STUBS_ROOT . '/files/foo.json', json_encode($this->arr, JSON_PRETTY_PRINT));
        file_put_contents(STUBS_ROOT . '/files/bar.json', json_encode($this->arr, JSON_PRETTY_PRINT));
        $this->assertJsonFileEqualsJsonFile(STUBS_ROOT . '/files/foo.json', STUBS_ROOT . '/files/bar.json');
    }

    /**
     * 当 $actualJson 对应的值与 $expectedFile 对应的值不匹配时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertJsonStringEqualsJsonFile()
    {
        $this->assertJsonStringEqualsJsonFile(STUBS_ROOT . '/files/foo.json', json_encode($this->arr));
    }

    public function testAssertJsonStringEqualsJsonString()
    {
        $this->assertJsonStringEqualsJsonString(json_encode($this->arr), json_encode($this->arr));
    }
}
