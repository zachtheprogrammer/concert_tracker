<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;


class SearchBandsController extends Controller
{
    //Search 
    public function index()
    {
        /**
         * Search setlist.fm for the band provided
         * What I Call Bands are Artists in setlist.fm
         */
        $results = array();
        if (isset($_GET['q'])) {
            $curl = curl_init();
            $curl_url = 'https://api.setlist.fm/rest/1.0/search/artists?artistName=' . urlencode($_GET['q']) . '&sort=relevance';
             curl_setopt_array($curl, array(
                CURLOPT_URL => $curl_url,
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

            $bands = array();
            if(isset($returned_data->artist))
            {
                $bands = $returned_data->artist;
            }
            

            return view('search.view', ['bands' => $bands]); 
        }
    }
}
