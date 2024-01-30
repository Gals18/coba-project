<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table ='file_records';
    protected $primaryKey ='id';
    protected $fillable =[
        'id',
        'file_pdf',
        'file_excel',
        'added_by',
    ];
}
