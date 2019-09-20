<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsNegotiable implements Rule
{
    protected $isNegotiable;
    protected $fieldData;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($isNegotiable, $fieldData)
    {
        $this->isNegotiable = $isNegotiable;
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
        if ($this->isNegotiable == '0' && $this->fieldData == ''){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute field is required.';
    }
}
