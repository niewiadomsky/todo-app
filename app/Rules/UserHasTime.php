<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class UserHasTime implements DataAwareRule, ValidationRule
{
    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected $data = [];

    // ...

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $value) {
            return;
        }

        $user = User::find($value);

        if (! $user) {
            $fail('The user does not exist.');
        }

        $maxMinutesInMonth = config('tasks.max_minutes_in_month');

        $currentTaskMinutes = $this->data['estimated_minutes'] ?? request()->route('task')?->estimated_minutes ?? 0;

        if ($user->minutes_in_month + $currentTaskMinutes > $maxMinutesInMonth) {
            $fail("The {$user->name} does not have remaining time.");
        }
    }
}
