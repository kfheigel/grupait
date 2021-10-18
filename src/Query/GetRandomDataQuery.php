<?php

declare(strict_types=1);

namespace App\Query;

use App\Enum\RandomGeneratorApiUrl;
use App\HttpClient\RandomDataHttpClient;

class GetRandomDataQuery
{
    public function __construct(private RandomDataHttpClient $optadHttpClient)
    {
    }

    public function __invoke(): array
    {
        $url = RandomGeneratorApiUrl::URL();
        $response = $this->optadHttpClient->request($url->getValue());
        $data = $response->getContent();

        return json_decode($data, true);
    }
}
