<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase; // 1. Utiliser WebTestCase

class ContactsControllerTest extends WebTestCase // 2. Étendre WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $client->request('GET', '/contacts');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Contacts');
    }
}
