<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Pengguna extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;
    protected $table ='pengguna';
    protected $primaryKey ='id';
    protected $fillable =[
        'id',
        'nama',
        'username',
        'password',
        'role',
        'foto',
        'ktp',
        'bpjs',
        'vaksin',

    ];
}
