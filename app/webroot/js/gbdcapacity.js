function GetCapacityData(){
	
	var xmlhttp;
	var sendText;
	if(window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
	else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	
		}
	xmlhttp.onreadystatechange=function()
		{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("section1").innerHTML=xmlhttp.responseText;
			}
		}
	xmlhttp.open("POST","getCapacityDetail.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
	//alert(task);
}

function checkAuth(){
	var xmlhttp;
	var sendText;
	
	if(window.XMLHttpRequest)
		{
				xmlhttp=new XMLHttpRequest();
		}
	else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");	
		}
	xmlhttp.onreadystatechange=function()
		{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			
			var obj=JSON.parse(xmlhttp.responseText);
				
				if (obj.statuscheck=="correct") {
					window.location.href='http://gbdcapacitytracker-gbs.int.open.paas.redhat.com/capacity.html';
				}else {
					document.getElementById('disp').innerHTML="User ID or Password is incorrect";						
				}
			}
		}
	//alert(document.getElementById('inpcantb').value);
	
	xmlhttp.open("POST","auth.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	sendText="usr="+ document.getElementById('usr').value+"&pwd="+ document.getElementById('pwd').value;
	xmlhttp.send(sendText);
}