<?php 

namespace App;

use App\Models\Setting;

class Core {
    const APP_VERSION = '0.0.1';

     /**
     * Get the version number of the Bagisto.
     *
     * @return string
     */
    public function version()
    {
        return static::APP_VERSION;
    }

    /**
     * Get the particular setting data
     * 
     * @param  string  $key
     * @return mixed
     */
    public function getSetting($key) 
    {
        $value = Setting::where('key', $key)->first();

        return $value?->value;
    }
}