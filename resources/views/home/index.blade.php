@extends('layout')

<form action="/login" method="POST">
{!! csrf_field() !!}
	<table>
		<tr><td>Email: </td><td><input type="email" name="emailUsuario"></td></tr>
		<tr><td>Senha: </td><td><input type="password" name="senhaUsuario"></td></tr>
		<tr><td colspan="2" align="right"><input type="submit" value="Acessar"></td></tr>
	</table>
</form>
