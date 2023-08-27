<?php

namespace App\Models\AgentTransection;

use Illuminate\Database\Eloquent\Model;

class AgentTransection extends Model
{
    protected $table = "agent_transections";
    protected $primaryKey = 'agent_transaction_id';
    protected $fillable = ['agent_transaction_last_balance'];
}
