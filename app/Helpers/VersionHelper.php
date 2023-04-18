<?php

namespace App\Helpers;

use Illuminate\Foundation\Application;

class VersionHelper
{
    public static function List(): array
    {
        return [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'appVersion' => self::Current()
        ];
    }

    public static function Current($default = '0.0.1'): string
    {
        try {
            $content = file_get_contents(base_path() . '/composer.json');
            $content = json_decode($content, true);
            $version = $content['version'];
        } catch (\Exception $e) {
            $version = null;
        }
        return $version ?? $default;
    }
}
