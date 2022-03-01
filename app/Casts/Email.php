<?php

namespace App\Casts;

use App\Models\Utilities\Email as EmailModel;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class Email implements CastsAttributes
{

    /**
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return EmailModel|mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return new EmailModel(
            $attributes['email'],
        );
    }

    /**
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return array|mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        if (! $value instanceof EmailModel) {
            throw new InvalidArgumentException('The given value is not an Email instance.');
        }

        return [
            'email' => $value->firstEmail,

        ];
    }
}
