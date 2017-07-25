<?php include('admin_header.php'); ?>
<div class="container">
<?php echo form_open("admin/update_article/{$article->id}",['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Add article</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Article Title</label>
      <div class="col-lg-10">
      <?php  echo form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Articles title','value'=>set_value('title',$article->title)]); ?>
      <br>
      <br>

      <?php echo form_error('title',"<p class='text-danger'>","</p>"); ?>
      </div>'
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Article Body</label>
      <div class="col-lg-10">
        <?php  echo form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Articles body','value'=>set_value('body',$article->body)]); ?>
          <?php echo form_error('body',"<p class='text-danger'>","</p>"); ?>
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
        			form_submit(['name'=>'Submit','value'=>'submit','class'=>'btn btn-primary']);?>

      </div>
    </div>
  </fieldset>
</form>

</div>

<?php include('admin_footer.php'); ?>