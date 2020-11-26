<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelsApi extends Model
{
    /**
     * Tl'attribut qui sert a stocker la ressource (la route dans l'api)
     *
     * These middleware are run during every request to your application.
     *
     * @var string
     */
    protected $resource;
    public function __construct($nResource){
        $this->resource=$nResource;
    }

    public function get($url) {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 2
        ]);
        $data = curl_exec($curl);
        $dataTable = json_decode($data, true);
        curl_close($curl);
        return $dataTable;
    }
}

