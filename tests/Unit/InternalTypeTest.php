<?php
/**
 * @author: jiangyi
 * @date: 下午10:22 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class InternalTypeTest extends TestCase
{
    public function testAssertInternalType()
    {
        $this->assertInternalType('string', '123');
        $this->assertInternalType('int', 123);
        $this->assertInternalType('bool', false);
        $this->assertInternalType('object', new \stdClass());
        $this->assertInternalType('array', []);
        $this->assertInternalType('float', 1.1);
        $this->assertInternalType('resource', $f = fopen(STUBS_ROOT . '/files/data.csv', 'r'));
        $this->assertInternalType('null', null);
        $this->assertInternalType('callable', function () {
        });
        fclose($f);
    }
}
