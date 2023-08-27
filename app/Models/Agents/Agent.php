<?php

namespace App\Models\Agents;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public static function clientName($clientID) {
        $clientName = Agent::where('agent_id',$clientID)->select('agent_name')->first();
        return $clientName;
     }
}
