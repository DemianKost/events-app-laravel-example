<?php

declare(strict_types=1);

namespace App\Http\Payloads\Ingress;

final class EventPayload
{
    public function __construct(
        private readonly string $name,
        private readonly string $icon,
        private readonly string $description,
        private readonly bool $notify,
        private readonly array $tags,
        private readonly null|object $meta,
        private readonly string $chnnel
    ) {}
}