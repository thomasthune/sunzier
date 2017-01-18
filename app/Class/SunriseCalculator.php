<?php
/**
 * Class: SunriseCalculator
 *
 * Use php builtins to calculate sunrise and sunset for supplied
 * location
 */
class SunriseCalculator
{
    /**
     * location
     *
     * @var GeoLocation
     */
    protected $location;

    /**
     * date
     *
     * @var DateTime
     */
    protected $date;

    /**
     * sunrise
     *
     * @var string
     */
    protected $sunrise;

    /**
     * sunset
     *
     * @var string
     */
    protected $sunset;

    /**
     * __construct
     *
     * @param GeoLocation $location
     * @param DateTime $date
     * @return void
     */
    public function __construct(GeoLocation $location, DateTime $date)
    {
        $this->location = $location;
        $this->date = $date;
    }

    /**
     * getRunsise
     *
     * @return array
     */
    public function getRunsise(): array
    {
        $timestamp = $this->date->getTimestamp();
        $latitude = $this->location->getlatitude();
        $longitude = $this->location->getLongitude();

        $this->sunrise = date_sunrise($timestamp, SUNFUNCS_RET_STRING, $latitude, $longitude);
        $this->sunset = date_sunset($timestamp, SUNFUNCS_RET_STRING, $latitude, $longitude);

        return [
            'sunrise' => $this->sunrise,
            'sunset' => $this->sunset,
        ];
    }
}
