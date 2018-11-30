<?php
/**
 * @author: jiangyi
 * @date: 下午9:13 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class EqualXMLStructureTest extends TestCase
{
    public function testWithDifferentNodeNames()
    {
        $expected = new \DOMElement('foo');
        $actual = new \DOMElement('foo');

        $this->assertEqualXMLStructure($expected, $actual);
    }

    public function testWithDifferentNodeAttributes()
    {
        $expected = new \DOMDocument;
        $expected->loadXML('<foo bar="true" />');

        $actual = new \DOMDocument;
        $actual->loadXML('<foo bar="true" />');

        $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild, true);
    }

    public function testWithDifferentChildrenCount()
    {
        $expected = new \DOMDocument;
        $expected->loadXML('<foo><bar/><bar/><bar/></foo>');

        $actual = new \DOMDocument;
        $actual->loadXML('<foo><bar/><bar/><bar/></foo>');

        $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);
    }

    public function testWithDifferentChildren()
    {
        $expected = new \DOMDocument;
        $expected->loadXML('<foo><baz/><baz/><baz/></foo>');

        $actual = new \DOMDocument;
        $actual->loadXML('<foo><baz/><baz/><baz/></foo>');

        $this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);
    }

    public function testAssertXmlFileEqualsXmlFile()
    {
        $this->assertXmlFileEqualsXmlFile(STUBS_ROOT . '/files/foo.xml', STUBS_ROOT . '/files/bar.xml');
    }

    public function testAssertXmlStringEqualsXmlFile()
    {
        $this->assertXmlStringEqualsXmlFile(STUBS_ROOT . '/files/foo.xml', '<foo><bar>123</bar></foo>');
    }

    public function testAssertXmlStringEqualsXmlString()
    {
        $this->assertXmlStringEqualsXmlString('<foo><bar/></foo>', '<foo><bar/></foo>');
    }
}
