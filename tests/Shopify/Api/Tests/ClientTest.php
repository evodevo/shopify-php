<?php

namespace Shopify\Api\Tests;

class ClientTest extends \PHPUnit_Framework_TestCase
{

    public function testRequestValidation()
    {

        $http = $this->getMock('Shopify\HttpClient');

        $api = new \Shopify\Api\Client($http);
        $api->setSharedSecret('hush');

        $signature = "31b9fcfbd98a3650b8523bcc92f8c5d2";

        // Assume we have the query parameters in a hash
        $params = array(
            'shop' => "some-shop.myshopify.com",
            'code' => "a94a110d86d2452eb3e2af4cfb8a3828",
            'timestamp' => "1337178173",
        );

        $this->assertEquals($signature, $api->generateSignature($params));

    }

}