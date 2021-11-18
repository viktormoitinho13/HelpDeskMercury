@extends ('layouts.main')

@section('title','home')

@section('content')


<div id="search-container" class="col-md-12">
    <h1>Busque um Chamado</h1>

    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar.....">


    </form>

</div>



<div id="events-container" class="col-md-12">
<h1> Lista de chamados</h1>
    <p class="subtitle"> Vejas os chamados que estão em aberto</p>
    <div id="cards-containers" class="row">
        @foreach ($chamados as $dadosChamado)
        <div class="card col-md-2">
                <div class="card-body">
                <p class="card-date">Data de abertura: {{\Carbon\Carbon::parse($dadosChamado->create_at)->format('d/m/Y')}}</p>
                <h5 class="card-title">Assunto: {{$dadosChamado->assunto}}</h5>
                <p class="card-participants" title="Usuário">Usuário: {{$dadosChamado->usuario}}</p>
                <p class="card-participants" title="Número da Loja">Nº da Loja: #{{$dadosChamado->loja}}</p>
                
                <a href="/events/{{$dadosChamado->id}}" class="btn btn-primary" >Saber mais</a>

            </div>
        </div>

        @endforeach
    </div>

  
</div>







@endsection