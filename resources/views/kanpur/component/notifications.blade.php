<div class="row boxsizepr">
	<div class="col-md-12">
		<ul class="list-unstyled activity-list">
			@foreach ($notifications as $row)
			<li>
				<i class="fa fa-check activity-icon pull-left"></i>
				<?php echo $row->content; ?>
			</li>
			@endforeach						
		</ul>
		<?php 
			$links = $notifications->links();
			$links = str_replace("<a", "<a class='pages' ", $links);
			echo $links; 
		?>
		<!--p class="text-center more"><a href="#" class="btn btn-md">View more <i class="fa fa-long-arrow-right"></i></a></p -->
	</div>
</div>