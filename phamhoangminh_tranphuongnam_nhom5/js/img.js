
var images = [];
for(var i=0;i<5;i++){
	images[i]=new Image();
	images[i].src = "images/anh" + i + ".png";
}

var index = 0;
function next(){
	index ++;
	if(index>=images.length){
		index=0;
	}
	var anh = document.getElementById('anh');
	anh.src = images[index].src;
	document.getElementById("num").innerHTML = index+1;
}

function prev(){
	index--;
	if(index<0){
		index=images.length-1;
	}
	var anh = document.getElementById("anh");
	anh.src = images[index].src;
	document.getElementById("num").innerHTML = index+1;
}
//