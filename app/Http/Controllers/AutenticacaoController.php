<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AutenticacaoController extends Controller
{
	public function store(\App\Http\Requests\AutenticacaoRequest $request)
	{
		$userdata = ['emailUsuario' => $request->emailUsuario, 'password' => $request->senhaUsuario];
		$logou = \Auth::guard('web')->attempt($userdata);
		if($logou) return redirect('/dashboard');
		return redirect()->back()->with(['error' => 'Login invalido'])->withInput($request->except('senhaUsuario'));
	}
}
