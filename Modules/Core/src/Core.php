<?php

namespace Duobix\Core;

use Duobix\Core\Repositories\LocaleRepository;
use Duobix\Core\Repositories\CountryRepository;
use Duobix\Core\Repositories\CountryStateRepository;

class Core
{

    /**
     * The Bagisto version.
     *
     * @var string
     */
    const EVENTPLUS = '2.2.3';

    /**
     * Current Locale.
     *
     * @var \Webkul\Core\Models\Locale
     */
    protected $currentLocale;

    /**
     * Stores singleton instances
     *
     * @var array
     */
    protected $singletonInstances = [];

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(
        protected CountryRepository $countryRepository,
        protected CountryStateRepository $countryStateRepository,
    ) {}

    /**
     * Get the version number of the event+.
     *
     * @return string
     */
    public function version()
    {
        return static::EVENTPLUS;
    }


}
