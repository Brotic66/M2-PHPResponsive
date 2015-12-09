function jdm_ajax_update_twik()
{	xmlhttp=null;
if (window.XMLHttpRequest)
  {// code for all new browsers
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)
  {// code for IE5 and IE6
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
if (xmlhttp!=null)
  {
  
  new Request.HTML({ 
           url: 'jdm_twiker_ajax_script.php', 
           data: {}, 
           update: $('jdm-twik-block-text') 
        }).send(); 
        /*
    new Request.HTML({ 
          url: 'jdm_player_stats_ajax_script.php', 
          data: {}, 
          update: $('jdm-player-info-block-contents') 
      }).send(); 
      */  
       
  //	 new Request.HTML({ 
   //        url: 'jdm_stats_ajax_script.php', 
   //        data: {}, 
   //        update: $('jdm-postit-stats') 
   //     }).send(); 
        
       
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}