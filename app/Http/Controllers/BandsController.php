<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BandsController extends Controller
{
    //Display Concerts by Band 
    public function index($band)
    {
        /**
         * Search setlist.fm for shows from the band provided
         * What I Call Bands are Artists in setlist.fm
         */
        $results = array();
        if (isset($band)) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.setlist.fm/rest/1.0/artist/' . $band . '/setlists/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'x-api-key:' . Config::get('services.setlist_fm.key'),
                    'Accept: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $returned_data = json_decode($response);
            $concerts = array();
            if (isset($returned_data->setlist)) {
                $concerts = $returned_data->setlist;
            }
            return view('concerts.view', ['concerts' => $concerts]);
        }
    }
}
