<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table ='file_records';
    protected $primaryKey ='id';
    protected $fillable =[
        'id',
        'file_pdf',
        'file_excel',
        'added_by',
    ];

    
    public function Usr() {
        // pake belongs to buat referensi dari table anak ke table induk
        // added_by itu foreign key nya
        return $this->belongsTo(User::class,'added_by');
    }
}
