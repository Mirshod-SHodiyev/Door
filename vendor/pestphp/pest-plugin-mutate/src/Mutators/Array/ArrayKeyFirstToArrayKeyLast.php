<?php

declare(strict_types=1);

namespace Pest\Mutate\Mutators\Array;

use Pest\Mutate\Mutators\Abstract\AbstractFunctionReplaceMutator;

class ArrayKeyFirstToArrayKeyLast extends AbstractFunctionReplaceMutator
{
    public const SET = 'Array';

    public const DESCRIPTION = 'Replaces `array_key_first` with `array_key_last`.';

    public const DIFF = <<<'DIFF'
        $a = array_key_first([1, 2, 3]);  // [tl! remove]
        $a = array_key_last([1, 2, 3]);  // [tl! add]
        DIFF;

    public static function from(): string
    {
        return 'array_key_first';
    }

    public static function to(): string
    {
        return 'array_key_last';
    }
}
