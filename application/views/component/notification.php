<?php 
	$message = $this->session->flashdata('message');
	$alert = $this->session->flashdata('alert');
	if ($message) {
		echo  '<div class="alert alert-'.$alert.'">
					'.$message.'
			  </div>';
	}
?>