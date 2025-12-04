<?php

namespace App\Services;

use GuzzleHttp\Client;

class HHService
{
    private $baseUrl = 'https://api.hh.ru/';
    private $employerId = 542188;

    public function getVacancies()
    {
        if (!$this->employerId) {
            return [];
        }

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

        return array_map(function ($v) {   // ← ЗДЕСЬ ПАРАМЕТР $v
            return [
                'name' => $v['name'] ?? '',
                'url' => $v['alternate_url'] ?? '',
                'salary' => $v['salary']['from'] ?? null,
                'city' => $v['area']['name'] ?? '',
                'responsibility' => $v['snippet']['responsibility'] ?? null,   // ← ПРАВИЛЬНО
                'requirement' => $v['snippet']['requirement'] ?? null,        // ← ПРАВИЛЬНО
            ];
        }, $json['items']);
    }
}
