// JavaScript Document
function lof(x)
{
	location.href=x
}

function chkAcc(table){
    let acc=$("#acc").val();
    $.get("api/chk_acc.php",{acc,table},(res)=>{
        if(parseInt(res)==1 || acc=='admin'){
            alert("帳號已被使用")
        }else{
            alert("此帳號可使用")
        }
    })
}


function reg(){
	let acc=$("#acc").val()
	let pw=$("#pw").val()
	let name=$("#name").val()
	let addr=$("#addr").val()
	let email=$("#email").val()
	let tel=$("#tel").val()
	let table='mem';
    $.get("api/chk_acc.php",{acc,table},(res)=>{
        if(parseInt(res)==1 || acc=='admin'){
            alert("帳號已被使用")
        }else{
            $.post('api/reg.php',{acc,pw,name,addr,email,tel},()=>{
				alert('註冊成功，歡迎加入')
				location.href='?do=login'
			})
        }
    })
}


function resetForm(){
	$("input[type='text'],input[type='password'],input[type='number'],input[type='date']").val('')
}

function login(table){
	let chk=$("#chk").val()
	let acc=$("#acc").val()
	let pw=$("#pw").val()
	$.get("api/chk_ans.php",{chk},(res)=>{
		if(parseInt(res)==1){
			$.get("api/chk_pw.php",{acc,pw,table},(ok)=>{
				if(parseInt(ok)==1){
					switch(table){
						case 'mem':
							location.href='index.php';
						break;
						case 'admin':
							location.href='backend.php';
						break;
					}
				}else{
					alert("帳號或密碼錯誤")
				}
			})
		}else{
			alert("對不起，您輸入的驗證碼有誤請您重新登入")
		}
	})
}

function del(table,id){
	$.post("api/del.php",{table,id},()=>{
		location.reload();
	})
}