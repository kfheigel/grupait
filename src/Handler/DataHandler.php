<?php

namespace App\Handler;

use App\Helper\EmailExtraction;
use App\Regexp\NameRegexp;

class DataHandler
{
    public function __construct(
        private EmailExtraction $emails,
        private NameRegexp $nameRegexp)
    {
    }

    public function getData(): array
    {
        $dataArr = [];
        $emails = $this->emails->extractEmail();

        foreach ($emails as $email) {
            $name = $this->nameRegexp->checkFromEmail($email);
            if (0 != $name) {
                $dataArr[] = $name;
            }
        }

        return $dataArr;
    }
}
