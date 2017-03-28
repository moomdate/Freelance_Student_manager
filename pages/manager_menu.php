<?php
	$sql_class_query=mysql_query("SELECT * FROM class");
	$sql_fecth_class=mysql_num_rows($sql_class_query);
	$sql_user_query=mysql_query("SELECT * FROM user");
	$sql_fecth_user=mysql_num_rows($sql_user_query);
	$sql_user_lesson=mysql_query("SELECT * FROM lesson");
	$sql_fecth_lesson=mysql_num_rows($sql_user_lesson);
?>
<div class="row">
	 		<div class="col-lg-3 col-sm-6 col-xs-12">
	 			 <a href="?comm=main&sub=manage&manage=class">
	                 <div class="databox radius-bordered databox-shadowed databox-graded databox-vertical">
	                    	<div class="databox-top bg-blue">
	                            <div class="databox-icon">
	                            <i class="fa fa-navicon fa-5x" aria-hidden="true"></i>
	                            </div>
	                        </div>
	                        <div class="databox-bottom text-align-center">
	                            <span class="databox-text">จัดการชั้นเรียน</span>
	                            <span class="databox-text"><h5>จำนวนชั้นเรียน: <?=$sql_fecth_class?> ชั้น</h4></span>
	                        </div>
	                 </div>
                 </a>
             </div>
             <div class="col-lg-3 col-sm-6 col-xs-12">
	 			 <a href="?comm=main&sub=manage&manage=student">
	                 <div class="databox radius-bordered databox-shadowed databox-graded databox-vertical">
	                    	<div class="databox-top bg-green">
	                            <div class="databox-icon">
	                            <i class="fa fa-users fa-5x" aria-hidden="true"></i>
	                            </div>
	                        </div>
	                        <div class="databox-bottom text-align-center">
	                            <span class="databox-text">จัดการนักเรียน</span>
	                            <span class="databox-text">จำนวนนักเรียน: คน</span>
	                        </div>
	                 </div>
                 </a>
             </div>
             <div class="col-lg-3 col-sm-6 col-xs-12">
	 			 <a href="?comm=main&sub=manage&manage=lesson">
	                 <div class="databox radius-bordered databox-shadowed databox-graded databox-vertical">
	                    	<div class="databox-top bg-orange">
	                            <div class="databox-icon">
	                            <i class="fa fa-book fa-5x" aria-hidden="true"></i>
	                            </div>
	                        </div>
	                        <div class="databox-bottom text-align-center">
	                            <span class="databox-text">จัดการบทเรียน</span>
	                            <span class="databox-text">จำนวนบทเรียนทั้งหมด:<?=$sql_fecth_lesson?> บทเรียน</span>
	                        </div>
	                 </div>
                 </a>
             </div>
             <div class="col-lg-3 col-sm-6 col-xs-12">
	 			 <a href="?comm=main&sub=manage&manage=user">
	                 <div class="databox radius-bordered databox-shadowed databox-graded databox-vertical">
	                    	<div class="databox-top bg-blueberry">
	                            <div class="databox-icon">
	                            <i class="fa fa-user fa-5x" aria-hidden="true"></i>
	                            </div>
	                        </div>
	                        <div class="databox-bottom text-align-center">
	                            <span class="databox-text">จัดการบัญชีผู้ใช้</span>
	                            <span class="databox-text">จำนวนบัญชี: <?=$sql_fecth_user?> บัญชี</span>
	                        </div>
	                 </div>
                 </a>
             </div>
	 	</div>