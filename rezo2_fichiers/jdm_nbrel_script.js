function jdm_ajax_update_nbrel()
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
           url: 'jdm_nbrel_ajax_script.php', 
           data: {}, 
           update: $('home-nbrel') 
        }).send(); 
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}