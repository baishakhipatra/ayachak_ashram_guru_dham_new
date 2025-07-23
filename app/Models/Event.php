<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = "events";
    protected $fillable = ['title','description', 'venue', 'start_time', 'end_time', 'has_registartion', 'deleted_at'];
}
