<?php declare(strict_types=1);

namespace App\Infrastructure\Contracts;

use Shov\Helpers\Mixins\FillableTrait;

/**
 * Base class for DTO Entities
 */
abstract class AbstractDTO
{
    use FillableTrait;
}
