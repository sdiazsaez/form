<?php

namespace Larangular\Form\Traits;

use Illuminate\Support\Facades\Log;
use Larangular\EntityStatus\Models\EntityStatus;
use Larangular\Metadata\Models\Metadata;
use Larangular\Metadata\Traits\Metable;

trait HasPickerListValues {

    private $__picker_list_values_key = 'picker_list_values';

    public function pickerListValues() {
        return $this->morphOne(Metadata::class, 'metable')->where('key', $this->__picker_list_values_key);
    }

    public function setPickerListValues(array $value): void {
        if (!instance_has_trait($this, Metable::class)) {
            Log::warning(__METHOD__ . ' => has no trait ' . Metable::class);
            return;
        }

        $this->addUniqueMeta($this->__picker_list_values_key, $value);
    }

    public function getPickerListValues(): ?string {
        return $this->getMeta($this->__picker_list_values_key);
    }

}
