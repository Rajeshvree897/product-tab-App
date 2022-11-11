<style type="text/css">
body {font-family: Arial;}

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
  background-color: #ccc;
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

</style>
<div class="front-tabs">
  <div id="tab_nav_ul">
</div>
<div id="tabs_data_content"> 
</div>
</div>



<script>
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
    /*let tab_count = '';
    let add_class = '';
    for (var i = 0; i < tabs.length; i++) {
      tab_count = i+1;
      if(tab_count == '1'){
        add_class = 'active';
        
        }else{
        add_class = '';
      }
      
      let tab_style = ` 
                      width: ${style_setting['tab_width_range']}px; 
                      transition: width ${style_setting['tab_width_range']}s; 
                      background: ${style_setting['tab_bgcolor']}; 
                      color: ${style_setting['tab_txt_color']};
                      font-weight:${style_setting['tab_font_weight']};
                      font-style:${style_setting['tab_font_style']}; 
                      font-decoration:${style_setting['tab_font_decpration']};
                      font-family:${style_setting['tab_font_family']}  `;
        let gradient_background = "";
      let gradient = style_setting["gradient_color"];
        if(gradient != ''){
         gradient_background = `-webkit-gradient(linear, left top, left bottom, from(${style_setting['content_bgcolor']}), to(${style_setting['gradient_color']}))`;
      }else{
        gradient_background = style_setting['content_bgcolor'];
      }
      let vertical_css = '';
      if(style_setting['tab_layout'] == 'vertical'){
          document.getElementById('tab_nav_ul').style.float = "left";   
          document.getElementById('tab_nav_ul').style.width = style_setting['tab_width_range']+'px';

      }
      let content_style = `font-weight:${style_setting['content_font_weight']};
                          font-style:${style_setting['content_font_style']};
                          font-decoration:${style_setting['content_font_decoration']};
                          font-family:${style_setting['content_font_family']};
                          color:${style_setting['content_txt_color']};
                          border:${style_setting['border_width_range']}px;
                          border-radius:${style_setting['border_redius_range']}px;
                          border-color:${style_setting['border_color']};background:${gradient_background};height:${style_setting['content_height_range']} `; 
         */
      document.getElementById("tab_nav_ul").innerHTML += tabs;
      document.getElementById("tabs_data_content").innerHTML += tabs_content; 
      if(vertical_status == '1'){
          document.getElementById('tab_nav_ul').style.float = "left";   
          document.getElementById('tab_nav_ul').style.width = tab_width+'px';

      }  
      /*if(tab_count == '1'){
        document.getElementById('tab_nav_'+tab_count).style.display = "block";      
        }*/

   // }
  })
  .catch(function (error) {
    console.log(error)
  });


</script>