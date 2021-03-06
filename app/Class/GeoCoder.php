<?php
/**
 * Class: GeoCoder
 *
 * From city name, get geolocation from google maps api.
 */
class GeoCoder
{
    /**
     * getLocation
     *
     * @param string $city
     * @return GeoLocation
     */
    public function getLocation(string $city): GeoLocation
    {
        $apiUrl = 'http://maps.googleapis.com/maps/api/geocode/json';
        $countryCode = 'DK';

        $queryParams = sprintf('?address=%1$s,+%2$s&components=country:%2$s&sensor=false', $city, $countryCode);

        $url = $apiUrl . $queryParams;

        $data = @json_decode(file_get_contents($url));

        return new GeoLocation($data->results[0]->geometry->location->lat, $data->results[0]->geometry->location->lng);
    }
}
