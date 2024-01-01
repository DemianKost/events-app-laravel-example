<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Ingress;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'icon' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['required', 'string'],
            'notify' => ['required', 'boolean'],
            'tags' => ['required', 'array'],
            'tags.*' => ['string'],
            'meta' => ['nullable'],
            'channel' => ['required', Rule::exists(
                table: 'channels',
                column: 'name',
            )]
        ];
    }

    public function payload()
    {

    }
}
