<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'email',
        'no_hp',
        'alamat',
        'jenis_kelamin',
    ];

    public function cutis()
{
    return $this->hasMany(Cuti::class);
}


}
