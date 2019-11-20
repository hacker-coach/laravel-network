<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AccessCode implements Rule
{
    protected $code = '';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
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
        if($value === trim($this->code)){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Access Code is wrong!';
    }
}
