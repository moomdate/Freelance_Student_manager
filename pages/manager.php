<div class="widget flat radius-bordered">
	<div class="widget-header  bordered-bottom bordered-blue">
	<span class="widget-caption">
		<ol class="breadcrumb">
		  <li>
		  <?php
		  	if(isset($_GET['manage'])){
		  		echo "<a href='?comm=main&sub=manage'>manage</a> /";
		  			if(isset($_GET['manage'])){
						$menu_menage = $_GET['manage'];
					}else{
						$menu_menage = NULL;
					}
					switch ($menu_menage) {
						case 'manage':
							require 'manager_menu.php';
							break;
						case 'class':
							echo " class manager";
							break;
						case 'user':
							echo "student"; 
							break;
						case 'lesson':
							echo "Lesson"; 
							break;
						case 'student':
							echo "student"; 
							break;				
						default:
							//require 'manager_menu.php';
							break;
					}
		  	}
		  	else{
		  		echo  "<i class=\"fa fa-wrench fa-1x\" aria-hidden=\"true\"></i> manage";
		  	}
		  ?>
		  

		  </li>

		</ol>
	</span>
	</div>
	<div class="widget-body bordered-bottom bordered-blue">
		 	<?php
		if(isset($_GET['manage'])){
			$menu_menage = $_GET['manage'];
		}else{
			$menu_menage = NULL;
		}
		switch ($menu_menage) {
			case 'manage':
				require 'manager_menu.php';
				break;
			case 'class':
				require 'class_setting.php';
				break;
			case 'user':
				require 'user.php';
				break;	
			case 'lesson':
				require 'lesson_set.php';
				break;
			case 'student':
				require 'student_manage.php';
				break;				
			default:
				require 'manager_menu.php';
				break;
		}
		?>

	</div>

</div>