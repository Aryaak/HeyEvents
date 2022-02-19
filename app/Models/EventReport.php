<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReport extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'reporter_id', 'report'];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id', 'id');
    }
}
