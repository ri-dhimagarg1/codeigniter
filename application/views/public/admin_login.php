<?php include('public_header.php');?>
<div class="container">
<?php echo form_open('login/admin_login',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Admin Login</legend>
    <?php if( $error = $this->session->flashdata('login_failed')): ?>
      <div class="row">
      <div class="col-lg-6">
      <div class="alert alert-dismissible alert-danger">
      <?= $error ?>
      </div>
      </div>
      </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
      <?php  echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'username','value'=>set_value('username')]); ?>
      <br>
      <br>

      <?php echo form_error('username',"<p class='text-danger'>","</p>"); ?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <?php  echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'password']); ?>
          <?php echo form_error('password',"<p class='text-danger'>","</p>"); ?>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Checkbox
          </label>
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
       
        <?php echo form_reset(['name'=>'reset','value'=>'reset','class'=>'btn btn-default']),
        			form_submit(['name'=>'Submit','value'=>'login','class'=>'btn btn-primary']);?>

      </div>
    </div>
  </fieldset>
</form>

</div>

<?php include('public_footer.php'); ?>