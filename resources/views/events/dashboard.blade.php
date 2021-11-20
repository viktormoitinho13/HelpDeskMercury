@extends ('layouts.main')

@section('title','Dashboard')

@section('content')


<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Chamados </h1>
</div>





<div class="col-md-10 offset-md-1 dashboard-events-container">
  @if(count($chamados) > 0)

  <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Assunto</th>
                <th scope="col">categoria</th>
                <th scope="col">Data de criação</th>
                <th scope="col">Edição</th>
         
                </tr>
        </thead>


        <tbody>
        @foreach ($chamados as $dadosChamado )
        <tr>
         <td scropt="row">{{$loop->index + 1}} </td>
            <td><a href="/events/{{$dadosChamado->id}}">  {{$dadosChamado->assunto}}</a> </td>  
            <td>{{$dadosChamado->categoria}}</td>  
            <td>{{\Carbon\Carbon::parse($dadosChamado->create_at)->format('d/m/Y')}}</td>  
            <td>
              <a href=""  title="update"><ion-icon  name="arrow-up-circle-outline" color="success"  ></ion-icon></a> 
              <a href="#" title="Deletar"><ion-icon class="delete" name="trash-outline" color="danger"></ion-icon></a>
            </td>
             
            </tr>
            @endforeach
        </tbody>
    </table>

  @else

  <p>Você ainda não possuí chamados, <a href="/NovoChamado">Clique aqui para criar um.</a></p>

  @endif

</div>




@endsection