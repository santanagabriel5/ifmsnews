<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'posts';

    protected $fillable = [
      'titulo', 'endereco_imagem', 'texto', 'chamada' , 'estado' , 'id_user',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
