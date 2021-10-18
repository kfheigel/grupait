<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static Regexp NAME_REGEXP()
 * @method static Regexp COMPANY_REGEXP()
 */
final class Regexp extends Enum
{
    public const NAME_REGEXP = '/[A-Z]\w+\.[A-Z]\w+/';
    public const COMPANY_REGEXP = '/@\w+/';
}
