<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chamado; // Model precisa ter o mesmo nome da tabela no banco para realizar o select
use Egulias\EmailValidator\Exception\CharNotAllowed;
use App\Models\User;

class EventsController extends Controller
{
    

    public function novoChamado()
    {
        return view('events/criarChamado');
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
    }

    public function dashboard(){
        $user = auth()->user();

        $chamado = $user->chamados;

        return view('events.dashboard', ['chamados' => $chamado]);

         }

    public function index()
    {
        
        $user = auth()->user();
        $search = Request('search');

        $chamado = $user->chamados;
      
      

        if($search)
        {
            $chamado = Chamado::where([
                ['assunto', 'like', '%'.$search.'%']
            ])->get();
        } 
        
      
    
        return view('index',['chamados' => $chamado, 'chamados' => $chamado, 'search' =>$search]); // retorna para a view / um array com todos os eventos que retornaram do banco
        

       

    }
}
