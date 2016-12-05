<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calas extends Model
{
    protected $table = 'users_calas';

    protected $fillable = [
        'userid', 'npm', 'kelas', 'alamat', 'contact', 'ipk_utama', 'ipk_lokal', 'cv', 'lab_minat',
    ];

    public function User()
    {
        return $this->belongsTo(\App\User::class, 'userid');
    }
}
