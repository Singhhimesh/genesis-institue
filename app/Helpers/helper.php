<?php

if (! function_exists('core')) {
    /**
     * Core helper.
     *
     * @return \App\Facades\Core
     */
    function core()
    {
        return app('core');
    }
}
