<?php

namespace App\Utilities;

class GoogleMaps{

    public static function geocodeAddress( $address, $city, $state, $cp ){

        /*
   Initializes the response for the GeoCode Location
 */
        $coordinates['lat'] = null;
        $coordinates['lng'] = null;

        /*
          If the response is not empty (something returned),
          we extract the latitude and longitude from the
          data.
        */
        if( !empty( $geocodeData )
            && $geocodeData->status != 'ZERO_RESULTS'
            && isset( $geocodeData->results )
            && isset( $geocodeData->results[0] ) ){
            $coordinates['lat'] = $geocodeData->results[0]->geometry->location->lat;
            $coordinates['lng'] = $geocodeData->results[0]->geometry->location->lng;
        }

        /*
          Return the found coordinates.
        */
        return $coordinates;

    }
    function getGeocodeData($address) {
        $address = urlencode($address);
        $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyCl3uqYrt4mt-riq0ZFvil7gN_MX4UmSWE";
        $geocodeResponseData = file_get_contents($googleMapUrl);
        $responseData = json_decode($geocodeResponseData, true);
        if($responseData['status']=='OK') {
            $latitude = isset($responseData['results'][0]['geometry']['location']['lat']) ? $responseData['results'][0]['geometry']['location']['lat'] : "";
            $longitude = isset($responseData['results'][0]['geometry']['location']['lng']) ? $responseData['results'][0]['geometry']['location']['lng'] : "";
            $formattedAddress = isset($responseData['results'][0]['formatted_address']) ? $responseData['results'][0]['formatted_address'] : "";
            if($latitude && $longitude && $formattedAddress) {
                $geocodeData = array();
                array_push(
                    $geocodeData,
                    $latitude,
                    $longitude,
                    $formattedAddress
                );
                return $geocodeData;
            } else {
                return false;
            }
        } else {
            echo "ERROR: {$responseData['status']}";
            return false;
        }
    }


}