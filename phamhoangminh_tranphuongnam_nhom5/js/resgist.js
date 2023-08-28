function KiemTra(){
	var student=document.getElementById("student");
	var name=document.getElementById("name");
	var email=document.getElementById("email");
	var national=document.getElementById("national");

	var error1=document.getElementById("error1");
	var error2=document.getElementById("error2");
	var error3=document.getElementById("error3");
	var error4=document.getElementById("error4");
	var error5=document.getElementById("error5");
	var error6=document.getElementById("error6");
	var error7=document.getElementById("error7");

	var gender=document.getElementsByName("gender");
	var sothich=document.getElementsByClassName("sothich");
	var note=document.getElementById("note");


	//kiểm tra mã sinh viên
	if(student.value.length==0){
		student.style.border="1px solid red";
		error1.innerHTML="Mã sinh viên không được để trống!";
		return false;
	}else{
		student.style.border="none";
		error1.innerHTML="";
	}

	//kiểm tra họ tên
	if(name.value.length==0){
		name.style.border="1px solid red";
		error2.innerHTML="Họ tên sinh viên không được để trống!";
		return false;
	}else{
		name.style.border="none";
		error2.innerHTML="";
	}

	//kiểm tra email
	if(email.value.length==0){
		email.style.border="1px solid red";
		error3.innerHTML="Email không được để trống!";
		return false;
	}else{
		email.style.border="none";
		error3.innerHTML="";
	}

	//kiểm tra giới tính
	if(gender[0].checked!==true & gender[1].checked!==true){
		error4.innerHTML="Bạn phải chọn giới tính!";
		return false;
	}else{
		error4.innerHTML="";
	}

	//Kiểm tra sở thích
	var kt=0;
	for(var i=0;i<sothich.length;i++){
		if(sothich[i].checked==true){
			kt++;
		}
	}
	if(kt==0){
		error5.innerHTML="Bạn phải chọn ít nhất một sở thích!";
		return false;
	}else{
		error5.innerHTML="";
	}
	//kiểm tra chọn quốc tịch
	if(national.value==0){
		error6.innerHTML=" Bạn phải chọn quốc tịch!";
		return false;
	}else{
		error6.innerHTML="";
	}

	//ghi chú tối đa 200 ký tự: sử dụng thuộc tính maxlength="200" ở file resgist.html
	if(note.value.length>200){
		error7.innerHTML="Bạn chỉ được nhập tối đa 200 ký tự!";
		note.style.border="1px solid red";
		return false;
	}else{
		error7.innerHTML="";
		note.style.border="1px solid #ccc";
	}
}