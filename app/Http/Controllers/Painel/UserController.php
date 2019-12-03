<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    private $user;
    protected $totalPage = 20;

    public function __construct(User $user) {
		$this->user = $user;
    }
    
    public function index() {
		$title = 'Usuários';

		$users = $this->user->paginate($this->totalPage);

		return view('painel.users.index', compact('title', 'users'));

    }
    
    public function create() {
		$title = 'Cadastrar Novo Usuário';

		return view('painel.users.create', compact('title'));
    }
    
    public function store(Request $request) {
		if($this->user->newUser($request))
		 return redirect()
			->route('users.index')
			->with('sucess', 'Cadastro realizado com sucesso!');

		else 
			return redirect()
				->back()
				->with('error', 'Falha ao cadastrar!');
    }
    
    public function show($id) {
		$user = $this->user->find($id);

		if (!$user) {
			return redirect()->back();
		}

		$title = "Detalhes do Usuário: { $user->name}";

		return view('painel.users.show', compact('title', 'user'));

    }
    
    public function edit($id) {
		$user = $this->user->find($id);

		if (!$user) {
			return redirect()->back();
		}

		$title = "Editor Usuário: { $user->name}";

		return view('painel.users.edit', compact('title', 'user'));
    }
    
    public function update(Request $request, $id) {
		$user = $this->user->find($id);

		if (!$user) {
			return redirect()->back();
        }
        
		if($user->updateUser($request))
				return redirect()
					->route('users.index')
					->with('success', 'Atualizado com sucesso!');
		else
				return redirect()
					->back()
					->with('error', 'Falha ao atualizar');

    }
    
    public function destroy($id) {
		$user = $this->user->find($id);

		if (!$user) {
			return redirect()->back();
		}

		if ($user->delete()) {
			return redirect()
				->route('users.index')
				->with('success', 'Deletado com sucesso!');
		} else {
			return redirect()
				->back()
				->with('error', 'Falha ao deletar!');
		}

    }
    
    public function search(Request $request) {
		$dataForm = $request->except('_token');

		$user = $this->user->search($request, $this->totalPage);

		$title = "users, filtros para: {$request->key_search}";

		return view('painel.users.index', compact('title', 'user', 'dataForm'));
	}

}
