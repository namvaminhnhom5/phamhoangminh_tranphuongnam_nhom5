
function initTable(){
	//lấy danh sách các thẻ tr ở phần tbody
	var list_tr=document.querySelectorAll("table tbody tr");
	//duyet danh sách và chọn thẻ input là checkbox trong các tr
	for(var i=0;i<list_tr.length;i++){
		var the_tr=list_tr[i];
		the_tr.style.display="table-row";

		var chk=the_tr.querySelector("input[type=checkbox]");

		//gán thuộc tính onchange để gọi hàm xử lý khi kích chuột thay đổi checkbox ở mỗi dòng
		chk.setAttribute("onchange","changeCheckbox(this)"); 

		//chọn tiếp thẻ nhập số lượng để gán thuộc tính onchange
		var txt_number=the_tr.querySelector("input[type=number]");
		txt_number.setAttribute("onchange","changeNumber(this)");
	}

}
initTable();

function checkAll(objCHK){
	var kt_true=objCHK.checked;
	//lấy danh sách các thẻ tr ở phần tbody
	var list_tr=document.querySelectorAll("table tbody tr");
	//duyệt mảng thẻ tr sau đó tìm thẻ input type=checkbox trong thẻ tr
	for(var i=0;i<list_tr.length;i++){
		var the_tr=list_tr[i];
		var chk=the_tr.querySelector("input[type=checkbox]");
		chk.checked=kt_true;

		var txt_number=the_tr.querySelector("input[type=number]");
		txt_number.disabled = !kt_true ? true : false;
	}	
}

function changeCheckbox(objCheckbox){
	//lấy thẻ tr
	var the_tr=objCheckbox.parentElement.parentElement;
	var kt_true=objCheckbox.checked;
	var txt_number=the_tr.querySelector("input[type=number]");
	txt_number.disabled = !kt_true ? true : false;
}

function changeNumber(objNumber){
	var soLuong=objNumber.value;
	var td_dongia =objNumber.parentElement.previousElementSibling.innerHTML;
	var td_thanh_tien =objNumber.parentElement.nextElementSibling;
	var tong_thanh_tien=Number(td_dongia)*soLuong;

	td_thanh_tien.innerHTML=tong_thanh_tien;
	TongTien();
}

function TongTien(){
	var list_tr=document.querySelectorAll("table tbody tr");
	var tong_tien=0;
	for(var i=0;i<list_tr.length;i++){
		var the_tr=list_tr[i];
		if(the_tr.style.display="table-row"){
			var the_th=the_tr.lastElementChild.innerHTML;
			console.log(the_th);
			tong_tien=tong_tien+Number(the_th);
		}

		document.getElementById("tongtien").innerHTML=tong_tien;
	}
}

function filterProduct(objSelect){
	var list_tr=document.querySelectorAll("table tbody tr");
	console.log(list_tr);
	switch(objSelect.value){
		case "0":
		for(var i=0;i<list_tr.length;i++){
				list_tr[i].style.display = "table-row";
			}
		break;
		
		case "1":
		for(var i=0;i<list_tr.length;i++){
			var td_dongia=list_tr[i].children[2].innerHTML;
			if(Number(td_dongia)<100){
				list_tr[i].style.display = "table-row";
			}else{
				list_tr[i].style.display = "none";
			}
		}
		break;

		case "2":
		for(var i=0;i<list_tr.length;i++){
			var td_dongia=list_tr[i].children[2].innerHTML;
			if(Number(td_dongia)>100 && Number(td_dongia)<500){
				list_tr[i].style.display = "table-row";
			}else{
				list_tr[i].style.display = "none";
			}
		}
		break;
		case "3":
		for(var i=0;i<list_tr.length;i++){
			var td_dongia=list_tr[i].children[2].innerHTML;
			if(Number(td_dongia)>500){
				list_tr[i].style.display = "table-row";
			}else{
				list_tr[i].style.display = "none";
			}
		}
		break;

		default: 
		for(var i=0;i<list_tr.length;i++){
				list_tr[i].style.display = "table-row";
			}
		break;
	}
}



