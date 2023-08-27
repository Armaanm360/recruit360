<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class ClientOverAll extends Model
{
    public static function mofa($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('mofa_number')->first();
        return $data;
    }
    public static function finger($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('fingur_status')->first();
        return $data;
    }
    public static function statement($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('bank_statement_status')->first();
        return $data;
    }
    public static function bmet($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('bmet_status')->first();
        return $data;
    }
    public static function flightNo($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('flight_number')->first();
        return $data;
    }
    public static function flightdate($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('flight_date')->first();
        return $data;
    }
    public static function airplane($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('flight_airline')->first();
        return $data;
    }
    public static function ticket($id)
    {
        $data = ClientOverAll::where('client_id',$id)->select('flight_ticket_number')->first();
        return $data;
    }
}
