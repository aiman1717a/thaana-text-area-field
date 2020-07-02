<?php

namespace Aiman\ThaanaTextAreaField;

use Laravel\Nova\Fields\Expandable;
use Laravel\Nova\Fields\Field;

class ThaanaTextAreaField extends Field
{
    use Expandable;

    public $showOnIndex = false;
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'thaana-text-area-field';

    public $rows = 10;

    public function rows($rows)
    {
        $this->rows = $rows;

        return $this;
    }

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->thaana(true);
        $this->type();
    }

    public function thaana($thaana = true){
        if($thaana){
            return $this->withMeta([
                'status' => 'enable',
            ]);
        }else{
            return $this->withMeta([
                'status' => 'disable',
            ]);
        }
    }

    public function type($type = 'phonetic'){
        return $this->withMeta([
            'type' => $type,
        ]);
    }

    public function convertToLatin($latin = 'latin'){
        return $this->withMeta([
            'latin' => $latin,
        ]);
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(parent::jsonSerialize(), [
            'rows' => $this->rows,
        ]);
    }
}
