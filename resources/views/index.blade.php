@extends ('layouts.main')

@section('title','home')

@section('content')


<div id="search-container" class="col-md-12">
    <h1>Busque um Chamado</h1>

    <form action="/" method="GET">
    <input type="text"  class="busca" name="search"  class="form-control"  >


    </form>

</div>



<div id="events-container" class="col-md-12">
@if($search)
    <h2>Buscando por: {{$search}}</h2>
    <p class="subtitle">Vejas os chamados relacionados a sua busca</p>
    @else
    <h2>Seus Chamados </h2>
    <p class="subtitle">Vejas aqui todos os chamados já criados </p>
    @endif



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

        @if(count($chamados) === 0 && $search)
        <div class="alert alert-danger" role="alert">
           Não existe nenhum chamado sobre "{{$search}}". <a href="/" class="alert-link"> Retorne a tela inicial</a> para buscar outro chamado! 
        </div>
        @elseif(count($chamados) === 0)
        <div class="alert alert-secondary" role="alert">
            Não há chamados em aberto!
        </div>
        @endif
    </div>

  
</div>







@endsection