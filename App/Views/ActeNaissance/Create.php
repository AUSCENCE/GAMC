<?php include_once(dirname(__FILE__).'/../layoutform/hearder.php');?>
<?php include_once(dirname(__FILE__).'/../layoutform/asider.php');?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h1>Acte de Naissance</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Etablir L'acte de naissance</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post" action="">
                <input type="hidden" name="_method" value="POST" />
                <div class="card-body">
                    <div class="row ">                       
                        <div class="col-5 ml-5 " style="border: 1px black solid; border-radius: 10px; margin: 10px;">                            
                            <div class="form-group">
                                <label for="Prenoms">Prénom(s) de l'enfant</label>
                                <input type="text" name="Prenoms" class="form-control" id="Prenoms" >
                            </div>
                            <div class="form-group">
                                <label for="datenaissance">Date de naissance de l'enfant</label>
                                <input type="date" name="datenaissance" class="form-control" id="datenaissance">
                            </div>
                            <div class="form-group">
                                <label for="lieunaissance">Lieu de naissance de l'enfant</label>
                                <input type="text" name="lieunaissance" class="form-control" id="lieunaissance">
                            </div>
                        </div>
                        <div class="col-5"style="border: 1px black solid; border-radius: 10px; margin: 10px;">                            
                            <div class="form-group">
                                <label for="Namepere">Nom et Prénom(s) du Père</label>
                                <input type="text" name="Namepere" class="form-control" id="Namepere" >
                            </div>
                            <div class="form-group">
                                <label for="datenaispere">Date de naissance du Père</label>
                                <input type="date" name="datenaispere" class="form-control" id="datenaispere">
                            </div>                            
                            <div class="form-group">
                                <label for="ProfPere">Profession du Père</label>
                                <input type="text" name="ProfPere" class="form-control" id="ProfPere">
                            </div>
                        </div>
                        <div class="col-5 ml-5"style="border: 1px black solid; border-radius: 10px; margin: 10px;">                            
                            <div class="form-group">
                                <label for="Namedecla">Nom et Prénom(s) du Déclarant</label>
                                <input type="text" name="Namedecla" class="form-control" id="Namedecla" >
                            </div>
                            <div class="form-group">
                                <label for="datedecla">Date de Déclaration</label>
                                <input type="text" name="datedecla" readonly value="<?php echo(date('d/m/Y')) ?>" class="form-control" id="datedecla">
                            </div>
                            
                            <div class="form-group">
                                <label for="interprete">Interprete</label>
                                <input type="text" name="interprete"  class="form-control" id="interprete">
                            </div>
                        </div> 
                        <div class="col-5" style="border: 1px black solid; border-radius: 10px; margin: 10px;">                            
                            <div class="form-group">
                                <label for="Prenomsmere">Nom et Prénom(s) de la Mère</label>
                                <input type="text" name="Prenomsmere" class="form-control" id="Prenomsmere" >
                            </div>
                            <div class="form-group">
                                <label for="datenaismere">Date de naissance de la Mère</label>
                                <input type="date" name="datenaismere" class="form-control" id="datenaismere">
                            </div>
                            <div class="form-group">
                                <label for="Profmere">Profession de la Mère</label>
                                <input type="text" name="Profmere" class="form-control" id="Profmere">
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-5">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>

