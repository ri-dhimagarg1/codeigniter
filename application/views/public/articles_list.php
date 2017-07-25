<?php include('public_header.php');?>
<div class="container">
<h1>All Articles</h1>
<hr>
<table class="table">
	<thead>
		<tr>
			<td>Sno.</td>
			<td>Title</td>
			<td>Date</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php if(count($articles)): ?>
			<?php $count= $this->uri->segment(3,0); ?>
			<?php foreach ($articles as $article): ?>
			<td><?php echo ++$count ?></td>
			<td><?= anchor( "user/article/{$article->id}",$article->title) ?></td>
			<td><?php echo "Date"; ?></td>
		</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td colspan="3">
					No records found
				</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>
<?= $this->pagination->create_links(); ?>
</div>

<?php include('public_footer.php'); ?>