<?php

namespace BinarCode\LaravelSegment\Models;

use Illuminate\Support\Str;

trait WithUuid
{
    protected static function bootWithUuid()
    {
        self::creating(function (\Illuminate\Database\Eloquent\Model $model) {
            if (! $model->getAttribute('uuid')) {
                $model->setAttribute('uuid', (string) Str::uuid());
            }
        });
    }

    public static function whereUuid($uuid)
    {
        return static::query()->where('uuid', $uuid)->firstOrFail();
    }

    public static function safeWhereUuid($uuid)
    {
        return static::query()->where('uuid', $uuid)->first();
    }
}
