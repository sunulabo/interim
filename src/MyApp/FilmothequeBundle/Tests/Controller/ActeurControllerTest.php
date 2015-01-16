<?php

namespace MyApp\FilmothequeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ActeurControllerTest extends WebTestCase
{
    public function testLister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lister');
    }

    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouter');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifier');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimer');
    }

}
