<?php

namespace App\Regexp;

use App\Enum\Regexp;

class CompanyRegexp
{
    public function checkCompanyFromEmail($email): string
    {
        if (preg_match_all(Regexp::COMPANY_REGEXP(), $email, $matches)) {
            return ucfirst(str_replace('@', '', $matches[0][0]));
        }
    }
}
