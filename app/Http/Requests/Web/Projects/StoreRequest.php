<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Projects;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ]
        ];
    }
}
