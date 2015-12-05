function jdm_ajax_validate_duel_score(duel_id,score)
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
 // xmlhttp.onreadystatechange=state_Change;
 //alert (duel_id + score);
  xmlhttp.open("GET","http://www.lirmm.fr/jeuxdemots/jdm_duel_ajax_script.php?duel_id="+duel_id+"&score="+score , true);
  xmlhttp.send(null);
  //alert (xmlhttp.responseText);
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}

