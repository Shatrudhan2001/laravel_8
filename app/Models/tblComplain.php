<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblComplain extends Model
{
    use HasFactory;
    protected $table = 'tbl_complains';
    protected $fillable = [
    'name',
    'email',
    'mobile',
    'subject',
    'message',        
];
}