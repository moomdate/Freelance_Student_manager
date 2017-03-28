<script type="text/javascript">
    function preview_pdf(even) {
      var _file_name = event.target.id;
      
    window.open("Files/" + _file_name, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=500,width=500,height=680");
    }
	$(document).ready(function($) {
    $("#select_show").change(function(event) {
       //alert(event.target.value);
      // window.location.href = "http://" + event.target.value;
       $(location).attr('href', event.target.value);

    });
    $("[name='delete_button']").click(function(event) {
    var element_id = event.target.id.split("-");
      $.confirm({
          text: "คุณแน่ใจว่าต้องการลบบทเรียนนี้",
          confirm: function(button) {
               //alert(element_id[1]);
               $.post( "system/delete_lesson.php", { 'command': element_id[1] } );
               location.reload();
               //$("#refesh_from").load(location.href+" #refesh_from>*","");
          },
          cancel: function(button) {
              //alert("You cancelled.");
          }
        });
    });
    $("form#files").submit(function(){

    var formData = new FormData($(this)[0]);
    var id_class = $("#class_select option:selected" ).val();
    var name_in = $("#nameInput").val();
    var file_input = $("#file_input").val();
    var detail_data = $("#detail_up").val();
        if(name_in==""){
          $("#nameInput_div").addClass('has-feedback has-error');
          $("#nameInput").focus();
          $("#span_error").show();
          $("#ad_text_error").text('กรุณาใส่ชื่อไฟล์');
        }else if(file_input==""){span_error
          $("#file_div").addClass('has-feedback has-error');
          $("#file_input").focus();
          $("#span_error").show();
          $("#ad_text_error").text('กรุณาเลือกไฟล์เอกสาร');
        }
        else{
            $.ajax({
              url: 'system/upload_file.php',
              type: 'POST',
              data: formData,
              beforeSend:function(){
                $("#loadinggg_gif").show();
              },
              async: false,
              success: function (data) {
               // 
                //
                  if(data){
                         var parsedData = JSON.parse(data);
                         var file_name = parsedData.image.name;
                         var file_size = parsedData.image.size;
                         var data2 = "id=" + id_class + "&file_name=" + file_name + "&size=" + file_size + "&name=" + name_in + "&detail=" + detail_data;
                      
                      console.log(data);
                      $.ajax({
                          url: 'system/upload_file_sql.php',
                          type: 'POST',
                          dataType: 'json',
                          data: data2,
                          success:function(data_for_resultde){
                           $("#loadinggg_gif").hide();
                           $("#register_from").modal('toggle');
                           location.reload();
                           //$("#refesh_div").load(location.href+" #refesh_div>*","");
                          },
                        })
                  }
              },
             
              cache: false,
              contentType: false,
              processData: false
          });
        }
    //$.post( "system/ajax_class_update.php", { 'choices[]': [ 1,2,3 ]} );
    return false;

    });

  });
</script>
<div class="row">
	<div class="col-xs-12 col-md-12">
  <div class="well with-header  with-footer">
      <div class="header bg-orange">
          บทเรียน/เอกสารเรียน
      </div>

      <!-- Modal -->
    <div class="modal fade modal-darkorange in" id="register_from" tabindex="-1" role="dialog" aria-labelledby="register_from">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">เพิ่มบทเรียน</h4>
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
                        <form id="files" method="post" enctype="multipart/form-data">
                             <div class="form-title">
                               
                             </div>
                             <div class="form-group" id="nameInput_div"><h6>ชื่อบทเรียน</h6>
                                 <span class="input-icon icon-right">
                                     <input type="text" class="form-control" id="nameInput" placeholder="Lesson name">
                                     <i class="glyphicon glyphicon-user circular"></i>
                                 </span>
                             </div>
                             <div class="form-group" id="file_div"><h6>เอกสารสำหรับบทเรียน</h6>
                                 <label class="input-icon icon-right">
                                     <input type="file" class="form-control "accept="application/pdf" id="file_input" name="image" placeholder="Name lastname">
                                  </label>
                             </div>
                             <div class="form-group" id="detail_div">
                                <label>เลือกคลาส:
                                   <select class="selectpicker" id="class_select">
                                  <?php
                                  $__query_class=mysql_query("SELECT * FROM class order by c_name asc");
                                   while ($_que_slec_=mysql_fetch_array($__query_class)) {
                                    echo "<option value='".$_que_slec_['c_id']."'>".$_que_slec_['c_name']."</option>";
                                   }
                                   ?>
                                  
                                   </select>
                                </label>
                             </div>
                             <div class="form-group" id="confirmPasswordInput_div">
                                 <span class="input-icon icon-right"><h6>รายละเอียด</h6>
                                     <textarea class="form-control" rows="3" id="detail_up" placeholder="Default Text">
                                       
                                     </textarea>
                                 </span>
                             </div>
                         
                           <div align="center" style="display: none" id="loadinggg_gif">
                            <img src="image/loading/ajax-loader.gif">
                           </div>
                           <div class="alert alert-danger fade in" style="display: none" id="span_error">
                               <button class="close" name="close_alert" id="alert_close">
                                   ×
                               </button>
                               <i class="fa-fw fa fa-times"></i>
                               <strong>Error!</strong> <span><label id="ad_text_error"></label> </span>
                           </div>
                     </div>
                 </div>
             </div>   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="clear_data">Clear</button>
            <button class="btn btn-success" id="submit_data">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

     <a class="btn btn-default orange" id="ad_user_" data-toggle="modal" data-target="#register_from"><i class="fa fa-plus"></i> Add</a>
          <?php
            if(isset($_GET['selector'])){
              $_slec_idGGG = $_GET['selector'];
              $page_allcc=("SELECT * FROM lesson JOIN class ON class.c_id = lesson.c_id WHERE class.c_id = $_slec_idGGG ");
            }else{
                $page_allcc=("SELECT * FROM lesson JOIN class ON class.c_id = lesson.c_id");
            }
            if($sql_query_all=mysql_query($page_allcc)){
              $page_allcc2=mysql_num_rows($sql_query_all);
            }else{
              $page_allcc2=0;
            }
          ?>
          <label>แสดง:
            <select class="selectpicker" id="select_show">
              <option value="?comm=main&sub=manage&manage=lesson&page=1">ทั้งหมด</option>
              <optgroup label="เลือกคลาส">
              <?php
              $__query_class=mysql_query("SELECT * FROM class order by c_name asc");
              while ($data_class_array=mysql_fetch_array($__query_class)) {
              ?>
              <option 
              <?php
              if(isset($_GET['selector'])){
                if($_GET['selector']==$data_class_array['c_id'])
                    echo "selected";
              }
              ?>
              value="?comm=main&sub=manage&manage=lesson&page=1&selector=<?=$data_class_array['c_id']?>"><?=$data_class_array['c_name']?></option>
              <?php
              }
              ?>
            </optgroup>
           </select>
           <label class="label label-blue"><?=$page_allcc2?> รายการ</label>
          </label>
        
      <table class="table table-hover"  id="refesh_div">
          <thead class="bordered-darkorange">
              <tr>
                  <th>
                      #
                  </th>
                  <th>
                      Name
                  </th>
                  <th>
                      Class_name
                  </th>
                  <th>
                      File
                  </th>
                  <th>
                      File size
                  </th>
                  <th>
                      Up
                  </th>
                  <th>

                      Update
                  </th>
                   <th>
                      Number of Students
                  </th>
                   <th>
                      Edit
                  </th>
              </tr>
          </thead>
          <tbody>
          <?php
            error_reporting(0);
            $page_limit = 10;
            if(isset($_GET['selector'])){
              $_slec_id = $_GET['selector'];
              $page_all=mysql_query("SELECT count(les_id) FROM lesson JOIN class ON class.c_id = lesson.c_id WHERE c_id = $_slec_id ");
            }else{
              $page_all=mysql_query("SELECT count(les_id) FROM lesson JOIN class ON class.c_id = lesson.c_id");
            }
            $page_all_2 = mysql_result($page_all);
            $pages = ceil(mysql_result($page_all, 0)/$page_limit);
            //echo($pages);
            if(!isset($_GET['page'])){
            	//header("location:?comm=main&sub=manage&manage=lesson&page=1");
            	$page_g = 1;
            	//echo "<meta http-equiv='refresh' content='0;url=http://?comm=main&sub=manage&manage=lesson&page=1'>";
            }else{
            	if($_GET['page']>$pages){
                $page_g = 1;
              }else{
                $page_g = $_GET['page'];
              }
            }
            $start_page = (($page_g-1)*$page_limit);
            if(isset($_GET['selector'])){
              $_slec_id = $_GET['selector'];
             $que_ry_less=mysql_query("SELECT * FROM lesson INNER JOIN class ON class.c_id = lesson.c_id WHERE lesson.c_id = $_slec_id LIMIT $start_page,$page_limit ");
            }else{
             $que_ry_less=mysql_query("SELECT * FROM lesson JOIN class ON class.c_id = lesson.c_id LIMIT $start_page,$page_limit");
            }
            //echo $_wher_query;
          	//$que_ry_less=mysql_query("SELECT * FROM lesson LIMIT $start_page,$page_limit");
          	while($data_arry=mysql_fetch_array($que_ry_less)) {
          ?>
              <tr>
                  <td>
                      1
                  </td>
                  <td> 
                      <a href="javascript:void(0);"  data-container="body" data-titleclass="bordered-darkorange" data-class="dark" data-toggle="popover-hover" data-placement="right" data-title="Hover" data-content="<?=$data_arry['les_detail']?>" data-original-title="" title="Detail" aria-describedby="popover303629"><?=$data_arry['les_name']?>
                      </a>
                  </td>
                  <td>
                      <?=$data_arry['c_name']?>
                  </td>
                  <td>
                       <i class="fa fa-object-group" id="<?=$data_arry['les_file']?>" aria-hidden="true" onclick="preview_pdf()"></i>
<a href="Files/<?=$data_arry['les_file']?>" target="_blank" ><?=$data_arry['les_file']?></a>
                  </td>
                  <td>
                      <?php 
                      printf("%.2f Kb",($data_arry['les_f_size'])/1024);
                      ?>
                  </td>
                  <td>
                      <?php 
                      $date_up2 = explode(" ", $data_arry['les_date_up']);
                      echo $date_up2[0];
                      ?>
                  </td>
                  <td>
                      <?php 
                      $date_up2 = explode(" ", $data_arry['les_date_up']);
                      echo $date_up2[0];
                      ?>
                  </td>
                  <td>
                      steve
                  </td>
                  <td>
                      <button name="delete_button" class="btn btn-yellow" id="delete_button_id-<?=$data_arry['les_id'];?>"> <i class="fa fa-times"></i> Delete</button>
                  </td>
              </tr>
              <?php
         		 }
                if($page_allcc2==0)
                {
              ?>
               <label class="label label-danger">ไม่มีบทเรียนในคลาสนี้</label>
              <?php 
                }
              ?>
          </tbody>
      </table>

      <div class="footer">
         <div class="col-xs-12 col-md-offset-4">
  			 	<ul class="pagination pagination-sm ">
		           <?php 
               $page_button_end = 4;
               $page_button_start = 4;
               if($page_g+$page_button_end>=$pages){
                  $show_scoll = $pages-$page_g;
               }else{
                  $show_scoll = $page_button_end;
               }

               if($page_g>$page_button_start){
                  $show_scoll_f = $page_g-$page_button_start;
               }else{
                  $show_scoll_f = 1;
               }
               if(isset($_GET['selector'])){
                $selec_url = "&selector=".$_GET['selector'];
               }else{
                 $selec_url= "";
               }
               //echo $selec_url;
               if($page_g-$page_button_start>1){
                       echo "<li><a href='?comm=main&sub=manage&manage=lesson&page=$paging''><<1</a></li>";
               }
               for($paging=$show_scoll_f;$paging<=$page_g+$show_scoll;$paging++){
		           		if($page_g+5>$paging){
		           			 if($paging==$page_g){
			           		 	echo "<li class='active'><a href='?comm=main&sub=manage&manage=lesson&page=$paging$selec_url''>$paging</a></li>";
			           		 }else{
			           		 	echo "<li><a href='?comm=main&sub=manage&manage=lesson&page=$paging$selec_url''>$paging</a></li>";
			           		 }
		           		}
		       		}
              if($page_g+$page_button_end<$pages){
                       echo "<li><a href='?comm=main&sub=manage&manage=lesson&page=$pages$selec_url''>$pages>></a></li>";
              }
		           ?>
		       </ul>
		 </div>
      </div>
  </div>
 </div>
               
</div>
