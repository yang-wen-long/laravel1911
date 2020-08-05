<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>ajax添加数据</title>
</head>
<body>
	<h1>中国加油！</h1>
	<script>
		var url = '/javaj.php';
		var desc = new XMLHttpRequest();
		desc.open('GET',url,true);
		//获取访问页面的返回数据
		desc.send();
		//获取当前的显示数据
		// desc.abort();console.log(desc.status);
		desc.onreadystatechange = alertContents;

		function alertContents(){
			if(desc.readyState === desc.DONE){
				//是否相应
				if(desc.status === 200){
					var data = desc.responseText;
					// console.log(typeof data);
					var obj = JSON.parse(data);
					// console.log(obj.error);
					if(obj.error == 0){
						alert(obj.msg);
					}else{
						alert(obj.msg);
					}
					// alert(desc.responseText);
					// console.log("我返回的数据是:"+desc.responseText);
				}else{
					alert("There was a problem with the request");
				}
			}

		}
	</script>
</body>
</html>