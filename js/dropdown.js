var make = document.getElementById('makes').value;
var tableContainer = document.getElementById('result');

function showModels() {
    document.getElementById('models').style.visibility = "visible";
    document.getElementById('model-list').style.visibility = "visible";
}

function getMakeModel() {
    var make = document.getElementById('makes').value;
    var model = document.getElementById('models').value;
    getCarsTable(make, model);
}

function getModelsAJAX(make) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    var firstOption = '<option>Select Model</option>';
    
    document.getElementById('models').innerHTML = firstOption+this.responseText;
    var options = document.getElementById("models").options;
    console.log(decodeURIComponent(this.responseText));
     
    }
  };
  xhttp.open("GET", "carController.php?action=getmodels&make="+encodeURIComponent(make), true);
  xhttp.send();
}

function getCarsTable(make, model) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("result").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "carController.php?action=getCarsByMakeModel&make="+encodeURIComponent(make)+"&model="+encodeURIComponent(model), true);
  xhttp.send();  
}