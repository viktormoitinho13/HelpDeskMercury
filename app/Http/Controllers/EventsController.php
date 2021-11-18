<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chamado; // Model precisa ter o mesmo nome da tabela no banco para realizar o select
use Egulias\EmailValidator\Exception\CharNotAllowed;

class EventsController extends Controller
{
    public function index()
    {
        $chamado = Chamado::all(); // Chama todos os eventos do banco
    
        return view('index',['chamados' => $chamado]); // retorna para a view / um array com todos os eventos que retornaram do banco



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
        $chamado->usuario = $request->usuario;
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


        $chamado->save();

        return redirect('/');
    }

    public function detalhes($id)
    {
        $chamado = Chamado::findOrFail($id);
        return view('events.detalhes',['chamados' => $chamado]);
    }
}
