<?php 
include 'conf.php';
header("Access-Control-Allow-Origin: *");
$body = file_get_contents('php://input');
$data = json_decode($body, true);
$shop =  $data['shop'];
$shop = 'test-product-tab-app.myshopify.com';
$fetch_record = "SELECT * FROM product_tabs WHERE shop = '".$shop."'";
$result       = $conn->query($fetch_record);
$row          = $result->fetch_assoc();
$tabs		   = json_decode($row['tabs_json'], true);
$tabs_content = json_decode($row['tabs_content_json'], true);
$style_setting     = json_decode($row['tab_design_json'], true);
$tabs_html = "";
$tabs_content_html = "";
for ($i=0; $i < count($tabs) ; $i++) { 
	$tab_count = $i+1;
      if($tab_count == '1'){
        $add_class = 'active';
        
        }else{
        $add_class = '';
      }

      if($tab_count == '1'){
        $tab_active = 'display :block';
      }else{
        $tab_active = '';
      }
      $tab_style = 'width:'.$style_setting['tab_width_range'].'px;' .
                      'transition:'. $style_setting['tab_width_range'].'s;' .
                      'background:'. $style_setting['tab_bgcolor'].';' .
                      'color:'. $style_setting['tab_txt_color'].';'.
                      'font-weight:'.$style_setting['tab_font_weight'].';'.
                      'font-style:'.$style_setting['tab_font_style'].';'.
                      'font-decoration:'.$style_setting['tab_font_decpration'].';'.
                      'font-family:'.$style_setting['tab_font_family'].';'.$add_class;
                      
        $gradient_background = "";
      	$gradient = $style_setting["gradient_color"];
        if($gradient != ''){
         $gradient_background = '-webkit-gradient(linear, left top, left bottom, from('.$style_setting['content_bgcolor'].'), to('.$style_setting['gradient_color'].'))';
      }else{
        $gradient_background = $style_setting['content_bgcolor'];
      }
      $vertical_status = '';
      if($style_setting['tab_layout'] == 'vertical'){
      	$vertical_status = 1; //'float:left;width:'.$style_setting['tab_width_range'].'px;'.'margin:100px;';
      }

       $content_style = 'font-weight:'.$style_setting['content_font_weight'].';'.
                          'font-style:'.$style_setting['content_font_style'].';'.
                          'font-decoration:'.$style_setting['content_font_decoration'].';'.
                          'font-family:'.$style_setting['content_font_family'].';'.
                          'color:'.$style_setting['content_txt_color'].';'.
                          'border:'.$style_setting['border_width_range'].'px;'.
                          'border-radius:'.$style_setting['border_redius_range'].'px;'.
                          'border-color:'.$style_setting['border_color'].';background:'.$gradient_background.';height:'.$style_setting['content_height_range'] .';'.$tab_active.';'; 
        $tab_id = "tab_nav_".$tab_count;
       $tabs_html .= '<button class="tablinks '.$add_class.'" onclick="getTabContent(event, `'.$tab_id.'`)"
       style="'.$tab_style.'">'.$tabs[$i].'</button>';
		$tabs_content_html .= '<div id="tab_nav_'.$tab_count.'" class="tabcontent" style="'.$content_style.'"><p>'.$tabs_content[$i].'</p></div>';   
		
}


$data = json_encode(
					array(
						'tabs_html' => $tabs_html,
						'tabs_content_html'=> $tabs_content_html,
            'vertical_status'  => $vertical_status,
            'tab_width'        => $style_setting['tab_width_range']
					)
		);	
    echo $data;
?>