<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    
    protected $fillable = [
        'username', 'email', 'password','role', 'pegawai_id'
    ];

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'nip', 'pegawai_id'); 
    }
}