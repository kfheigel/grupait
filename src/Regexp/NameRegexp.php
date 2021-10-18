<?php

namespace App\Regexp;

use App\Enum\Regexp;

class NameRegexp
{
    public function __construct(
        private CompanyRegexp $companyRegexp)
    {
    }

    public function checkFromEmail($email): array|bool
    {
        if (preg_match_all(Regexp::NAME_REGEXP, $email, $matches)) {
            $company = $this->companyRegexp->checkCompanyFromEmail($email);
            $name = str_replace('.', ' ', $matches[0][0]);
            $data = $this->dataPreparation($email, $name, $company);

            return $data;
        } else {
            return false;
        }
    }

    private function dataPreparation($email, $name, $company): array
    {
        $nameArr = explode(' ', $name);
        $company = $nameArr[1].' '.$company;
        $initials = $nameArr[0][0].'.'.$nameArr[1][0].'.';

        return ['email'=>$email, 'name'=>$name, 'company'=>$company, 'initials'=>$initials];
    }
}
