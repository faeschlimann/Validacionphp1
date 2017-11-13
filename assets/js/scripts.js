function validateForm() {
  var r;
  checkCodigo();
  checkNombre();
  checkAnyo();
  checkSemestre();
  return false;
}

function _validateField(field, fn) {
  var r = fn(field.value);
  _displayResult(field, r);
  
  return r;
}
function _displayResult(field, r){
  var _changeInputColor = function( field , bol){
    field.style.outlineStyle = "solid";
    if(bol){
      field.style.outlineColor = "green";
    } else {
      field.style.outlineColor = "red";
    }
  };

  _changeInputColor(field, r);
}

function checkCodigo() {
  _validateField(document.getElementById('input1'), function(value){
    return 0 <= value && value <= 9999999999;
  });
}

function checkNombre() {
  _validateField(document.getElementById('input2'), function(value){
    var re = new RegExp("^[A-Z]* [A-Z]*$");
    return value.match(re);
  });
}

function checkAnyo() {
  _validateField(document.getElementById('input3'), function(value){
    return 1980 <= value && value <= 2017;
  });
}

function checkSemestre() {
  _validateField(document.getElementById('input4'), function(value){
    var semestre = ['1', '2', '0'];
    return semestre.indexOf(value.toUpperCase())>=0 ? true : false;
  });
}
