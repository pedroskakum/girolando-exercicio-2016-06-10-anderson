<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeLoginTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInvalidLogin()
    {
		$this->flushSession();
        $this->visit('/')
		->type('ansilva@girolando.com.br', 'emailUsuario')
		->type('errada', 'senhaUsuario')
		->press('Acessar')
		->seePageIs('/');


    }

	public function testInvalidEmail()
	{
		$this->flushSession();
		$this->visit('/')
			->type('email invalido', 'emailUsuario')
			->type('coisa', 'senhaUsuario')
			->press('Acessar')
			->seePageIs('/');
	}

	public function testBlankFields()
	{
		$this->flushSession();
		$this->visit('/')
			->type('', 'emailUsuario')
			->type('coisa', 'senhaUsuario')
			->press('Acessar')
			->seePageIs('/');

		$this->flushSession();
		$this->visit('/')
			->type('', 'senhaUsuario')
			->type('email@coisa.com', 'senhaUsuario')
			->press('Acessar')
			->seePageIs('/');
	}

	public function testValidLogin()
	{
		$this->flushSession();
		$senha = str_random(70);
		$usuario = App\Entities\Usuario::create(['nomeUsuario' => str_random(20), 'emailUsuario' => str_random(10).'@'.str_random(5).'.com', 'senhaUsuario' => bcrypt($senha)]);
		$this->visit('/')
			->type($usuario->emailUsuario, 'emailUsuario')
			->type($senha, 'senhaUsuario')
			->press('Acessar')
			->seePageIs('/dashboard')
			->see('Bem vindo '.$usuario->nomeUsuario);
	}
}
