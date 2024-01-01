<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Ingress;

use Illuminate\Foundation\Http\FormRequest;

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
            'icon' => ['nullable', 'string', 'min:2', 'max:255'],
            'description' => ['required', 'string'],
            'notify' => ['required', 'boolean'],
            'tags' => ['required', 'array'],
            'tags.*' => ['string'],
            'meta' => ['required', 'array']
        ];
    }
}
