<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Get / set the specified setting value.
     *
     * If an array is passed as the key, we assume you want to set an array of values.
     *
     * @param  string|array<string, mixed>|null  $key
     */
    function setting(string|array|null $key = null, mixed $default = null): mixed
    {
        if (is_null($key)) {
            return Setting::getAllSettings();
        }

        if (is_array($key)) {
            foreach ($key as $k => $v) {
                Setting::set($k, $v);
            }

            return null;
        }

        return Setting::get($key, $default);
    }
}
