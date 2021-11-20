@extends ('layouts.main')

@section('title','home')

@section('content')



<div id="events-detalhes" class="col-md-10 offset-md-1">
    <div class="row">

        <div id="info-container" class="col-md-6">

            <div class="card" style="width: 28rem;">
                <div class="card-header">
                    <h1>Chamado: #{{$chamados->id}}</h1>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <p class="chamado-departamento" title="Assunto">
                            <ion-icon item-start name="newspaper-outline"></ion-icon> {{$chamados->assunto}}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="chamado-categoria" title="Categoria"> 
                            <ion-icon  name="layers-outline"></ion-icon> {{$chamados->categoria}}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="chamado-usuario" title="Nome do usuário" >
                            <ion-icon  item-start name="person-outline"></ion-icon> {{$chamadoOwner['name']}}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="chamado-loja" title="Número da loja">
                            <ion-icon name="storefront-outline"></ion-icon> {{$chamados->loja}}
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="chamado-data" title="Data de abertura">
                            <ion-icon name="calendar-outline"></ion-icon>
                            {{\Carbon\Carbon::parse($chamados->create_at)->format('d/m/Y')}}
                        </p>
                    </li>

                    <li class="list-group-item">
                        <p class="chamado-status" title="Status">
                        <ion-icon name="speedometer-outline"></ion-icon>
                          STATUS
                        </p>
                    </li>




                </ul>
            </div>


        </div>

        <div class="col-md-6" id="description-container">


            <div class="card" style="width: 28rem;">
                <div class="card-header" title="Descrição do problema">
                    <h3>
                        <ion-icon name="construct-outline"></ion-icon> Mensagem
                    </h3>
                </div>
                <div class="card-body">
                    <p class="event-description">
                        {{$chamados->descricao}}
                    </p>
                </div>


            </div>


            <div class="card" style="width: 28rem;">
                <div class="card-header" title="Anexo do problema">
                    <h3>
                        <ion-icon name="image-outline"></ion-icon> Anexos
                    </h3>
                </div>
                <div class="card-body">
                <a href="/img/chamados/{{$chamados->image}}" target="_blank"> Visualizar </a>
                </div>


            </div>

        </div>
    </div>



    @endsection