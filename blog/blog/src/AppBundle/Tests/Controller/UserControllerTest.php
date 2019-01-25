<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testCreateuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createUser');
    }

    public function testUpdateuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateUser');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/remove');
    }

    public function testShowuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showUser');
    }

}
