<?php
namespace Core;

class View
{
    public static function render(string $path, array $attributes = []): void
    {
        extract($attributes);
        require __DIR__ . "/../resources/views" . $path;
    }
}
