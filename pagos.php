<?php
include_once('header.php')
?>
<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Registros</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
    
    <div class="outer-container">
        <form class="row g-3" method="post" name="ExcelImportForm" id="ExcelImportForm" enctype="multipart/form-data">

            <div class="col-auto">
                <label class="form-label">Elija Archivo Excel</label>
                <input class="" type="file" name="file" id="fileexceldata" onkeyup="loaddds(1);" accept=".xls,.xlsx">
            </div>
            <div class="col-auto">
                
                <label class="visually-hidden">Tasa Del Dia</label>
                <!--<span class="input-group-text">Bs.S</span>-->
                <input type="number" id="tasa" placeholder="Tasa Del Dia">
            </div>
            <div class="col-auto">
                <button type="submit" id="import" name="import" class="btn btn-primary mb-3">Importar Registros</button>
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         

        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Cargo</th>
                <th>fecha de carga</th>
                <th>Celular</th>
                <th>Descripcion</th>
                <th>Referencia</th>
                <th>fecha de movimiento</th>

            </tr>
        </thead>

        </tbody>
    </table>

      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->

<script src="pagos.js"></script>
<?php
include_once('footer.php')
?>