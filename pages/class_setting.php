<script type="text/javascript">
$(document).ready(function() {
	var time_toggle = 100;
	function randomIntFromInterval(min,max)
	{
	    return Math.floor(Math.random()*(max-min+1)+min);
	}
    $(".btn").click(function(event) {
        //alert(" xx" + event.target.id);
        $("#name_f_class" + event.target.id).toggle(time_toggle);
        $("#_input_name_class" + event.target.id).show(time_toggle);
        $("#_edit_name_class" + event.target.id).toggle(time_toggle);
        $("#_sumit_name_class" + event.target.id).toggle(time_toggle);
        $("#detail_data_edit" + event.target.id).toggle(time_toggle);
        $("#detail_result" + event.target.id).toggle(time_toggle);
    });
    $("[name='save_data']").click(function(event) {
     	$("#_input_name_class" + event.target.id).hide(time_toggle);

     	var name_ca = $('#input_name_f_class'+event.target.id).val();
		var detail_data = $('#detail_data_edit'+event.target.id).val();
		var value_div = $("#input_name_f_class"+event.target.id).val();
		$('#detail_result'+event.target.id).text(detail_data);
	 	$('#name_f_class'+event.target.id).text(value_div); 
     	$.post( "system/ajax_class_update.php", { 'choices[]': [ event.target.id,name_ca,detail_data ]} );
		$("#input_name_f_class"+event.target.id).val();
		var data_for_result = 'id_data='+event.target.id;
		$.ajax({
			url: 'system/result_data_affter_update_class.php',
			type: 'POST',
			dataType: 'json',
			data: data_for_result,
			success:function(data_for_resultde){
				//console.log(data_for_resultde);
				var result_name = data_for_resultde[1];
				var result_date = data_for_resultde[2];
				var result_detail = data_for_resultde[3];
				$('#_date_refeste'+event.target.id).text(result_date); 
				//detail_data_edit
			},
		})
    });
    $("[name='_delete_text']").click(function(event) {
		$("#input_name_f_class"+event.target.id).val("");
    });
	$("[name='delete_button']").click(function(event) {
	var element_id = event.target.id.split("-");
    $.confirm({
        text: "คุณแน่ใจว่าต้องการลบคลาสนี้",
        confirm: function(button) {
            //alert(element_id[1]);
             $.post( "system/delete_class.php", { 'command': element_id[1] } );
             location.reload();
             //$("#refesh_from").load(location.href+" #refesh_from>*","");
        },
        cancel: function(button) {
            //alert("You cancelled.");
        }
	    });
	});
	    $("#ad_class_").click(function(event) {
    	var id_thisss = randomIntFromInterval(0,9999);
    	
    	$.post( "system/add_new_class.php", { 'Class_name': "Class_name" } );
    	//$("#talble_data_").append("<tr id='"+id_thisss+"'><td>xx</td><td>xx</td><td>xx</td><td>xx</td><td>xx</td><td>xx</td><td>xx</td></tr>");
    	location.reload();
    	//$("#refesh_from").load(location.href+" #refesh_from>*","");
    	
    });
  /* $(".btn-danger").click(function(event) {
     	//alert(event.target.id);
     	
     	//alert(name_ca);
    });*/
});

</script>
<div class="row" id="refesh_from">
<div class="col-xs-12 col-md-12">
 <div class="well with-header with-footer">
     <div class="header bg-blue">
         รายละเอียดชั้นเรียน  
     </div>
    	<a class="btn btn-default blue" id="ad_class_" ><i class="fa fa-plus"></i> Add</a>
		     <table class="table table-hover table-striped table-bordered" >
		         <thead class="bordered-blueberry">
		             <tr>
		                 <th>
		                     #
		                 </th>
		                 <th width="20%">
		                     ระดับชั้น
		                 </th>
		                 <th>
		                     จำนวนผู้เรียน
		                 </th>
		                 <th>
		                     จำนวนบทเรียน
		                 </th>
		                  <th>
		                     วันแก้ไขล่าสุด
		                 </th>
		                 <th>
		                     คำอธิบาย
		                 </th>
		                 <th>
		                 	แก้ไข
		                 </th>
		             </tr>
		         </thead>
		         <tbody id="talble_data_">
		          <?php
		             $query_class=mysql_query("SELECT * FROM class ORDER BY c_name ASC");
		             $num_co=0;
		             while ($class_array=mysql_fetch_array($query_class)) {
		             	$num_co++;
		             ?>
		             <tr>
		                 <td>
		                    <span class="label label-blue"><?=$num_co?></span>
		                 </td>
		                 <td>
		                     <label id="name_f_class<?=$class_array['c_id'];?>"><?=$class_array['c_name'];?></label>
		                     
		                     <span style=" display: none "  class="input-icon icon-right inverted" id="_input_name_class<?=$class_array['c_id'];?>">							
		                     <input type="text" class="form-control input-sm" id="input_name_f_class<?=$class_array['c_id'];?>" value="<?=$class_array['c_name'];?>">
		                     <i class="fa fa-times bg-blue" name="_delete_text" id="<?=$class_array['c_id'];?>"></i>
		                     </span>
		                 </td>
		                 <td>
		                     Jobs
		                 </td>
		                 <td>
		                     xx
		                 </td>
		                 <td>
		                 	  <label id="_date_refeste<?=$class_array['c_id'];?>"><?=$class_array['c_date'];?></label>	
		               		  
		                 </td>
		                 <td>
		                 	 <label id="detail_result<?=$class_array['c_id'];?>"><?=$class_array['c_detail'];?></label>
		                 	 	<textarea id="detail_data_edit<?=$class_array['c_id'];?>" style="display: none"><?=$class_array['c_detail'];?>
		                 	 	</textarea>
		                 </td>
		                 <td>
							<span id="_edit_name_class<?=$class_array['c_id'];?>">
		                 	<a id="<?=$class_array['c_id'];?>"class="btn btn-azure">Edit</a>
							</span>
							<span id="_sumit_name_class<?=$class_array['c_id'];?>" style="display:none">
							<a id="<?=$class_array['c_id'];?>"class="btn btn-palegreen" name="save_data">Save</a>
							</span>
							<button name="delete_button" class="btn btn-yellow" id="delete_button_id-<?=$class_array['c_id'];?>"> <i class="fa fa-times"></i> Delete</button>
		                 </td>
		             </tr>
		              <?php
		            		 }
		                 ?>
		         </tbody>
		     </table>

     <div class="footer">
         <code>***หากลบคลาส บทเรียนที่อยู่ในคลาสจะถูกลบไปด้วย***</code>
     </div>
 </div>
                        </div>
</div>