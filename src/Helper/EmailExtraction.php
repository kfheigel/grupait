<?php

namespace App\Helper;

use App\Query\GetRandomDataQuery;

class EmailExtraction
{
    public function __construct(private GetRandomDataQuery $query)
    {
    }

    public function extractEmail(): array
    {
        $emailArray = [];
        $query = $this->query;
        $data = $query();
        foreach ($data as $dataArray) {
            $emailArray[] = $dataArray['email'];
        }

        return $emailArray;
    }
}
