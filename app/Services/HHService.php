<?php

namespace App\Services;

use GuzzleHttp\Client;

class HHService
{
    private $baseUrl = 'https://api.hh.ru/';
    private $employerId = 542188; // ← ТВОЙ РАБОТОДАТЕЛЬ

    public function getVacancies()
    {
        if (!$this->employerId) {
            return [];
        }

        // Guzzle с отключенной проверкой SSL (только для dev)
        $client = new Client([
            'base_uri' => $this->baseUrl,
            'verify' => false,
        ]);

        $response = $client->get('vacancies', [
            'query' => [
                'employer_id' => $this->employerId,
                'per_page' => 10,
            ]
        ]);

        $json = json_decode($response->getBody(), true);

        if (!isset($json['items'])) {
            return [];
        }

        // Мапим только нужные поля
        return array_map(function ($v) {
            return [
                'name' => $v['name'] ?? '',
                'url' => $v['alternate_url'] ?? '',
                'salary' => $v['salary']['from'] ?? null,
                'city' => $v['area']['name'] ?? '',
            ];
        }, $json['items']);
    }
}
