// VERIFICAR SE A SECTION #MENU E #LOGIN ESTA SENDO VISTA
// SE ESTIVER ADD .dNONE EM #BUTTON-MENU
// SE NÃO REMOVE .dNONE
if ($('#menu').is(':visible')) {
  var element = document.getElementById("button-menu");
  element.classList.add("dNone");
}
else { 
  var element = document.getElementById("button-menu");
  element.classList.remove("dNone");
}
if ($('#login').is(':visible')) {
  var element = document.getElementById("button-menu");
  element.classList.add("dNone");
 }
if ($('#login').is(':visible')) {
  var element = document.getElementById("logo");
  element.style.width='186px';
}
if ($('#modal').is(':visible')) {
  var element = document.getElementById("button-menu");
  element.classList.add("dNone");
}
if ($('#menu').is(':visible')) {
  var element = document.getElementById("turnoff");
  element.style.display='block';
}
if ($('#central').is(':visible')) {
  var element = document.getElementById("bt-wpps");
  element.style.display='none';
}
if ($('#agendar').is(':visible')) {
  var element = document.getElementById("bt-wpps");
  element.style.display='none';
}

function openModal() {
  var tela = document.getElementById('information');

  tela.classList.toggle('dNone');
}

function bigCupom() {
  var cod = document.getElementById('bigCupom');

  cod.classList.toggle('dNone');
}

function copy() {
  var copiar = document.getElementById('input');

  copiar.select();
  document.execCommand('copy');
}