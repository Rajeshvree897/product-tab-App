<?php
include 'header.php';
include 'header_script.php';
?>

<div class="row">
  	<div class="col">
	    <div class="mx-auto">
	      	<div class="copy-code-main">
	      		<div class="container copy-code-content">
	      			<div class="copy-code-head">
								<nav class="navbar navbar-expand-md navbar-light bg-light">
				          <a class="navbar-brand nv-heading" href="admin_dashboard.php?shop=<?php echo $shop; ?>">
				            <button type="button" class="bck-btn btn btn-default" aria-label="Left Align">
				               <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				            </button>
				            Copy code for using tab
				          </a>
				          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				            <span class="navbar-toggler-icon"></span>
				          </button>
		        		</nav>
							</div>
							<hr>
							<div class="full-copy-content-section">
								<div class="copy-con-inner-div">
									<div class="main-row-cd">
										<div class="row col-md-12 code-section">
											<div class="col-md-6 ">
													<div class="copy-code-scr">
														<p>Copy the following code snippet to your clipboard:</p>
														<div class="txtarea-section">
															<textarea class="ui-cd form-control" id="copy_html" readonly="">
															<link rel="stylesheet" href="{{ 'product-tab-app-style.css' | asset_url }}">
																<script src="{{ 'product-tab-app-script.js' | asset_url }}" defer="defer"></script>
																<div class="front-tabs">

																	<div id="tab_nav_ul">
																	  
																	</div>
																	<div id="tabs_data_content">
																	  
																	</div>
																</div>
														</textarea>
														</div>
														
													</div>
														<p>
									            Create a snippet file<code class="ui-code ">dynamic-product-content.liquid</code> and Paste  here in your file.
									          </p>
													<button class="copy-btn btn btn-secondary" onclick="copyToClipboard('copy_html')">Copy</button>
											</div>
											<div class="col-md-6">
												<img src="assets/images/tabliquidfile.png" class="ins-img" onClick="view('assets/images/tabliquidfile.png');">
											</div>
										</div>
									</div>
									<div class="main-row-cd">
										<div class="row col-md-12 code-section">
											<div class="col-md-6">
												<div class="copy-code-scr">
													<p>Copy the following js code to your clipboard:</p>
													<div class="txtarea-section">
														<textarea class="ui-cd form-control" id="copy_js" readonly="" >
															function getTabContent(evt, tabName) {
															  let i, tabcontent, tablinks;
															  tabcontent = document.getElementsByClassName("tabcontent");
															  for (i = 0; i < tabcontent.length; i++) {
															    tabcontent[i].style.display = "none";
															  }
															  tablinks = document.getElementsByClassName("tablinks");
															  for (i = 0; i < tablinks.length; i++) {
															    tablinks[i].className = tablinks[i].className.replace(" active", "");
															  }
															  document.getElementById(tabName).style.display = "block";
															    evt.currentTarget.className += "active";

															}
															  let dataToSend = {
															    'shop': window.location.hostname
															    };
																fetch("https://appsworld.website/sapp/t1/product_tab_app/api.php", {
															    method: 'post',
															    body: JSON.stringify(dataToSend)
															  })
															  .then(function (response) {
															    return response.text();
															  })
															  .then(function (text) {
															    const parsedKey = JSON.parse(text);
															    const tabs = parsedKey.tabs_html;
															    const tabs_content = parsedKey.tabs_content_html;
															    const vertical_status  = parsedKey.vertical_status;
															    const tab_width        = parsedKey.tab_width;
															    document.getElementById("tab_nav_ul").innerHTML += tabs;
															    document.getElementById("tabs_data_content").innerHTML += tabs_content;
															    if(vertical_status == '1'){
															          document.getElementById('tab_nav_ul').style.float = "left";   
															          document.getElementById('tab_nav_ul').style.width = tab_width+'px';

															    }    
															  })
															  .catch(function (error) {
															    console.log(error)
															  });
														</textarea>
													</div>
												</div>
												<p>
								            Create a assets file to name <code class="ui-code ">product-tab-app-script.js</code>and Paste here.
								        </p><button class="copy-btn btn btn-secondary" onclick="copyToClipboard('copy_js')"><!-- <i class="glyphicon glyphicon-ok">Copy</i> -->Copy</button>
											</div>
											<div class="col-md-6">
												<img src="assets/images/scriptfile.png" class="ins-img" onClick="view('assets/images/scriptfile.png');">
											</div>
										</div>
									</div>
									<div class="main-row-cd">
										<div class="row col-md-12 code-section">
											<div class="col-md-6">
													<div class="copy-code-scr">
														<p>Copy the following style code  to your clipboard:</p>
														<div class="txtarea-section">
															<textarea class="ui-cd form-control" id="copy_style" readonly="">
																	/* Style the tab */
																	#tab_nav_ul {
																	  overflow: hidden;
																	  /*border: 1px solid #ccc;
																	  background-color: #f1f1f1;*/
																	}

																	/* Style the buttons inside the tab */
																	#tab_nav_ul button {
																	  background-color: inherit;
																	  float: left;
																	  border: none;
																	  outline: none;
																	  cursor: pointer;
																	  padding: 14px 16px;
																	  transition: 0.3s;
																	  font-size: 17px;
																	}

																	/* Change background color of buttons on hover */
																	#tab_nav_ul button:hover {
																	  background-color: #ddd;
																	}

																	/* Create an active/current tablink class */

																	#tab_nav_ul button.active {
																	  background-color: #ccc !important;
																	}

																	/* Style the tab content */
																	.tabcontent {
																	  display: none;
																	  padding: 6px 12px;
																	  border: 1px solid #ccc;
																	  border-top: none;
																	}
																	.front-tabs{
																	  margin: auto;
																	  width: 48%
																	}

																
															</textarea>
														</div>
													</div>
													<p>
									            Create a assets file to name <code class="ui-code ">product-tab-app-style.css</code>and Paste here.
									        </p><button class="copy-btn btn btn-secondary" onclick="copyToClipboard('copy_style')">Copy</button>
											</div>
											<div class="col-md-6 ">
												<img src="assets/images/sylefileimg.png" class="ins-img" onClick="view('assets/images/sylefileimg.png');">	
											</div>
						      	</div>	
						      </div>
						      <div class="main-row-cd">
						      	<div class="row col-md-12 code-section">
											<div class="col-md-6">
													<div class="copy-code-scr">
														<p>Copy the following style code  to your clipboard:</p>
														<div class="txtarea-section">
															<textarea class="ui-cd form-control" id="copy_include" readonly="">
																	{% render 'dynamic-product-content.liquid' %}
															</textarea>
														</div>
													</div>
													<p>
									           Add this code where you want to add tabs.
									        </p><button class="copy-btn btn btn-secondary" onclick="copyToClipboard('copy_include')">Copy</button>
											</div>
											<div class="col-md-6 ">
												<img src="assets/images/add_code.png" class="ins-img" onClick="view('assets/images/add_code.png');">	
											</div>
						      	</div>	
						      </div>
						    </div>
						  </div>
						  <div class="app-support">
						  	<div class="app-inner-support">
						  		<div class="main-row-cd">
										<div class="row col-md-12 code-section">
											<span><b>Still facing problem in installing App.</b></span>
											<div class="col-md-6 ">
												
												<div class="support-info">	
												<p>Contact us at <a href="">himanshu@techinfini.com</a> or uisng the form, we'll reach back to tou as soon as possible.</p>	
												</div>
												
											</div>
											<div class="col-md-6">
												<form method="post">
													<input type="text" name="shop" class="form-control d-none" id ='store_shop' value="<?php echo  $shop ?>">
													  <div class="form-group">
													    <label for="user_email">Your email</label>
													    <input type="email" class="form-control" id="user_email"  placeholder="Enter email">
													  </div>
													  <div class="form-group">
													    <label for="your_message">Message</label>
													    <textarea class="form-control" id="your_message"></textarea>
													  </div>
													  <button type="submit" id="support_request" class="btn btn-success form-control" style="background: rgb(0 128 96);">Request Support</button>
												</form>
											</div>
										</div>
									</div>	
						  	</div>
						  </div>
						</div>
					</div>
			</div>
		</div>
</div>
<script type="text/javascript">
//support request
$(document).on("click",'#support_request',function (e){
        	
	let user_email = $('#user_email').val();
	let your_message = $('#your_message').val();
	let store_shop = $('#store_shop').val()
	var payload = JSON.stringify({
		
			user_email     : user_email,
			your_message : your_message,
			store_shop   : store_shop
		
	});
	$.ajax({
        type: 'POST',
        data:{data : payload },
        url: 'support_request.php',
        success: function(data) {
           alert(data);
        }
	});
});
	
function copyToClipboard(elementId) {

   	let v = $("#"+elementId).select();
    document.execCommand('copy');
}	
function view(imgsrc) {
      viewwin = window.open(imgsrc,'viewwin'); 
   }
</script>