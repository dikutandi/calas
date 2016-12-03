<?php

namespace App\Dikut;

use App\City;
use App\Country;
use App\TourType;
use Cache;

class DropDown
{
    /**
     * Helper function to generate dropdown
     *
     * @return array
     */
    protected $country;
    protected $city;
    protected $tourism;
    protected $tourType;

    public function __construct()
    {
        $this->country  = Cache::get('countries.dropdown');
        $this->city     = Cache::get('cities.dropdown');
        $this->tourType = Cache::get('tourTypes.dropdown');

    }

    public function dropCountry()
    {
        if ($this->country) {
            return $this->country;
        } else {
            $countries = Country::lists('name', 'code')->toArray();
            Cache::put('countries.dropdown', $countries, 60);
            return $countries;
        }
    }

    public function dropCity()
    {
        if ($this->city) {
            return $this->city;
        } else {
            $cities = City::orderBy('name', 'ASC')->lists('name', 'id')->toArray();
            Cache::put('cities.dropdown', $cities, 60);
            return $cities;
        }
    }

    public function dropTourType()
    {
        if ($this->tourType) {
            return $this->tourType;
        } else {
            $tourTypes = TourType::orderBy('name', 'ASC')->lists('name', 'id')->toArray();
            Cache::put('tourTypes.dropdown', $tourTypes, 60);
            return $tourTypes;
        }
    }

    public function updateCache($table = false)
    {
        if (!$table) {
            return false;
        }
        switch ($table) {
            case 'country':
                $country = Country::lists('name', 'code')->toArray();
                Cache::put('countries.dropdown', $country, 60);
                break;
            case 'city':
                $cities = City::lists('name', 'id')->toArray();
                Cache::put('cities.dropdown', $cities, 60);
                break;
            case 'tourType':
                $tourTypes = TourType::lists('name', 'id')->toArray();
                Cache::put('tourTypes.dropdown', $tourTypes, 60);
                break;
        };
    }

}
