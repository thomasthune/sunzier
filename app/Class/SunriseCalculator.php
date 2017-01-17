<?php
class SunriseCalculator
{
    protected $location;

    protected $date;

    protected $sunrise;

    protected $sunset;

    public function __construct(GeoLocation $location, DateTime $date)
    {
        $this->location = $location;
        $this->date = $date;
    }

    public function getRunsise()
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
