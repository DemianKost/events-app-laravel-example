<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Ingress;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Channel;
use App\Http\Payloads\Ingress\EventPayload;

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

    public function payload(): EventPayload
    {
        return EventPayload::fromArray(
            data: [
                'name' => $this->string('name')->toString(),
                'icon' => $this->string('icon')->toString(),
                'description' => $this->string('description')->toString(),
                'notify' => $this->boolean('notify'),
                'tags' => (array) $this->get('tags'),
                'meta' => (array) $this->get('meta'),
                'channel' => Channel::query()
                    ->where('name', $this->string('name')->toString())
                    ->first()
                    ->getKey()
            ],
        );
    }
}
