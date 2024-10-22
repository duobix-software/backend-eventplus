<?php

use Duobix\Core\Core;


if (! function_exists('core')) {
    /**
     * Core helper.
     */
    function core(): Core
    {
        return app(Core::class);
    }
}