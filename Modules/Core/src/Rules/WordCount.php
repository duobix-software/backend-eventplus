<?php

namespace Duobix\Core\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class WordCount implements ValidationRule
{
    protected $min;
    protected $max;

    public function __construct(int $min = 0, int $max = PHP_INT_MAX)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Count the number of words in the value
        $wordCount = str_word_count($value);

        // Check if the word count is within the specified range
        if ($wordCount < $this->min) {
            $fail('core::validation.min-words')->translate();
        } elseif ($wordCount > $this->max) {
            $fail('core::validation.max-words')->translate();
        }
    }
}
