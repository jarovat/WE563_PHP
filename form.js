function AddList(btn){
    let x = $("#addcourses").parent().clone();
    x.find("input:text").val("");
    $("#content").append(x);

}

function DelList(btn){
 $("addcourses").parent().remove();

}

function chkUser(){
    let username = document.getElementById("username").value;
    if(username.length < 4){
		alert("ชื่อบัญชีผู้ใช้ต้องมีมากกว่า 4 ตัวอักษร");
		return false;
	}
	else{
		return true
		}
}

function chkMail(){
    let email = document.getElementById("email").value;
    pattern = (
		/^(([^<>()[\]\\.,;:\s@"] + (\.[^<>()[\]\\.,;:\s@"]+)*) | (".+")) @((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		);
		if(pattern.test(email) == true){
			return true ;
		}
		else {
			alert ("อีเมลผิด กรุณาตรวจสอบใหม่อีกครั้ง.")
			return false;
		}
}

function chkPass(){
    let password = document.getElementById("pwd").value;
    if (password.length >= 4 && password.length <= 8){
     return true ;   
    }
    else{
        alert("รหัสผ่านจะต้องอยู่ระหว่าง 4-8 ตัวอักษร!");
        return false;
    }
}

function chkRepass(){
    let password = document.getElementById("pwd").value;
    let password2 = document.getElementById("pwd2").value;
    if (password == password2){
        return true;
    }
    else {
        alert("รหัสผ่านทั้ง 2 ช่องไม่ตรงกัน")
        return false;
    }
}


