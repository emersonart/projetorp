<div class="mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="bg-site">
        <!-- C O N T E U D O -->

       <form action="" method="">

  <div class="card" >
    <div class="card-header" id="dash-professor-card-title">
      Criar uma sala de Aula
    </div>
    <br><br><div class="card-body">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
           
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"> Nome da turma </span>
              <input type="text" class="form-control" aria-describedby="basic-addon1" value="">
          </div>

          <br><textarea name="name" rows="3" class="form-control" placeholder="Descrição da Turma"></textarea>
          
          <br><div class="input-group">
            <span class="input-group-addon" id="basic-addon1"> Tempo disponível </span>
              <input type="date" class="form-control" aria-describedby="basic-addon1" value="">
          </div>

          <br><div class="input-group-mb-3">
              <select class="custom-select" id="inputGroupSelect01" style="height: 40px; padding-left: 15px;">
                <option selected>Disciplina</option>
                <option value="1">Física</option>
                <option value="2">Matemática</option>
                <option value="3">Português</option>
              </select>
          </div>
          <br>
          
          <button type="button" class="btn btn-success"> Criar sala</button>
          </div>
      </div>
    </div>
  </div>

</form>
<?php var_dump($getturma);?>

      <!-- FIM CONTEUDO -->
      </div>
    </div>
  </div>
</div>
