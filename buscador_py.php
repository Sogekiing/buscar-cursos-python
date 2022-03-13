#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Jair\Buscador\BuscadorAlura;

$cliente = new Client(['base_uri' => 'https://www.alura.com.br/', 'verify' => false]);
$crawler = new Crawler();

$buscador = new BuscadorAlura($cliente, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/python');
foreach ($cursos as $curso) {
    escrever($curso);
}