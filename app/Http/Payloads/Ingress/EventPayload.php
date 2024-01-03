<?php

declare(strict_types=1);

namespace App\Http\Payloads\Ingress;

final readonly class EventPayload
{
    public function __construct(
        private readonly string $name,
        private readonly string $icon,
        private readonly string $description,
        private readonly bool $notify,
        private readonly array $tags,
        private readonly null|object $meta,
        private readonly string $channel
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'icon' => $this->icon,
            'description' => $this->description,
            'notify' => $this->notify,
            'tags' => $this->tags,
            'meta' => $this->meta,
            'channel_id' => $this->channel
        ];
    }

    public static function fromArray(array $data): EventPayload
    {
        return new EventPayload(
            name: $data['name'],
            icon: $data['icon'],
            description: $data['description'],
            notify: $data['notify'],
            tags: $data['tags'],
            meta: $data['meta'],
            channel: $data['channel_id']
        );
    }
}