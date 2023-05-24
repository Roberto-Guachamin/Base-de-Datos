<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Borrar una cama</h2>
      <hr>
      <h3 class="mt-4">Inserta el id de la cama que deseas eliminar</h3> 
      <form method="post" action="../scripts/delete_cama.php">
        <div class="form-group">
          <label for="id_cama">Id</label>
          <input type="text" name="id_cama" class="form-control">
        </div>
        
        <div class="form-group">
          <input type="submit" name="borrar_cama" class="btn btn-primary" value="Borrar Cama">
        </div>
      </form>
    </div>
  </div>
</div>
