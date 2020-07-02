# thaana-text-area-field
This Nova Package allow you to use Nova field with Thaana Keyboard on a Text Area

## Installation
```
composer require aiman/thaana-text-area-field
```

## Usage
In your Nova resource add the use declaration and use the NovaTinyMCE field:
```
use Aiman\ThaanaTextAreaField\ThaanaTextAreaField;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            ThaanaTextAreaField::make('Content'),
        ];
    }
```

### Thaana
You can turn thaana translation. by default it is `true`.
```
ThaanaTextAreaField::make('Content', 'content')->thaana()
```

### Keyboard Type
You can turn thaana keyboard type. by default it is `phonetic`.
```
ThaanaTextAreaField::make('Content', 'content')->type()
```

### Thaana to Latin Convertion
install this [Thaana Latin Field](https://github.com/aiman1717a/ThaanaLatinField) in order for the function to work
ThaanaTextAreaField supports auto latin convertion
```
ThaanaTextAreaField::make('Content', 'content')->convertToLatin('latin_content'),
ThaanaLatinField::make('Latin Content', 'latin_content'),
```

## Important
This package is tested for **nova 2.0+**
Latest tested on **nova v3.6.0**

## Credit
Huge Credit goes for [@Jawish Hameed](https://github.com/jawish) for his thaana translation plugin [Thaana Keyboard](https://github.com/jawish/jtk)
