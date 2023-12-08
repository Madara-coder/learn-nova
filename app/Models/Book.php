<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory, HasFactory, Notifiable;

    protected $fillable = [
        "title",
        "page_no",
        "copies",
    ];

    protected $casts = [
        "published_date" => "date",
    ];
}
