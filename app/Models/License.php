<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public $table = 'license_desktop_app';
    protected $fillable = ['count'];
}
