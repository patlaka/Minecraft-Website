<!--

//
// Used for displaying the users when one is selected from dropdown menu
//
function showUser(str)
{
if (str=="")
  {
  document.getElementById("displayuser").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("displayuser").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/displayusers.php?q="+str,true);
xmlhttp.send();
}

//-->