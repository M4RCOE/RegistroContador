<div class="d-flex justify-content-center">
  <div class="container text-center mw-80 d-flex flex-column align-items-centerjustify-content-center p-0 m-0">
    <div class="table-responsive border border-right-0 border-left-0 border-bottom-0 border-top-5 border-white">
      <table class="table table-hover table-striped align-middle" id="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col" hidden>Correo</th>
              <th scope="col" hidden>Contador</th>
              <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($users_servicio as $key => $user):
              echo "<tr class='datos' data-toggle='modal' data-id=".$user['id']."data-target='#mostarModal".$user['id']."'>";
              echo "<td>".$user['id']."</td>";
              echo "<td>".$user['username']."<br><input id=contador".$user['id']." value='0:0:0' style='text-align:center' hidden/><p class='d-inline' style='font-size:12px'>Actualmente: </p><p class='d-inline' style='font-size:12px' id='tiempohoy".$user['id']."'>0:0:0</p></td>";
              echo "<td hidden>".$user['email']."</td>";
              echo "<td hidden></td>";
              echo "<td value='botones'>";
          ?>
            <button class="btn btn-dark m-1 rounded-pill" id=<?php echo $user['id']?> onclick="accionContador(this)" style="width:100px">Iniciar</button>
            <button class="btn btn-danger m-1 rounded-pill" onclick="accionContador2(this)">Enviar</button>
          <?php
            echo"</td>";
            echo "</tr>";
            echo "<tr class='espaciado'></tr>";   
            echo '  <div class="modal fade bd-example-modal-lg" id="mostrarModal'.$user['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '    <div class="modal-dialog modal-lg modal-dialog-centered">';
            echo '      <div class="modal-content">';
            echo '        <div class="modal-header">';
            echo '            <h5 class="modal-title col-11 text-center" id="exampleModalLabel">Datos del practicante</h5>';
            echo '            <button type="button" class="btn-close col" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '        </div>';
            echo '      <div class="modal-body d-flex justify-content-between align-items-center flex-column text-center">';

            echo '<nav>';
            echo'<div class="nav nav-tabs" id="nav-tab'.$user['id'].'" role="tablist">';
            echo'  <a class="nav-link active" id="nav-dia-tab'.$user['id'].'" data-bs-toggle="tab" href="#nav-dia'.$user['id'].'" role="tab" aria-controls="nav-dia" aria-selected="true">Día</a>';
            echo'  <a onclick="aber(this)" class="nav-link" id="nav-semana-tab'.$user['id'].'" data-bs-toggle="tab" href="#nav-semana'.$user['id'].'" role="tab" aria-controls="nav-semana" aria-selected="false">Semana</a>';
            echo'  <a class="nav-link" id="nav-mes-tab'.$user['id'].'" data-bs-toggle="tab" href="#nav-mes'.$user['id'].'" role="tab" aria-controls="nav-mes" aria-selected="false">Mes</a>';
            echo'</div>';
            echo'</nav>';
            echo '<div class="tab-content" id="nav-tabContent">';
            echo '<div class="tab-pane fade show active" id="nav-dia'.$user['id'].'" role="tabpanel" aria-labelledby="nav-dia-tab">';
            echo'    <p>Día</p>';
            echo '</div>';
            echo '  <div class="tab-pane fade" id="nav-semana'.$user['id'].'" role="tabpanel" aria-labelledby="nav-semana-tab">';
            echo '<div style="width:300px; height:300px">';
            echo '        <canvas id="myChart'.$user['id'].'" width="50" height="50"></canvas>';
            echo '</div>';
            echo '  </div>';
            echo ' <div class="tab-pane fade" id="nav-mes'.$user['id'].'" role="tabpanel" aria-labelledby="nav-mes-tab">';
            echo '    <p>Mes</p>';
            echo '  </div>';
            echo '</div>';
            echo '       </div>';
            echo '       <div class="modal-footer d-flex justify-content-center">';
            echo '          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>';
            echo '       </div>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
          endforeach;
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<form id='formulario' method="POST">
            <input id="nombre" name="nombre" type="text" value="" hidden>
            <input id="fecha" name="fecha" type="text" value="" hidden> 
            <input id="tiempo" name="tiempo" type="text" value="0:0:0" hidden> 
            <input id="tiempoinicial" name="tiempoinicial" type="text" value="" hidden>
            <input id="tiempofinal" name="tiempofinal" type="text" value="" hidden> <br> 
        </form>
<!-- <button onclick="consulta()">Calar</button>
<div id="respuesta">
      
</div> -->
