<?php

namespace App\Http\Traits;
use Exception;

trait EmployeesTrait {

    protected static $fetchAPI = 'http://dummy.restapiexample.com/api/v1/employees';

    public function getEmployeeData(){

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_URL, EmployeesTrait::$fetchAPI );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $headers   = [];
        $headers[] = 'Content-Type: application/json';
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

        $result = json_decode( curl_exec( $ch ) );
        if ( curl_errno( $ch ) ) {
            throw new Exception( curl_error( $ch ), true );
        }

        curl_close( $ch );

        if( empty( $result ) ){
            return [];
        }

        if( $result->status === 'success' ){
            return $result->data;
        }

    }
}