window.onload=function(){
	var img=document.getElementsByTagName('img');
	for (var i = img.length - 1; i >= 0; i--) {
		img[i].onclick=function(){
			change_img(this.src);
		}
}
}
function change_img(src){
	var changeimg=window.opener.document.getElementById('faceimg');
	var face_path=window.opener.document.getElementById('face_path');
	changeimg.src=src;
	face_path.value=src;
}