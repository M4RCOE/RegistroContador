<div class="row p-0 m-0">
  <div class="col d-flex align-items-center">
    <h4>Aside</h4>
  </div>
  <div class="col-lg-10 col-md-10 m-0 p-0">
    <div class="table-responsive border border-right-0 border-left-0 border-bottom-0 border-top-5 border-white">
      <table class="table table-hover table-striped align-middle" id="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Contador</th>
              <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($users_servicio as $key => $user):
              echo "<tr class='datos' data-toggle='modal' data-id=".$user['id']."data-target='#mostarModal".$user['id']."'>";
              echo "<td>".$user['id']."</td>";
              echo "<td>".$user['username']."</td>";
              echo "<td>".$user['email']."</td>";
              echo "<td><input id=contador".$user['id']." value='0:0:0' style='text-align:center' readonly/></td>";
              echo "<td value='botones'>";
          ?>
            <button class="btn btn-dark m-1" id=<?php echo $user['id']?> onclick="accionContador(this)" style="width:100px">Iniciar</button>
            <button type="button" class="btn btn-danger m-1" onclick="peticionModificar(this)">Enviar</button>
          <?php
            echo"</td>";
            echo "</tr>";
            echo "<tr class='espaciado'></tr>";   
            echo '  <div class="modal fade" id="mostrarModal'.$user['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '    <div class="modal-dialog modal-dialog-centered">';
            echo '      <div class="modal-content">';
            echo '        <div class="modal-header">';
            echo '            <h5 class="modal-title col-11 text-center" id="exampleModalLabel">Datos del practicante</h5>';
            echo '            <button type="button" class="btn-close col" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '        </div>';
            echo '      <div class="modal-body d-flex justify-content-between align-items-center flex-column text-center">';
                    echo "  <h3>".$user['username']."</h3>";
                    echo "  <h3>".$user['email']."</h3>";
                    echo "  <input id=contador2".$user['id']." value='0:0:0' style='text-align:center; width:100px' hidden/>";
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
            <input id="tiempo" name="tiempo" type="text" value="" hidden> 
            <input id="tiempoinicial" name="tiempoinicial" type="text" value="" hidden>
            <input id="tiempofinal" name="tiempofinal" type="text" value="" hidden> <br> 
        </form>
<div id="respuesta">
      
</div>
