<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /** 
    * Sets a hashed password
    */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_admin' => false,
        'name' => "",
        'password' => "",
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin() {
        return $this->is_admin;
    }

    public function temNota() {
        return $this->notas->isNotEmpty();
    }

    public function notasEm(Turma $turma) {
         return true;
    }
    
    // relatonships
    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
    public function exerciciosFeitos()
    {
        return $this->hasManyThrough(Exercicio::class,Nota::class);
    }
    public function prazos()
    {
        return $this->hasManyThrough(Prazo::class,Turma::class);
    }
}
