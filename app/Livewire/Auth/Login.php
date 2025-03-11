<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password; // sempre trabalhar senha como password(padrão).

    protected $rules = [
        'email'=> 'required|email',
        'password' => 'required|min:6'
    ];

    protected $messages = [
        'email.required' => 'email é obrigatório',
        'email.email' => 'formato de email inválido',
        'password.required'=> 'senha é obrigatória',
        'password.min' => 'senha deve conter no mínimo 6 caracteres'
    ];

    // Se encontrar algum erro dos que estão nas regras e em seguida, procurar uma mensagem, se ele não achar, vai amndar em inglês.
    // regenerate -> Cria um cookie no naverfador pra dizer que vocês está ativo.
    public function login(){
        $this->validate();

        if(Auth::attempt(['email' =>$this->email, 'password' =>$this->password])){
            session()->regenerate();
            return redirect()->route(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');
        }
        // flash -> uma das formas de mensagem
        session()->flash('error', 'Email ou senha incorretos');
    }
    

    public function render()
    {
        return view('livewire.auth.login');
    }
}
