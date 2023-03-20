<?php
/**
 * Copyright (c) 2023. Simon Diaz <sdiaz@sdshost.ml>
 */

namespace Larangular\Form\Lib;

use Larangular\RoutedEnum\Contracts\EnumHasLabels;
use Larangular\RoutedEnum\Enum\BasicEnum;

class FormFieldTypeOptions extends BasicEnum implements EnumHasLabels {
    public const TEXT      = 0;
    public const SELECT = 1;

    public static function getLabels(): array {
        return [
            'Texto',
            'Selector'
        ];
    }
}
