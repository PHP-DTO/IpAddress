<?php
/**
 * Created for email-address
 * Date: 23.01.2021
 * @author Timur Kasumov (XAKEPEHOK)
 */

namespace PhpDto\IpAddress;

use JsonSerializable;
use PhpDto\IpAddress\Exception\InvalidIpAddressException;
use PHPUnit\Framework\TestCase;

class IpAddressTest extends TestCase
{

    /** @var IpAddress */
    private $ip;

    /** @var string */
    private $ipInner;

    public function setUp(): void
    {
        parent::setUp();
        $this->ipInner = '192.168.0.1';
        $this->ip = new IpAddress($this->ipInner);
    }

    public function test__constructWithInvalidIp()
    {
        $this->expectException(InvalidIpAddressException::class);
        new IpAddress('invalidIP');
    }

    public function test__toString()
    {
        $this->assertEquals($this->ipInner, $this->ip->__toString());
    }

    public function testJsonSerialize()
    {
        $this->assertInstanceOf(JsonSerializable::class, $this->ip);
        $this->assertSame('"' . $this->ipInner . '"', json_encode($this->ip));
    }

    public function testGet()
    {
        $this->assertEquals($this->ipInner, $this->ip->get());
    }

}
