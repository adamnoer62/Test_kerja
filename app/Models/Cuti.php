<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $fillable = ['pegawai_id', 'alasan', 'tanggal_mulai', 'tanggal_selesai'];

public function pegawai()
{
    return $this->belongsTo(Pegawai::class);
}

}
