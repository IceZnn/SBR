<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'winner_team_id',
        'loser_team_id', 
        'winner_runner_name',
        'race_time',
        'winner_team_name',
        'loser_team_name'
    ];

    public function winnerTeam()
    {
        return $this->belongsTo(Time::class, 'winner_team_id');
    }

    public function loserTeam()
    {
        return $this->belongsTo(Time::class, 'loser_team_id');
    }
}