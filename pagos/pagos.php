<?php
include_once('../header.php')
?>
<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Importar archivo de Excel a MySQL usando PHP</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Elija Archivo Excel</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Importar Registros</button>
        
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
<?php
include_once('../footer.php')
?>