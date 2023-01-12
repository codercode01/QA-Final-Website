<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interstatus extends Model
{
    use HasFactory;
    protected $fillable = [
		'title', 'international_image_status'
	];
}
