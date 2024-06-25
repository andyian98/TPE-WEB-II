<?php require 'templates/header.phtml' ?>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Iniciar Sesión</h3>

            <form class="login" action="verify" method="POST">
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" required />
                <label class="form-label" for="typeEmailX-2">Email</label>
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" required />
                <label class="form-label" for="typePasswordX-2">Contraseña</label>
              </div>

              <?php if (isset($msg)) { ?>
                <div class="alert alert-warning">
                  <?php echo $msg; ?>
                </div>
              <?php } ?>

              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Ingresar</button>
            </form>

            <hr class="my-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require 'templates/footer.phtml' ?> 
