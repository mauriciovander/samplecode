<?php namespace Tests;

use \SampleCode\UrlParser;

/**
 * @author: Mauricio van der Maesen de Sombreff <mauriciovander@gmail.com>
 * @date: 11/30/15
 */
class UrlParserTest extends \PHPUnit_Framework_TestCase
{
    private $url_parser_instance;

    public function setUp()
    {
        $test_url = 'http://user:secret@example.com:81/site/path/file.html?a=b&b[]=2&b[]=3#section1';
        $this->url_parser_instance = new UrlParser($test_url);
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('\SampleCode\UrlParser', $this->url_parser_instance, 'Is Instance of UrlParser');
    }

    public function testGetSchemeExists()
    {
        $this->assertPublicMethodExists('getScheme');
    }

    public function testGetScheme()
    {
        $this->assertEquals('http', $this->url_parser_instance->getScheme(), 'Scheme is http');
    }

    public function testGetHostExists()
    {
        $this->assertPublicMethodExists('getHost');
    }

    public function testGetHost()
    {
        $this->assertEquals('example.com', $this->url_parser_instance->getHost(), 'host is example.com');
    }

    public function testGetPortExists()
    {
        $this->assertPublicMethodExists('getPort');
    }

    public function testGetPort()
    {
        $this->assertEquals(81, $this->url_parser_instance->getPort(), 'host is 81');
    }

    public function testGetUserExists()
    {
        $this->assertPublicMethodExists('getUser');
    }

    public function testGetUser()
    {
        $this->assertEquals('user', $this->url_parser_instance->getUser(), 'user is "user"');
    }

    public function testGetPassExists()
    {
        $this->assertPublicMethodExists('getPass');
    }

    public function testGetPass()
    {
        $this->assertEquals('secret', $this->url_parser_instance->getPass(), 'password is "secret"');
    }

    public function testGetPathExists()
    {
        $this->assertPublicMethodExists('getPath');
    }

    public function testGetPath()
    {
        $this->assertEquals('/site/path/file.html', $this->url_parser_instance->getPath(), 'path is "site/path/file.html"');
    }

    public function testGetQueryExists()
    {
        $this->assertPublicMethodExists('getQuery');
    }

    public function testGetQuery()
    {
        $this->assertEquals('a=b&b[]=2&b[]=3', $this->url_parser_instance->getQuery(), 'query sting is OK');
    }

    public function testGetFragmentExists()
    {
        $this->assertPublicMethodExists('getFragment');
    }

    public function testGetFragment()
    {
        $this->assertEquals('section1', $this->url_parser_instance->getFragment(), 'fragment is "section1');
    }

    private function assertPublicMethodExists($method)
    {
        $reflector = new \ReflectionMethod('\SampleCode\UrlParser', $method);
        $this->assertTrue($reflector ->isPublic(), 'Method is public');
    }
}
