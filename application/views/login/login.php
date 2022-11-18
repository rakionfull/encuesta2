
  <!-- Bootstrap Css -->
<link href="<?=base_url('public/assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />

  <div class="container p-3 m-0 border-0 bd-example">

    <form action="<?=base_url()?>auth/ingresar" method="post">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="passw" class="col-sm-2 col-form-label" >Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" name="passw" id="passw" placeholder="Password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
        
  
   
</div>
<script src="<?=base_url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>