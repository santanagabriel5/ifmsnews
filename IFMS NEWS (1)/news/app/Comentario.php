<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'comentarios';

    protected $fillable = [
      'nome', 'texto', 'email','estado' ,'id_post', 'updated_at' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
