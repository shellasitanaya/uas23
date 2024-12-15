<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserAdmin extends Model
{
    use HasUuids;
    protected $table = 'user_admins';
    protected $fillable = [
        'username', 
        'password', 
        'nama_admin', 
        'status_aktif'
    ];
}
