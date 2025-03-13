<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'devisi_id','user_id','nama', 'alamat', 'gender', 'status' ,'telepon' , 'tempat_lahir', 'tanggal_lahir', 'foto'];

    protected $table = 'pegawai';
    protected $primaryKey = 'nip'; 

    public function devisi(): BelongsTo
    {
        return $this->belongsTo(Devisi::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'pegawai_id', 'nip'); 
    }

    public function surat(): HasMany
    {
        return $this->hasMany(Surat::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($pegawai) {
            if ($pegawai->foto) {
                $fotoPath = public_path('storage/foto/' . $pegawai->foto);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath); 
                }
            }
        });
    }
    
}
