<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<title>URL_SHORTENER</title>
</head>
<body>
	<style>
		.center-screen {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  min-height: 100vh;
}
	</style>

 <div class="center-screen">
<h1>URL SHORTENER</h1>
 <form class="d-flex" method="POST">
        <input class="form-control me-2" type="url"require placeholder="Search" id="url" >
        <button class="btn btn-outline-success" id="submit" type="submit">Search</button>
      </form> 
      <br>
      <p id="alerts" class="" role="alert"></p></div>
<script>
let result;
const sumbit = document.getElementById("submit").addEventListener("click", function(event){
  event.preventDefault();
 result = fetchdata(document.getElementById("url").value);
});
const isValidURL = (u)=>{
let elm;
  if(!elm){
    elm = document.createElement('input');
    elm.setAttribute('type', 'url');
  }
  elm.value = u;
  return elm.validity.valid;
}
const alerts = document.getElementById('alerts');
const fetchdata = (valor)=>{
if (document.getElementById("url").value.length !== 0) {
	if (isValidURL(valor))
		{
				valor = valor.replace(/^(?:https?:\/\/)?(?:www\.)?/i, "");
		axios.post(url, {url: `${valor}` }).then(function(response) {
    console.log(response.data);
    if (response.data == "ERROR") {
    		alerts.innerText = "ERROR "
				alerts.setAttribute("class","alert alert-danger")
    	}
    else{
    	alerts.innerHTML = "Completado Tu URL acortada es <a href='https://url-shorter-tokidev.000webhostapp.com/"+response.data+"'>https://url-shorter-tokidev.000webhostapp.com/"+response.data+"</a>";
    	alerts.setAttribute("class","alert alert-success")
    }
    });
		}
		else{
			alert("Introduzca una url valida (ejem:'http://google.com') ")
		}
}
else{	alert("ERROR") }}

</script>
</body>
</html>