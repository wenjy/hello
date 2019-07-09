<?php
/**
 * @author: jiangyi
 * @date: 上午9:44 2018/11/30
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class StringMatchesFormatTest extends TestCase
{
    /**
     * %i：带符号整数值，例如 +3142、-3142
     * %d：无符号整数值，例如 123456
     * %x：一个或多个十六进制字符。所谓十六进制字符，指的是在以下范围内的字符：0-9、a-f、A-F。
     * %f：浮点数，例如 3.142、-3.142、3.142E-10、3.142e+10。
     * @throws \Exception
     * @author jiangyi
     */
    public function testByI()
    {
        $this->assertStringMatchesFormat('%i', '-10');
        $this->assertStringMatchesFormat('%d', '10');
        $this->assertStringMatchesFormat('%x', 'FFF');
        $this->assertStringMatchesFormat('%f', '3.142e+10');
    }

    /**
     * %e：表示目录分隔符，例如在 Linux 系统中是 /
     * @throws \Exception
     * @author jiangyi
     */
    public function testByE()
    {
        $this->assertStringMatchesFormat('%e', DIRECTORY_SEPARATOR);
    }

    /**
     * %s：一个或多个除了换行符以外的任意字符（非空白字符或者空白字符）。
     * %S：零个或多个除了换行符以外的任意字符（非空白字符或者空白字符）。
     * @throws \Exception
     * @author jiangyi
     */
    public function testByS()
    {
        $this->assertStringMatchesFormat('%s', 'a');
        $this->assertStringMatchesFormat('%S', '');
    }

    /**
     * %a：一个或多个包括换行符在内的任意字符（非空白字符或者空白字符）。
     * %A：零个或多个包括换行符在内的任意字符（非空白字符或者空白字符）。
     * @throws \Exception
     * @author jiangyi
     */
    public function testByA()
    {
        $this->assertStringMatchesFormat('%a', "a\n");
        $this->assertStringMatchesFormat('%A', "\n");
    }

    /**
     * %w：零个或多个空白字符
     * @throws \Exception
     * @author jiangyi
     */
    public function testByW()
    {
        $this->assertStringMatchesFormat('%w', '  ');
    }

    /**
     * %c：单个任意字符。
     * @throws \Exception
     * @author jiangyi
     */
    public function testByC()
    {
        $this->assertStringMatchesFormat('%c', 'a');
    }
}
