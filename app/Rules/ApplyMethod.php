<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ApplyMethod implements Rule
{
    protected $applyMethod;
    protected $fieldData;
    protected $field;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($method, $fieldData)
    {
        $this->applyMethod = $method;
        $this->fieldData = $fieldData;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->applyMethod == 'EMAIL' && $this->fieldData == ''){
            $this->field = 'Email';
            return false;
        } else if ($this->applyMethod == 'LINK' && $this->fieldData == '') {
            $this->field = 'External Link';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The '.$this->field.' field is required.';
    }
}
