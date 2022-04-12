/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/data_import.js ***!
  \*************************************/
document.getElementById("file_select").onchange = function () {
  var file_select = document.getElementById('file_select');
  var select_filename = document.getElementById('select_fileName');
  select_filename.innerHTML = file_select.value;
};
/******/ })()
;