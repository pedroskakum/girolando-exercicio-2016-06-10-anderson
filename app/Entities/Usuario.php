<?php

namespace App\Entities;

#use Illuminate\Database\Eloquent\Model;

class Usuario extends \Illuminate\Foundation\Auth\User
{
    protected $fillable = ['nomeUsuario', 'emailUsuario', 'senhaUsuario', 'password'];

	public function setSenhaUsuarioAttribute($value)
	{
		$this->password = $value;
	}
}
