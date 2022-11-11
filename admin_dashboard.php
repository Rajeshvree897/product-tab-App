<?php
$page = 'admin_dashboard';
include 'header.php';
include 'header_script.php';
$fetch_record 		= "SELECT * FROM product_tabs WHERE shop = '".$shop."'";
$result 			= $conn->query($fetch_record);
$row 				= $result->fetch_assoc();
if (!empty($row)) {
	$tab_json              = json_decode($row['tabs_json']);
	$tabs_content_json     = json_decode($row['tabs_content_json']);
}
?>
<div class="row">
  <div class="col">
    <div class="mx-auto main-design-block p-3 text-center">
				<nav class="navbar navbar-expand-md navbar-light bg-light">
				  <a class="navbar-brand nv-heading" href="admin_dashboard.php?shop=<?php echo $shop; ?>">
				  	<!-- <button type="button bck-btn" class="btn btn-default" aria-label="Left Align">
							 <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
						</button> -->
						Create Tabs
				  </a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">
				    <ul class="nav navbar-nav navbar-right">
				      <li class="nav-item">
				      	<a href="style_setting.php?shop=<?php echo $shop; ?>">
				        <button class="btn btn-success go_to_style" style="background: rgb(0 128 96);">Go to Style</button></a>   
				      </li>
				    </ul>
				  </div>  
				</nav>
		</div>
	</div>
</div>
<div class="row">
  <div class="col">
    <div class="mx-auto main-design-block">
    	<div class="top-bnr jumbotron">
    		<div class="container">
    			<p>
    				If app is not working in case 
    				<span>
    					<a href="copy-code.php?shop=<?php echo $shop; ?>"><button class="btn btn-success" style="background: rgb(0 128 96);"> click here</button></a>
    				</span>
    			</p>
    	</div>
    	</div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="mx-auto main-design-block p-3 ">
      <div class="add_tabs">
				<div id="dy_product_tabs">
					<input type="text" name="shop" class="form-control d-none" id ='store_shop' value="<?php echo  $shop ?>">
					<?php 	if(!empty($row) && count($tab_json != 0)){

								for($tab_input = 0; $tab_input<count($tab_json); $tab_input++){
				                    $count_tb = $tab_input+1;
				    ?>
									<div class="form-group mx-sm-3 mb-2 dy_product_tab_div" >
									<label>Tab title</label>
									<input type="text" name="" class="form-control default_tab_cl" id ='tab_input_<?php echo $count_tb; ?>' data-id ='<?php echo $count_tb; ?>' value ="<?php echo $tab_json[$tab_input]; ?>"
									>
									</div>
					<?php 		}
							}else{?>
							<div class="form-group mx-sm-3 mb-2 dy_product_tab_div">
							<label>Tab title</label>
							<input type="text" name="" class="form-control default_tab_cl" id ='tab_input_1' data-id =1>
							</div>
							<div class="form-group mx-sm-3 mb-2 dy_product_tab_div">
							<label>Tab title</label>
							<input type="text" name="" class="form-control default_tab_cl" id ='tab_input_2' data-id =2>
							</div>
							<div class="form-group mx-sm-3 mb-2 dy_product_tab_div">
							<label>Tab title</label>
							<input type="text" name="" class="form-control default_tab_cl" id ='tab_input_3' data-id =3>
							</div>
					<?php 	}
					?>
				</div>
				<br>
				<div class="tab_quantity form-group mx-sm-3 mb-2">
					<label> Number of tabs</label>
				  <input type="number" id="quantity" name="quantity" placeholder="Number of tabs"
				    value="<?php if(count($tab_json) != 0){ echo count($tab_json);}else{ echo '3';} ?>">
				</div>
			</div>
    </div>
  </div>
</div>	
<div class="row">
	<div class="col">
    <div class="mx-auto main-design-block p-3 text-center">
    	<div class="prv-card">
	    	<div class="mx-sm-3 mb-2 design-hd"><span style="color: #000; margin-right: 85% !important;" class="form-group">Preview</span></div>
				<div id="add_dynamic_tabs" class="">
					<ul class="nav nav-tabs" id="tab_nav_ul">
					<?php  	if(count($tab_json) != 0){
								for($tabs = 0; $tabs<count($tab_json); $tabs++){
				            $count_tb = $tabs+1;
			               if($count_tb == '1'){
			                  $add_class = 'active';
			                }else{
			                  $add_class = '';
			                }
				    ?>
				                  	<li class="<?php echo $add_class; ?>"><a data-toggle="tab" href="#tab_nav_<?php echo $count_tb;?>" id="tab_<?php echo $count_tb;?>"><?php echo $tab_json[$tabs];?></a>
				                  	</li>
		            <?php 		} 
		            		}else{
		           	?>
						    <li><a data-toggle="tab" href="#tab_nav_1" id="tab_1"></a></li>
						    <li><a data-toggle="tab" href="#tab_nav_2" id="tab_2"></a></li>
						    <li><a data-toggle="tab" href="#tab_nav_3" id="tab_3"></a></li>
					<?php   }
					?>
					</ul>
					<div class="tab-content" id="tabs_preview_content">
					<?php if(count($tabs_content_json) !=0){
							for($tab_content = 0; $tab_content<count($tabs_content_json); $tab_content++){
			               $count_tb = $tab_content+1;
			               if($count_tb == '1'){
		                      $add_class = 'active';
		                  }else{
		                      $add_class = '';
		                  }
			        ?>
				              <div id="tab_nav_<?php echo $count_tb;?>" class="tabs_content_area tab-pane fade in <?php echo $add_class; ?>">
				                <textarea style="width: 100%; height:200px;" id="tab_txt_con_<?php echo $count_tb; ?>"><?php echo $tabs_content_json[$tab_content]; ?></textarea> 
				              </div>
			        <?php 	} 
			    		  }else{?>
					    <div id="tab_nav_1" class="tab-pane fade in active">
								<textarea id="tab_txt_con_1" style="width: 100%; height:200px">1</textarea>	
					    </div>
					    <div id="tab_nav_2" class="tab-pane fade">
								<textarea id="tab_txt_con_2" style="width: 100%; height:200px">2</textarea>	
								
					    </div>
					    <div id="tab_nav_3" class="tab-pane fade">
								<textarea id="tab_txt_con_3" style="width: 100%; height:200px">3</textarea>	
					    </div>
					<?php } ?>
				  	</div>
					
				  <div class="btn-sv-tb">
						<button class="btn btn-success save_tab" id="tabs_save_btn" style="background: rgb(0 128 96);">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<?php
include 'footer.php';
mysqli_close($conn);

?>

<script type="text/javascript">

//add tabs inputs
  $(document).on("change",'#quantity',function (e){   
     e.preventDefault();
     let dy_product_tab_div = $('.dy_product_tab_div').length;
    let currentValue = $(this).val();
    if(dy_product_tab_div < currentValue){
    	let add_tab =  (currentValue - dy_product_tab_div);
    	let tab_count  = dy_product_tab_div ;
    	for(let tab = 1; tab<= add_tab; tab++){
	    		tab_count = tab_count + 1;
		    	let product_tab_input_html = "";
				product_tab_input_html += '<div class="form-group mx-sm-3 mb-2 dy_product_tab_div">';
				product_tab_input_html += '<label>Tab title</label>';
				product_tab_input_html +=	'<input type="text" name="" class="form-control default_tab_cl" id ="tab_input_'+tab_count+'" data-id='+tab_count+'></div>';
				//tab input html append on form
				$("#dy_product_tabs").append(product_tab_input_html);
				//tab navs add
				let product_tab_nav     = "";
				let product_tab_nav_con = '';
				product_tab_nav += '<li>';
			    product_tab_nav += '<a data-toggle="tab" href="#tab_nav_'+tab_count+'" id="tab_'+tab_count+'"></a></li>';
			    product_tab_nav_con += '<div id="tab_nav_'+tab_count+'" id="tab_'+tab_count+'" class="tab-pane fade">';
			    product_tab_nav_con +='<textarea style="width: 48%; height:200px" id="tab_txt_con_'+tab_count+'"></textarea>		</div>';
			    $("#tab_nav_ul").append(product_tab_nav);
			   	$("#tabs_preview_content").append(product_tab_nav_con);
				tab_count+1;
	    
    	}
    }else{
    	if (dy_product_tab_div > currentValue) {
    		let remove_tab = dy_product_tab_div - currentValue;
    		for(let tab = 1; tab <= remove_tab; tab++){
    			$('#dy_product_tabs').children().last().remove();
    			$('#tab_nav_ul').children().last().remove();
    			$('#tabs_preview_content').children().last().remove();

	    		//$('#tab_input_'+tab).closest('.dy_product_tab_div').remove();	 
		    	
		    }
    	}
    }   
  });
	//append tab title text on preview section.
      $(document).on('keyup','.default_tab_cl', function() {
         let input_dataId = $(this).attr("data-id");
         let currentText = $('#tab_input_'+input_dataId).val();
         $("#tab_"+input_dataId).text(currentText);
      });
      //tabs save 
        $(document).on("click",'#tabs_save_btn',function (e){
        	let no_of_tab_div = $('.dy_product_tab_div').length;
        	let tab_arr = [];
        	let tab_content_arr = [];
        	for(let tabs = 1; tabs <= no_of_tab_div; tabs++){
        		let tab_name = $('#tab_input_'+tabs).val();
        		let tab_content = $('#tab_txt_con_'+tabs).val();
        		if (tab_name == '') {
        			alert('Please add tab name before save.');
        			break;
        		}else{
        			tab_arr.push(tab_name);
        			tab_content_arr.push(tab_content);

        		}
        	}
        	

        	if (tab_arr.length != 0){
        		let store_shop  = $('#store_shop').val();
        		/*let tab_json     = JSON.stringify(tab_arr);
        		let tab_con_json = JSON.stringify(tab_content_arr);*/
        		var payload = JSON.stringify({
        			
	        			tab_json     : tab_arr,
	        			tab_con_json : tab_content_arr,
	        			store_shop   : store_shop
	        		
        		});
	        	$.ajax({
			            type: 'POST',
			            data:{tabs_data : payload },
			            url: 'tabs_save.php',
			            success: function(data) {
			               alert(data);
			            }
				});
	    	}
        });

        //for text editor
        $(document).ready(function(){
					$('.tabs_content_area textarea').trumbowyg();   
			});
</script>
