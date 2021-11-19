<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chamado; // Model precisa ter o mesmo nome da tabela no banco para realizar o select
use Egulias\EmailValidator\Exception\CharNotAllowed;
use App\Models\User;

class EventsController extends Controller
{
    public function index()
    {
        $search = Request('search');

        if($search)
        {
            $chamado = Chamado::where([
                ['assunto', 'like', '%'.$search.'%']
            ])->get();
        } else
        {
            $chamado = Chamado::all(); // Chama todos os eventos do banco
        }
    
        return view('index',['chamados' => $chamado, 'search' =>$search]); // retorna para a view / um array com todos os eventos que retornaram do banco



    }

    public function novoChamado()
    {
        return view('events/criarChamado');
    }

 
    public function configuracoes()
    {
        return view('events/configuracoes');
    }

    public function store (Request $request)
    {
        $chamado = new Chamado;
        
        $chamado->assunto = $request->assunto;
        $chamado->categoria = $request->categoria;
        $chamado->descricao = $request->descricao;
        $chamado->loja = $request->loja;
        $chamado->prioridade = $request->prioridade;

        // image upload 
        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            

            $requestImage->move(public_path('img/chamados'),$imageName);
            $chamado->image = $imageName;
        }

        $user = auth()->user(); // Autenticação do usuario
        $chamado->user_id = $user->id;


        $chamado->save();

        return redirect('/');
    }

    public function detalhes($id)
    {
        $chamado = Chamado::findOrFail($id);

        $chamadoOwner = User::where('id', $chamado->user_id)->first()->toArray();

        return view('events.detalhes',['chamados' => $chamado, 'chamadoOwner' =>  $chamadoOwner]);
        return view('index',['chamadoOwner' =>  $chamadoOwner]);
    }
}
