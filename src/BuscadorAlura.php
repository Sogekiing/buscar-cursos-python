<?php

namespace Jair\Buscador;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class BuscadorAlura
{
    private ClientInterface $client;
    private Crawler $crawler;

    public function __construct(ClientInterface $client, Crawler $crawler)
    {
        $this->client = $client;
        $this->crawler = $crawler;
    }

    public function buscar(string $site): array
    {
        $resposta = $this->client->request('GET', $site);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $elementosCurso = $this->crawler->filter('span.card-curso__nome');
        foreach ($elementosCurso as $elementoCurso) {
            $cursos[] = $elementoCurso->textContent;
        }
        return $cursos;
    }
}
