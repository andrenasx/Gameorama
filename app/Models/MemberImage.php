<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberImage extends Model
{
    use HasFactory;

    protected $table = 'member_image';

    public $timestamps  = false;

    protected $fillable = [
        'file'
    ];
}