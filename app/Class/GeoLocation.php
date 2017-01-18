<?php

/**
 * Class: GeoLocation
 *
 * Location container class
 */
class GeoLocation
{
    /**
     * latitude
     *
     * @var float
     */
    protected $latitude;

    /**
     * longitude
     *
     * @var float
     */
    protected $longitude;

    /**
     * __construct
     *
     * @param float $latitude
     * @param float $longitude
     * @return void
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * getLatitude
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * getLongitude
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
