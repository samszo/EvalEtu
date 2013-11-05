var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;
	
	if (Window.ActiveXObject){
	
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		
		catch(e){
		
			xmlHttp = false;
		}		
		}
		
	}else {
		try{
			xmlHttp = new X;
		}catch(e){
			xmlHttp = false;
		}	
	}
	
	if(!xmlHttp)
		alert("pas d'objet créé")
	else
		return xmlHttp;
}

function process(){
	if(xmlHttp.readyState==4 || xmlHttp.readyState==0 ){
		rep = encodeURIComponent(document.get
	}else{
	
	
	}
	

}