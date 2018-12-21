<?php
	function setFlash($message,$type = "success")
	{
		$_SESSION['flash']['message'] = $message;
		$_SESSION['flash']['type'] = $type;
	}
	  
	function flash()
	{
		if(isset($_SESSION['flash']))
		{
			extract($_SESSION['flash']);
			unset($_SESSION['flash']);
			return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
					  '.$message.'
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>';
		}
	}
?>