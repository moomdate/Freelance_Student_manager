<script type="text/javascript">
	$(document).ready(function($) {
		function clear_val(){
			$("#register_complee").delay(400).hide(200);
			$("#loadinggg_gif").hide();
			$("#usernameInput").val("");
			$("#nameInput").val("");
			$("#passwordInput").val("");
			$("#confirmPasswordInput").val("");
			$("#registration-form").show();
			$("#span_error").hide('slow');
			$("#usernameInput_div").removeClass('has-feedback has-error');
			$("#nameInput_div").removeClass('has-feedback has-error');
			$("#passwordInput_div").removeClass('has-feedback has-error');
			$("#confirmPasswordInput_div").removeClass('has-feedback has-error');
		}
		function show_complet(){

		}
		$("[name='close_alert']").click(function(event) {
			var _this_id = event.target.id;
			$("#span_error").slideToggle();
		});
		$("#clear_data").click(function(event) {
			clear_val();
		});
		$("#clear_data").click(function(event) {
			clear_val();
		});
		$("#check_all").click(function(event) {
			/* Act on the event */
		});
		$("[name='ban_sw']").click(function(event) {
			this_id = event.target.id;
			var all_check = 0;
			$("[name='ban_sw']").change(function () {
				if($("#check_all").is(':checked')){
					$("[name='ban_sw']").prop('checked', $(this).prop("checked"));
					
				}   
			});
			if($("#check_all").is(':checked')){
						all_check = 1;
			}
			if($("#"+this_id).prop('checked')){
				var data_update = "all="+all_check+"&ban=1&id="+ this_id;
			}else{
				var data_update = "all="+all_check+"&ban=0&id="+ this_id;
			}
			$.ajax({
					url: 'system/ban_update.php',
					type: 'POST',
					dataType: 'json',
					data:data_update,
					success:function(data_for_resultde){
				    //alert(data_for_resultde['status']);
				    location.reload();
					//$("#form_register").load(location.href+" #form_register>*","");
					},
				})
			
		});
		$("#data_register").click(function(event) {
			if($("#usernameInput").val()==""){
				$("#usernameInput").focus();
				$("#usernameInput_div").addClass('has-feedback has-error');
			}
			else if($("#nameInput").val()==""){
				$("#usernameInput_div").removeClass('has-feedback has-error');
				$("#nameInput").focus();
				$("#nameInput_div").addClass('has-feedback has-error');
			}
			else if($("#passwordInput").val()==""){
				$("#nameInput_div").removeClass('has-feedback has-error');
				$("#passwordInput").focus();
				$("#passwordInput_div").addClass('has-feedback has-error');
			}
			else if($("#confirmPasswordInput").val()==""){
				$("#passwordInput_div").removeClass('has-feedback has-error');
				$("#confirmPasswordInput").focus();
				$("#confirmPasswordInput_div").addClass('has-feedback has-error');
			}
			else if($("#confirmPasswordInput").val()!=$("#passwordInput").val()){
				$("#passwordInput_div").removeClass('has-feedback has-error');
				$("#confirmPasswordInput").focus();
				$("#confirmPasswordInput_div").addClass('has-feedback has-error');
			}else{
				$("#confirmPasswordInput_div").removeClass('has-feedback has-error');
				var username = $("#usernameInput").val();
				var name = $("#nameInput").val();
				var password = $("#passwordInput").val();
				var data_for_result = 'username=' + username + '&name=' + name + '&password=' + password;
				//$("#form_register").hide();
				$.ajax({
					url: 'system/user_insert.php',
					type: 'POST',
					dataType: 'json',
					data:data_for_result,
					success:function(data_for_resultde){
						var status_result = data_for_resultde['status'];
						var name_result = data_for_resultde['name'];
						if(status_result=='error'){
							$("#span_error").show('slow');
							$("#ad_text_error").text(name_result);
							$("#usernameInput").focus();
							$("#usernameInput_div").addClass('has-feedback has-error');

						}else if(status_result=='complete'){
							$("#loadinggg_gif").show();
							$("#registration-form").hide();
							$("#register_complee").show(200);
							clear_val();
							$("#register_from").modal('toggle');
							$("#body_show_user").load(location.href+" #body_show_user>*","");
						}
						//console.log(data_for_resultde['name']);
					},
				})
				
			}
		});
	});
</script>
<div class="well with-header with-footer">
     <div class="header bg-blueberry">
         บัญชีผู้ใช้
     </div>


		<!-- Modal -->
		<div class="modal fade modal-blueberry in" id="register_from" tabindex="-1" role="dialog" aria-labelledby="register_from">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">เพิ่มผู้ใช้งาน</h4>
		      </div>
		      <div class="modal-body">
		        	<div class="widget flat radius-bordered">
				         <div class="widget-body">
				             <div class="alert alert-success fade in" id="register_complee" style="display: none">
                                            <button class="close" data-dismiss="alert">
                                                ×
                                            </button>
                                            <i class="fa-fw fa fa-check"></i>
                                            <strong>Success</strong>เพิ่มบัญชีผู้ใช้เรียบร้อยแล้ว
                             </div>

				             <div id="registration-form">
				                 <form role="form" id="form_register">
				                     <div class="form-title">
				                       
				                     </div>
				                     <div class="form-group" id="usernameInput_div">
				                         <span class="input-icon icon-right">
				                             <input type="text" class="form-control" id="usernameInput" placeholder="Username">
				                             <i class="glyphicon glyphicon-user circular"></i>
				                         </span>
				                     </div>
				                     <div class="form-group" id="nameInput_div">
				                         <span class="input-icon icon-right">
				                             <input type="text" class="form-control " id="nameInput" placeholder="Name lastname">
				                             <i class="fa fa-user circular"></i>
				                         </span>
				                     </div>
				                     <div class="form-group" id="passwordInput_div">
				                         <span class="input-icon icon-right">
				                             <input type="password" class="form-control" id="passwordInput" placeholder="Password">
				                             <i class="fa fa-lock circular"></i>
				                         </span>
				                     </div>
				                     <div class="form-group" id="confirmPasswordInput_div">
				                         <span class="input-icon icon-right">
				                             <input type="password" class="form-control" id="confirmPasswordInput" placeholder="Confirm Password">
				                             <i class="fa fa-lock circular"></i>
				                         </span>
				                     </div>
				                 </form>
					                 <div align="center" style="display: none" id="loadinggg_gif">
					                 	<img src="image/loading/ajax-loader.gif">
					                 </div>
					                 <div class="alert alert-danger fade in" style="display: none" id="span_error">
                                            <button class="close" name="close_alert" id="alert_close">
                                                ×
                                            </button>
                                            <i class="fa-fw fa fa-times"></i>
                                            <strong>Error!</strong> <span>มีการใช้งานชื่อ <label id="ad_text_error"></label> แล้ว</span>
                                     </div>
				             </div>
				         </div>
				     </div>		
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-danger" id="clear_data">Clear</button>
		        <button type="button" class="btn btn-success" id="data_register">Save</button>
		      </div>
		    </div>
		  </div>
		</div>

     <div class="row">

          <a class="btn btn-default blueberry" id="ad_user_" data-toggle="modal" data-target="#register_from"><i class="fa fa-plus"></i> Add</a>

     	<table class="table table-hover table-striped table-bordered">
	         <thead class="bordered-blueberry">
	             <tr>
	                 <th>
	                    <div class="checkbox"><span class="text"> #</span></div>
	                 </th>
	                 <th>
	                     <div class="checkbox"><span class="text">Username</div>
	                 </th>
	                 <th>
	                     <div class="checkbox"><span class="text">Name</div>
	                 </th>
	                 <th>
	                     <div class="checkbox"><span class="text">Access Level</span></div>
	                 </th>
	                 <th>
	                     	<div class="checkbox">
                                                        <label>Ban
                                                            <input type="checkbox" class="inverted"id="check_all"> 
                                                            <span class="text">All</span>
                                                        </label>
                                                    </div>
	                 </th>
	             </tr>
	         </thead>
	         <tbody id="body_show_user">
	         <?php
				$sql_que_user=mysql_query("SELECT * FROM user  ");
				while($arr_sql_que_user=mysql_fetch_array($sql_que_user)){

				?>
	             <tr>
	                 <td>
	                     1
	                 </td>
	                 <td>
	                 <?=$arr_sql_que_user['user_uname'];?>
	                 </td>
	                 <td>
	                 <?=$arr_sql_que_user['user_name'];?>
	                 </td>
	                 <td>
	                  <?php
	                  if($arr_sql_que_user['user_type']==1){
	                  	echo "<span class='label label-success'>Amin</span>";
	                  }else{
	                  	echo "<span class='label label-info'>User</span>";
	                  }
	                  ?>
	                 </td>
	                 <td>
	                    <?php
	                    if($arr_sql_que_user['user_type']==1){
	                    	echo "<input class='checkbox-slider slider-icon ' type='checkbox'>";
	                    	echo " <span class='text'></span>";
	                    }else{
	                    ?>
	                 	<label>
	                 	<input class='checkbox-slider slider-icon colored-danger' name="ban_sw" id="<?=$arr_sql_que_user['user_id']?>" type='checkbox'
                               <?php
                               	if($arr_sql_que_user['user_ban']==1){
                               		echo "checked";
                               	}
                               ?>
                               >
                            <span class='text'></span>
                         </label>
                         <?php }?>
	                 </td>
	             </tr>
	             <?php
	         		}	
	             ?>
	         </tbody>
	     </table>
     </div>

     <div class="footer">
         <code>class="table table-striped"</code>
     </div>
 </div>


