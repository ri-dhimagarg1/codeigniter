<?php include('admin_header.php');
?>
<div class="container">
<div class="row">
<div class="col-lg-6 col-lg-offset-6">
<?= anchor('admin/addarticle','Add article',['class'=>'btn btn-primary pull-right']); ?>
</div>
</div>
<?php if( $feedback = $this->session->flashdata('feedback')):
$feedbackclass =  $this->session->flashdata('feedback_class')?>
      <div class="row">
      <div class="col-lg-6">
      <div class="alert alert-dismissible <?= $feedbackclass ?>">
      <?= $feedback ?>
      </div>
      </div>
      </div>
    <?php endif; ?>
<table class="table">
<thead>
	<th>S.No</th>
	<th>Title</th>
	<th>Action</th>
</thead>
	<tbody>
		<?php if(count($art)): 
				$count= $this->uri->segment(3,0);
				foreach ($art as $articles): ?>
		<tr>
			<td><?= ++$count ?></td>
			<td>
			<?= $articles->title ?>
			</td>
			<td>
			<div class="row">
			<div class="col-lg-2">
			<?= anchor("admin/edit_article/{$articles->id}",'Edit',['class'=>'btn btn-primary']);?>
			</div>
			<div class="col-lg-2">
			<?= form_open('admin/delete_article'),
				form_hidden('article_id',$articles->id),
				form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
				form_close();
			 ?>
			 </div>
			 </div>
			</td>
			
		</tr>
	<?php endforeach; ?>
		<?php else: ?>
			<tr colspan="3">
				<td>No records found</td>
			</tr>
		<?php endif;?>
	</tbody>
</table>
	<?= $this->pagination->create_links(); ?>
</div>
<?php include('admin_footer.php');
?>