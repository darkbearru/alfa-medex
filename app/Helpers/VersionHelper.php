<?php

namespace App\Helpers;

class VersionHelper
{
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
