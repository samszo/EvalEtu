//Objet HeatMap
var xx;

window.onload = function(){
  
	//initialise la heatmap
	setHeatMap();

};


function setHeatMap(){

    var hma = document.getElementById('heatmapArea');
  	while (hma.firstChild) {
    	hma.removeChild(hma.firstChild);
  	}
  
    /*charge les valeurs
  	grilleSvg = grilles[e.selectedIndex-1];
  	nbX = grilleSvg.repX.length;
  	nbY = grilleSvg.repY.length;
  	nbZone = grilleSvg.repZone.length;
  	urlFond = grilleSvg.url;
	*/ 
 
    //défini les style de la heatmap
    hma.style.width = 319;	
    hma.style.height = 319;
    hma.style.top = 199;
    hma.style.left = 57;

	//création du heatmap
  	xx = h337.create({"element":hma, "radius":25, "visible":true});			
  	xx.get("canvas").onclick = function(ev){
    	var pos = h337.util.mousePosition(ev);
    	xx.store.addDataPoint(pos[0],pos[1]);
    	//getSemClic(pos[0], pos[1]);
	};
}

function getSemClic(x, y){
    if(urlFond=="")return;
  	sem=[];
  	sem.push({"x":x,"y":y,"urlFond":urlFond});  
  	//récupère la valeur sémantique X
  	getSemX(x);
  	//récupère la valeur sémantique Y
  	getSemY(y);
	_X = x;
  	_Y = y;
  	for (i=0;i<sem.length;i++){
    	console.log(_X+" - "+_Y+" : "+sem[i].lib);				
  	}
  	//ecriTweet();
}