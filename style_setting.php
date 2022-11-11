<?php
include 'header.php';
include 'header_script.php';
$fetch_record = "SELECT * FROM product_tabs WHERE shop = '".$shop."'";
$result       = $conn->query($fetch_record);
$row          = $result->fetch_assoc();
$tab_json     = json_decode($row['tabs_json']);
$tabs_content_json     = json_decode($row['tabs_content_json']);
$tab_design_json       = json_decode($row['tab_design_json'], true);

?>
<div class="row">
  <div class="col">
    <div class="mx-auto main-design-block p-3 text-center">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
          <a class="navbar-brand nv-heading" href="admin_dashboard.php?shop=<?php echo $shop; ?>">
            <button type="button" class="bck-btn btn btn-default" aria-label="Left Align">
               <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            </button>
            Create Tabs
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item">
                <a href="admin_dashboard.php?shop=<?php echo $shop; ?>">
                <button class="btn btn-success go_to_style" style="background: rgb(0 128 96);">Tab Settings</button></a>   
              </li>
            </ul>
          </div>  
        </nav>
    </div>
  </div>
</div>

 <div class="row">
    <div class="col">
      <div class="mx-auto main-design-block p-3 text-center">
        <div class="style-pg">
          <div class="product-tab-settings">
            <div class="tabs ">
              <ul class="nav nav-tabs style_setting_nav1" id="">
                <li class="active"><a data-toggle="tab" href="#tab_design" id="" >Tab design</a></li>
                <li><a data-toggle="tab" href="#content_design" id="">Content design</a></li>
                <li><a data-toggle="tab" href="#border_design" id="">Border</a></li>
              </ul>
              <div class="tab-content" id="tabs_preview_content">
                <div id="tab_design" class="tab-pane fade in active">
                  <form>
                      <input type="text" name="" id="shop_store" value="<?php echo$shop ?>">
                    <div class="main-design-tab col-md-12">
                      <div class="tab-layout tab-lay-mains col-md-4">
                        <div class="design-hd">Tab layout</div>
                          <div class="btn-group tab-lay-btn">
                            <a href="#" id="list" class="btn btn-default btn-sm horize-rd-at layout-btn" style="<?php if($tab_design_json['tab_layout'] == 'horizontol' || empty($tab_design_json)){ echo 'background-color: rgb(0 128 96)' ; }?>">
                              <label class="tab-ls-1">
                              <input type="radio" name="tab_layout" <?php if($tab_design_json['tab_layout'] == 'horizontol' || empty($tab_design_json)){ echo 'checked' ; }?> value="horizontol" class="tab_layout d-none">Horizontol
                            </label></a>
                            <a href="#" id="grid" class="btn btn-default btn-sm ver-rd-at layout-btn" style="<?php if($tab_design_json['tab_layout'] == 'vertical'){ echo 'background-color: rgb(0 128 96)' ; }?>">
                              <label class="tab-ls-1">
                              <input type="radio" name="tab_layout" value="vertical" class="tab_layout d-none" <?php if($tab_design_json['tab_layout'] == 'vertical'){ echo 'checked' ; } ?>>Vertical
                            </label></a>
                          </div>
                        <!-- <fieldset id="group1">
                          <label class="radio-inline">
                            <input type="radio" name="tab_layout" <?php //if($tab_design_json['tab_layout'] == 'horizontol' || empty($tab_design_json)){ echo 'checked' ; }?> value="horizontol" class="tab_layout">Horizontol
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="tab_layout" value="vertical" class="tab_layout" <?php //if($tab_design_json['tab_layout'] == 'vertical'){ echo 'checked' ; } ?>>Vertical
                          </label>
                        </fieldset> -->
                      </div>
                      <div class="tab-width-style  tab-layout col-md-4">
                        <div class="design-hd">Tab Width style</div>
                        <div class="btn-group">
                            <a href="#" id="list" class="btn btn-default btn-sm auto-rd-at layout-btn" style="<?php if($tab_design_json['tab_width_style'] == 'absolute' || empty($tab_design_json)){ echo 'background-color: rgb(0 128 96)' ; }?>">
                              <label class="tab-ls-1">
                              <input type="radio" name="tab_width" <?php if($tab_design_json['tab_width_style'] == 'absolute' || empty($tab_design_json)){ echo 'checked' ; }?> value="absolute" class="tab_width_style d-none">Automatic
                            </label></a>
                            <a href="#" id="grid" class="btn btn-default btn-sm fixed-rd-at layout-btn" style="<?php if($tab_design_json['tab_width_style'] == 'fixed'){ echo 'background-color: rgb(0 128 96)' ; }?>">
                              <label class="tab-ls-1">
                              <input type="radio" name="tab_width" value="fixed" class="tab_width_style d-none" <?php if($tab_design_json['tab_width_style'] == 'fixed'){ echo 'checked' ; } ?>>fixed
                            </label></a>
                          </div>

                        <!-- <fieldset id="group2">
                          <label class="radio-inline">
                            <input type="radio" name="tab_width" class="tab_width_style" <?php //if($tab_design_json['tab_width_style'] == 'automatic' || empty($tab_design_json)){ echo 'checked' ; }?>checked value="automatic">Automatic
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="tab_width" class="tab_width_style" <?php //if($tab_design_json['tab_width_style'] == 'fixed'){ echo 'checked' ; }?> value="fixed">fixed
                          </label>
                        </fieldset> -->
                      </div>
                      <div class="tab-font-style tab-layout col-md-4">
                        <div class="design-hd">Tab font style</div>
                            <div id="tab_font_editor">
                          <div class="font_editor">
                              <div class="font-txt" style="font-weight: bold;">
                                  <span class="tab-font-bold" value="<?php if(!empty($tab_design_json['tab_font_weight'])){ echo 'bold' ; }?>" style="<?php if(!empty($tab_design_json['tab_font_weight'])){ echo 'color: rgb(0 128 96);' ; }?>"><i class="fa fa-bold"></i></span>
                                  <span class="tab-font-italic" value="<?php if(!empty($tab_design_json['tab_font_style'])){ echo 'italic' ; }?>" style="<?php if(!empty($tab_design_json['tab_font_style'])){ echo 'color: rgb(0 128 96);' ; }?>"><i class="fa fa-italic"></i></span>
                                  <span class="tab-font-underline" value="<?php if(!empty($tab_design_json['tab_font_decoration'])){ echo 'underline' ; }?>" style="<?php if(!empty($tab_design_json['tab_font_decoration'])){ echo 'color: rgb(0 128 96);' ; }?>"><i class="fa fa-underline"></i></span>
                                <select id="tab-fnt-family"> 
                                  <option value="">Style</option>
                                  <option value="Arial">Arial</option>
                                  <option value="Verdana ">Verdana </option>
                                  <option value="Impact ">Impact </option>
                                  <option value="Comic Sans MS">Comic Sans MS</option>
                                </select>
                                  <span class="tab-font-align" id="left" value="
                                  <?php if(!empty($tab_design_json['tab-font-align'])){ echo 'align-left'; }?>">
                                  <i class="fa fa-align-left"></i></span>
                                  <span class="tab-font-align" id="right"  value="
                                  <?php if(!empty($tab_design_json['tab-font-align'])){ echo 'align-right'; }?>"><i class="fa fa-align-right"></i></span>
                                  <span class="tab-font-align" id="center"  value="
                                  <?php if(!empty($tab_design_json['tab-font-align'])){ echo 'align-center'; }?>"><i class="fa fa-align-center"></i></span>
                                  <input type="color" name="" value="<?php if(isset($tab_design_json['tab_txt_color'])){ echo $tab_design_json['tab_txt_color'] ; }?>" id="tab_txt_color">

                              </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="main-design-tab col-md-12">
                      <div class="tab-layout col-md-4">
                          <div class="design-hd">Tab width</div>
                            <fieldset id="group1">
                              <input type="range" id="tab_width_range" name="volume" value="<?php if(isset($tab_design_json['tab_width_range'])){ echo $tab_design_json['tab_width_range'] ; }?>" min="0" max="100">
                            </fieldset>
                      </div>

                      <div class="tab-layout col-md-4">
                          <div class="design-hd">Transition</div>
                              <div>
                                <input type="range" id="tab_transition" name="volume" value="<?php if(isset($tab_design_json['tab_transition'])){ echo $tab_design_json['tab_transition'] ; }?>" min="0" max="10">
                              </div>
                      </div>
                      <div class="tab-layout col-md-4">
                          <div class="design-hd">Tab background color</div>
                            <div>
                              <input type="color" id="tab_bgcolor" name="favcolor" value="<?php if(isset($tab_design_json['tab_bgcolor'])){ echo $tab_design_json['tab_bgcolor'] ; }?>">
                            </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div id="content_design" class="tab-pane fade">
                  <form>
                    <div class="main-design-tab col-md-12">
                      <div class="content-layout col-md-3">
                        <div class="design-hd">Content Font Style</div>

                        <div id="content_font_editor">
                          <div class="font_editor">
                              <div class="font-txt" style="font-weight: bold;">
                                  <span class="content-font-bold" value="<?php if(!empty($tab_design_json['content_font_weight'])){ echo 'bold'; }?>" style="<?php if(!empty($tab_design_json['content_font_weight'])){ echo 'color: rgb(0 128 96);' ; }?>"><i class="fa fa-bold"></i></span>
                                  <span class="content-font-italic" value="<?php if(!empty($tab_design_json['content_font_style'])){ echo 'italic'; }?>" style="<?php if(!empty($tab_design_json['content_font_style'])){ echo 'color: rgb(0 128 96);' ; }?>"><i class="fa fa-italic"></i></span>
                                  <span class="content-font-underline" value="<?php if(!empty($tab_design_json['content_font_decoration'])){ echo 'underline' ; }?>" style="<?php if(!empty($tab_design_json['content_font_decoration'])){ echo 'color: rgb(0 128 96);' ; }?>"><i class="fa fa-underline"></i></span>
                                  <select id="content-fnt-family"> 
                                    <option value="">Style</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Verdana ">Verdana </option>
                                    <option value="Impact ">Impact </option>
                                    <option value="Comic Sans MS">Comic Sans MS</option>
                                  </select>
                                    <span class="content-font-align" id="left" value="
                                  <?php if(!empty($tab_design_json['content-font-align'])){ echo 'align-left'; }?>"><i class="fa fa-align-left"></i></span>
                                    <span class="content-font-align" id="right" value="
                                  <?php if(!empty($tab_design_json['content-font-align'])){ echo 'align-left'; }?>"><i class="fa fa-align-right"></i></span>
                                    <span class="content-font-align" id="center" value="
                                  <?php if(!empty($tab_design_json['content-font-align'])){ echo 'align-left'; }?>"><i class="fa fa-align-center"></i></span>
                                    <input type="color" name="" value="<?php if(!empty($tab_design_json['tab_txt_color'])){ echo $tab_design_json['tab_txt_color'] ; }else { echo ''; }?>" id="content_txt_color">
                              </div>
                            
                          </div>
                        </div>
                      </div>
                      <div class="content-layout content-bg-div col-md-3">
                          <div class="design-hd">Content background color</div>
                            <div>
                              <input type="color" id="content_bgcolor" name="favcolor" value="<?php if(isset($tab_design_json['content_bgcolor'])){ echo $tab_design_json['content_bgcolor'] ; }else{ echo '';}?>">
                            </div>
                      </div>
                      <div class="content-layout gradient-div col-md-3">
                          <div class="design-hd">Gradient</div>
                          <div class="">
                            <div id="gradient_color" style="<?php if(!empty($tab_design_json['gradient_color'])){ echo 'display: block';}else{echo 'display: none';}?>"><input type="color" name="" id="gradient_picker"></div>
                            <div class="">
                            <label class="switch">
                              <input type="checkbox" id ="gradient_switch" <?php if(!empty($tab_design_json['gradient_color'])){ echo "checked";}?>>
                              <span class="slider round"></span>
                            </label>
                          </div>  
                          </div>
                          
                          <!-- <div class="switch_box ">
                                <input type="checkbox" class="switch_1" name="" id="gradient_switch" value="true" <?php //if ($desktop_json['desk_protect_text'] == 'true') {    echo "checked";   } ?>>
                             </div>    -->
                      </div>
                      <div class="content-layout col-md-3">
                          <div class="design-hd">Content Height</div>
                            <fieldset id="group1">
                              <input type="range" id="content_height_range" value="<?php if(isset($tab_design_json['content_height_range'])){ echo $tab_design_json['content_height_range'] ; }?>" min=0 max=500>
                            </fieldset>
                      </div>
                    </div> 
                  </form>                
                </div>
                <div id="border_design" class="tab-pane fade">
                  <form>
                    <div class="main-design-tab col-md-12 ">
                      <div class="tab-layout col-md-4 content">
                          <div class="design-hd">Border width</div>
                            <fieldset id="group1">
                              <input type="range" id="border_width_range" name="" min="0" max="100" value="<?php if(isset($tab_design_json['border_width_range'])){ echo $tab_design_json['border_width_range'] ; }?>">
                            </fieldset>
                      </div>
                      <div class="tab-layout col-md-4">
                          <div class="design-hd">Border radius</div>
                            <fieldset id="group1">
                              <input type="range" id="border_redius_range" name="" min="0" max="100" value="<?php if(isset($tab_design_json['border_redius_range'])){ echo $tab_design_json['border_redius_range'] ; }?>">
                            </fieldset>
                      </div>
                      <div class="tab-layout col-md-4">
                        <div class="design-hd">Border color</div>
                          <div>
                            <input type="color" id="border_color" name="favcolor" value="<?php if(isset($tab_design_json['content_txt_color'])){ echo $tab_design_json['content_txt_color'] ; }?>">
                          </div>
                      </div>
                    </div> 
                  </form>             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="mx-auto main-design-block p-3 text-center">
      <div class="prv-card" style="margin-top: 10px;">
        <div class="design-hd mx-sm-3 mb-2" style="margin-right: 85% !important;">Preview tabs</div>
          <div class="row text-center">
                  <div class="col-md-12">
                    <div id="add_dy_tabs">
                      <ul class="nav nav-tabs <?php if($tab_design_json['tab_layout'] == 'vertical'){ echo 'flex-column';}?>" id="tab_nav_ul">
                        <?php for($tabs = 0; $tabs<count($tab_json); $tabs++){
                          $count_tb = $tabs+1;
                          if($count_tb == '1'){
                            $add_class = 'active';
                          }else{
                            $add_class = '';
                          }
                         ?>
                        <li style="<?php if(isset($tab_design_json['tab_bgcolor'])){ echo 'background-color:'.$tab_design_json['tab_bgcolor'] ;
                          echo '; border-color: '.$tab_design_json['border_color']; 
                          
                         }?>" class="<?php echo $add_class; ?>">
                          <a data-toggle="tab" href="#tab_nav_<?php echo $count_tb;?>" id="tab_<?php echo $count_tb;?>" style="<?php if(isset($tab_design_json['tab_bgcolor'])){ 
                          echo 'font-weight: '.$tab_design_json['tab_font_weight'];
                          echo ';font-style: '.$tab_design_json['tab_font_style'];
                          echo ';text-decoration: '.$tab_design_json['tab_font_decoration'];
                          echo ';font-family: '.$tab_design_json['tab_font_family'];
                          echo ';color: '.$tab_design_json['tab_txt_color'];
                         }?>"><?php echo $tab_json[$tabs];?></a>
                        </li>
                        </li>
                      <?php }?>
                      </ul>
                      <div class="tab-content">
                        <?php for($tab_content = 0; $tab_content<count($tabs_content_json); $tab_content++){
                          $count_tb = $tab_content+1;
                          if($count_tb == '1'){
                            $add_class = 'active';
                          }else{
                            $add_class = '';
                          }
                         ?>
                        <div id="tab_nav_<?php echo $count_tb;?>" class="tabs_content_area tab-pane fade in <?php echo $add_class; ?>">
                          <p style="width: 100%; height:200px; 
                          <?php if(!empty($tab_design_json)){ 
                            if(!empty($tab_design_json['gradient_color'])){
                              $gradient_background = '-webkit-gradient(linear, left top, left bottom, from('.$tab_design_json["content_bgcolor"].'), to('.$tab_design_json["gradient_color"].'))';
                            echo 'background:'.$gradient_background ;}
                            else{
                            echo 'background:'.$tab_design_json['content_bgcolor'] ;
                          } 
                          echo ';font-weight: '.$tab_design_json['content_font_weight'];
                          echo ';font-style: '.$tab_design_json['content_font_style'];
                          echo ';text-decoration: '.$tab_design_json['content_font_decoration'];
                          echo ';font-family: '.$tab_design_json['content_font_family'];
                          echo '; color: '.$tab_design_json['content_txt_color'];

                            }?>" ><?php echo $tabs_content_json[$tab_content]; ?></p> 
                        </div>
                       <?php }?>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-12">
                    <p style="width: 48%; height:200px"></p>  
                  </div>  --> 
                </div>
        </div>
        <div class="btn-sv-tb">
          <button class="btn btn-success save_tab" id="tabs_design_save" style="background: rgb(0 128 96);">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  //tab layout
  $(document).on("change",'.tab_layout',function (e){
    let tab_layout_val = $(this).val();
    if (tab_layout_val == 'vertical') {
      $("#tab_nav_ul").addClass('flex-column');
      $(".horize-rd-at").css('background', '#e0dddd8c');
      $('.ver-rd-at').css('background', 'rgb(0 128 96)');

    }else{
      //if (tab_layout_val = 'vertical') {
        $(".ver-rd-at ").css('background', '#e0dddd8c');
      $('.horize-rd-at').css('background', 'rgb(0 128 96)');
        $("#tab_nav_ul").removeClass('flex-column');
      //}
    }    

  });
  $(document).on("change",'.tab_width_style',function (e){
    let tab_width_val = $(this).val();
    if (tab_width_val == 'fixed') {
      $(".auto-rd-at").css('background', '#e0dddd8c');
      $('.fixed-rd-at').css('background', 'rgb(0 128 96)');
      //$( "#tab_nav_ul li " ).css( "position", 'fixed' );
    }else{
      //if (tab_width_val = 'vertical') {
      $(".fixed-rd-at ").css('background', '#e0dddd8c');
      $('.auto-rd-at').css('background', 'rgb(0 128 96)');
      //$( "#tab_nav_ul li " ).css( "position", 'absolute ' );

      //}
    }    

  });
  //tab width range 
  $(document).on("change",'#tab_width_range',function (e){
    let tab_width = $(this).val();
    $( "#tab_nav_ul li " ).css( "width", tab_width+"px" );
  });
  //tab width transition 
  $(document).on("change",'#tab_transition',function (e){
    let transition_time = $(this).val();
    $( "#tab_nav_ul li " ).css( "transition", 'width'+transition_time );
  });
  $(document).on("change",'#tab_bgcolor',function (e){
    let tab_bg = $(this).val();
    $( "#tab_nav_ul li " ).css( "background", tab_bg );
  });

//use font editor for tab
  let bold_clk_count=1; ita_clk_count=1; unline_clk_count  = 1; 
  let con_bold_clk_count=1; con_ita_clk_count=1; con_unline_clk_count  = 1; //click count
//click count
  //tabs save 
  $(document).on("click",'#tabs_design_save',function (e){
    let bold_tb_txt = ''; ita_tb_txt = ''; underline_tb_txt = '';
    let contnt_bold_txt = ''; contnt_ita_txt = ''; contnt_underline_txt = '';
    //tab txt design
    
    bold_tb_txt = $('.tab-font-bold').attr('value');
         
    
    ita_clk_count = $('.tab-font-italic').attr('value');
     
   
      unline_clk_count = $('.tab-font-underline').attr('value');
    
      //content txt design 
  
      contnt_bold_txt = $('.content-font-bold').attr('value');
   
  
      contnt_ita_txt = $('.content-font-italic').attr('value');
    
  
      contnt_underline_txt = $('.content-font-underline').attr('value');
   

    let tb_font_family   = $('#tab-fnt-family').val();
    let tab_txt_color    = $('#tab_txt_color').val();

    let content_font_family   = $('#content-fnt-family').val();
    let content_txt_color    = $('#content_txt_color').val();

    //tab design tab
    let tab_layout      = $("input[type='radio'].tab_layout:checked").val();
    let tab_width_style = $("input[type='radio'].tab_width_style:checked").val();
    let tab_width_range = $('#tab_width_range').val();
    let tab_transition  = $('#tab_width_range').val();
    let tab_bgcolor     = $('#tab_bgcolor').val();
    let gradient_color = '';
    if($('#gradient_switch').is(':checked')){
      gradient_color = $('#gradient_picker').val();
    }
    //content design
    //let content_gradient = $('#content_gradient').val();
    let content_height_range = $('#content_height_range').val();
    let content_bgcolor      = $('#content_bgcolor').val();
    //border design
    let border_width_range   = $('#border_width_range').val();
    let border_redius_range  = $('#border_redius_range').val();
    let border_color         = $('#border_color').val();
    let shop                 = $('#shop_store').val();
    const payload = {
                  shop: shop,
              tab_layout: tab_layout,
              tab_width_style      : tab_width_style,
              tab_width_range      : tab_width_range,
              tab_transition       : tab_transition,
              tab_bgcolor          : tab_bgcolor,
              content_height_range : content_height_range,
              content_bgcolor      : content_bgcolor ,
              border_width_range   : border_width_range ,
              border_redius_range  : border_redius_range ,
              border_color         : border_color,
              tab_font_weight      : bold_tb_txt,
              tab_font_style       : ita_tb_txt,
              tab_font_decoration  : underline_tb_txt,
              tab_font_family      : tb_font_family,
              tab_txt_color        : tab_txt_color,
              content_font_weight      : contnt_bold_txt,
              content_font_style       : contnt_ita_txt,
              content_font_decoration  : contnt_underline_txt,
              content_font_family      : content_font_family,
              content_txt_color        : content_txt_color,
              gradient_color           : gradient_color
    };

      $.ajax({
            type: 'POST',
            data: payload,
            url: 'tabs_design_save.php',
            success: function(data) {
               alert(data);
            }
      });
  });
  $(document).on("click",'#gradient_switch',function (e){
    if ($(this).is(':checked')) {
      $('#gradient_color').css('display', 'block');   
    }else{
          $('#gradient_color').css('display', 'none');   
    }
  });
  $(document).on("change",'#gradient_picker',function (e){
    let gradient_value = $(this).val();
    let con_color      = $('#content_bgcolor').val();
    let gradient_css = "-webkit-gradient(linear, left top, left bottom, from("+con_color+"), to("+gradient_value+"))";
    $('.tabs_content_area p').css({background: gradient_css });
    //$( ".tabs_content_area p" ).css( "background", "linear-gradient("+con_color+",", gradient_value+"," , "transparent)");
  });

  //content height range 
  $(document).on("change",'#content_height_range',function (e){
    let tab_content_height = $(this).val();
    $( ".tabs_content_area p" ).css( "height", tab_content_height+"px" );
  });
  $(document).on("change",'#content_bgcolor',function (e){
    let bg_color = $(this).val();
    if ($('#gradient_switch').is(':checked')) {
      let gradient_clr = $('#gradient_picker').val();
      let gradient_css = "-webkit-gradient(linear, left top, left bottom, from("+bg_color+"), to("+gradient_clr+"))";
      $('.tabs_content_area p').css({background: gradient_css });
    }else{
      $( ".tabs_content_area p" ).css( "background", bg_color );
    }
  });

  //content and tab border  style 
  $(document).on("change",'#border_width_range',function (e){
    let tab_content_border = $(this).val();
    $( ".tabs_content_area p" ).css( "border", tab_content_border+"px solid" );
  });

  $(document).on("change",'#border_redius_range',function (e){
    let border_radius = $(this).val();
    $( ".tabs_content_area p" ).css( "border-radius", border_radius+"px" );
  });
  
  $(document).on("change",'#border_color',function (e){
    let color = $(this).val();
    $( ".tabs_content_area p" ).css( "border-color", color );
  });
  //use font editor for tab
  //let bold_clk_count=1; ita_clk_count=1; unline_clk_count  = 1; //click count
  $(document).on('click', '.tab-font-bold', function(){
    if(bold_clk_count % 2 == 0){
        $(this).css('color', '');
        $(this).attr("value", "");
        $( "#tab_nav_ul li " ).css( "font-weight", "normal" );
      
    }else{   
      let i = $(this).attr('value');
      if(i == ''){
        $(this).css('color', 'rgb(0 128 96)');
        $(this).attr("value", "bold");
        $( "#tab_nav_ul li " ).css( "font-weight", "bold" );
      }else{
        $(this).css('color', '');
        $(this).attr("value", "");
        $( "#tab_nav_ul li " ).css( "font-weight", "normal" );
      }
    }
    bold_clk_count++; 
  });

  $(document).on('click', '.tab-font-italic', function(){
    if(ita_clk_count % 2 == 0){
      $(this).css('color', '');
      $(this).attr("value", "");
      $( "#tab_nav_ul li " ).css( "font-style", "normal" );
    }else{
      let j = $(this).attr('value');
      if(j == ''){
        $(this).css('color', 'rgb(0 128 96)');
        $(this).attr("value", "italic");
        $( "#tab_nav_ul li " ).css( "font-style", "italic" );
      }else{
        $(this).css('color', '');
        $(this).attr("value", "");
        $( "#tab_nav_ul li " ).css( "font-style", "normal" );
      }
    }
    ita_clk_count++; 
  });

  $(document).on('click', '.tab-font-underline', function(){
    if(unline_clk_count % 2 == 0){
      $(this).css('color', '');
      $(this).attr("value", "");
      $( "#tab_nav_ul li a " ).css( "text-decoration;", "none" );
    }else{
      let k = $(this).attr('value');
      if(k == ''){
        $(this).css('color', 'rgb(0 128 96)');
        $(this).attr("value", "underline");
      $( "#tab_nav_ul li a " ).css( "text-decoration", "underline" );
      }else{
        $(this).css('color', '');
        $(this).attr("value", "");
        $( "#tab_nav_ul li a " ).css( "text-decoration;", "none" );
      }
    }
    unline_clk_count++; 
  });

  $(document).on('click', '.tab-font-align', function(){
    let font_align_val = $(this).attr('id');
      $( "#tab_nav_ul li " ).css( "text-align", font_align_val );
  });
  $(document).on('change', '#tab_txt_color', function(){
    let tab_txt_clr = $(this).val();
      $( "#tab_nav_ul li a " ).css( "color", tab_txt_clr );
  });

  $(document).on('change', '#tab-fnt-family', function(){
    let tab_style = $(this).val();
      $( "#tab_nav_ul li  " ).css( "font-family", tab_style );
  });
  //use font editor for p content
//let con_bold_clk_count=1; con_ita_clk_count=1; con_unline_clk_count  = 1; //click count
  $(document).on('click', '.content-font-bold', function(){
    if(con_bold_clk_count % 2 == 0){
        $(this).attr("value", "");
        $(this).css('color', '');
        $( ".tabs_content_area p " ).css( "font-weight", "normal" );
    }else{
      let k = $(this).attr('value');
      if(k == ''){
        $(this).css('color', 'rgb(0 128 96)');
        $(this).attr("value", "bold");
        $( ".tabs_content_area p " ).css( "font-weight", "bold" );
      }else{
        $(this).css('color', '');
        $(this).attr("value", "");
        $( ".tabs_content_area p " ).css( "font-weight", "normal" );
      }
    }
    con_bold_clk_count++; 
  });

  $(document).on('click', '.content-font-italic', function(){
    if(con_ita_clk_count % 2 == 0){
      $(this).attr("value", "");
      $(this).css('color', '');
      $( ".tabs_content_area p " ).css( "font-style", "normal" );
    }else{
      let l = $(this).attr('value');
      if(l == ''){
        $(this).css('color', 'rgb(0 128 96)');
        $(this).attr("value", "italic");
        $( ".tabs_content_area p " ).css( "font-style", "italic" );
      }else{
        $(this).css('color', '');
        $(this).attr("value", "");
        $( ".tabs_content_area p " ).css( "font-style", "normal" );
      }
    }
    con_ita_clk_count++; 
  });
  $(document).on('click', '.content-font-underline', function(){
    if(con_unline_clk_count % 2 == 0){
      $(this).attr("value", "");
      $(this).css('color', '');
      $( ".tabs_content_area p " ).css( "text-decoration;", "none" );
    }else{
      let m = $(this).attr('value');
      if(m == ''){
        $(this).css('color', 'rgb(0 128 96)');
        $(this).attr("value", "underline");
        $( ".tabs_content_area p " ).css( "text-decoration", "underline" );
      }else{
        $(this).attr("value", "");
        $(this).css('color', '');
        $( ".tabs_content_area p " ).css( "text-decoration;", "none" );
      }
    }
    con_unline_clk_count++; 
  });

  $(document).on('click', '.content-font-align', function(){
    let font_align_val = $(this).attr('id');
      $( ".tabs_content_area p" ).css( "text-align", font_align_val );
  });
  $(document).on('change', '#content_txt_color', function(){
    let tab_txt_clr = $(this).val();
      $( ".tabs_content_area p" ).css( "color", tab_txt_clr );
  });

  $(document).on('change', '#content-fnt-family', function(){
    let tab_style = $(this).val();
      $( ".tabs_content_area p" ).css( "font-family", tab_style );
  });//use font editor for p content

</script>
