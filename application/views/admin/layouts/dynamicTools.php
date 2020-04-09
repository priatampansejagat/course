<?php
if ($onpage == 'MENTOR') { ?>
	<button onclick="addmentor()" id="addmentor" name="addmentor" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add Mentor">+</button>	 
<?php 
	}else if($onpage == 'COURSE'){ ?>
		<button onclick="addcourse()" id="addcourse" name="addcourse" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Add Course">+</button>
<?php
	}
?>