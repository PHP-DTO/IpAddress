<?php
/**
 * Created for ip-address
 * Date: 30.08.2023
 * @author Timur Kasumov (XAKEPEHOK)
 */

namespace PhpDto\IpAddress;


use JsonSerializable;
use PhpDto\IpAddress\Exception\InvalidIpAddressException;

class IpAddress implements JsonSerializable
{
    protected string $ip;

    public function __construct(string $ip)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new InvalidIpAddressException("Invalid IP-address: {$ip}");
        }
        $this->ip = $ip;
    }

    public function get(): string
    {
        return $this->ip;
    }

    public function __toString(): string
    {
        return $this->get();
    }

    public function jsonSerialize(): string
    {
        return $this->ip;
    }
}