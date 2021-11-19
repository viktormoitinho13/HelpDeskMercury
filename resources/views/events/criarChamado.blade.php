@extends ('layouts.main')

@section('title','Novos chamados')

@section('content')


<div id="event-criarChamado-container" class="col-md-6 offset-md-3">
    <h1><ion-icon name="construct-outline"></ion-icon> Crie o seu chamado</h1>
    <form action="/chamado" method="POST" enctype="multipart/form-data">
        @csrf


        <!--Assunto do chamado -->

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text "><ion-icon name="document-text-outline" size="large"> </ion-icon></span>
            </div>
            <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto do chamado"
                required>
        </div>


        <!--Categoria do chamado -->
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><ion-icon name="chevron-down-outline" size="large"> </span>
            </div>
            <select name="categoria" id="categoria" class="form-control" required>
                <option value="impressora">Impressora</option>
                <option value="cabeamento">Cabeamento</option>

            </select>

        </div>
        <!--Usuario do chamado 
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" ><ion-icon name="person-outline" size="large"> </span>
            </div>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="O seu nome " required>
        </div>
-->


        <!--Loja  do Chamado -->

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" ><ion-icon name="calendar-number-outline" size="large"> </span>
            </div>
            <input type="number" class="form-control" id="loja" name="loja" placeholder="Número da sua loja " required>       
         </div>
         


        <!--Prioridade  do Chamado -->
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><ion-icon name="speedometer-outline" size="large"> </span>
            </div>
            <select name="prioridade" id="prioridade" class="form-control" required>
                <option value="" selected disabled hidden>Prioridade em sua opinião</option>
                <option value="0">Baixa</option>
                <option value="1">Média</option>
                <option value="2">Alta</option>

            </select>

        </div>




        <!--Descrição do Chamado -->

        <div class="input-group  ">
            <div class="input-group-prepend">
            </div>
            <span class="input-group-text"><ion-icon name="chatbubble-outline" size="large"> </span>

            <textarea class="form-control" id="descricao" name="descricao" placeholder="Descricao do Chamado" required></textarea>
        </div>
        
     
   <!--Imagem do evento -->

   <div class="input-group">
               <input type="file" class="form-control" id="image" name="image" placeholder="Imagem do evento">
         </div>


        <input type="submit" class="btn btn-primary" value="Criar Chamado">

    </form>

</div>




@endsection