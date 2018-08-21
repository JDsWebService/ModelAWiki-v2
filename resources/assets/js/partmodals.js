// Global Variables
var reminderInput = "";
var tipsInput = "";
var warningsInput = "";
var funFactsInput = "";

// Reminder Click Events
$("#reminderModal").on("shown.bs.modal", function() {
  tinyMCE.get("reminderInput").focus();
});
$('.reminderSave').click(function () {
	reminderInput = tinymce.get('reminderInput').getContent();
});
$('.reminderCancel').click(function () {
	tinymce.get('reminderInput').setContent(reminderInput);
});

// Tips Click Events
$("#tipsModal").on("shown.bs.modal", function() {
  tinyMCE.get("tipsInput").focus();
});
$('.tipsSave').click(function () {
	tipsInput = tinymce.get('tipsInput').getContent();
});
$('.tipsCancel').click(function () {
	tinymce.get('tipsInput').setContent(tipsInput);
});

// Warning Click Events
$("#warningsModal").on("shown.bs.modal", function() {
  tinyMCE.get("warningsInput").focus();
});
$('.warningsSave').click(function () {
	warningsInput = tinymce.get('warningsInput').getContent();
});
$('.warningsCancel').click(function () {
	tinymce.get('warningsInput').setContent(warningsInput);
});

// Fun Facts Click Events
$("#funFactsModal").on("shown.bs.modal", function() {
  tinyMCE.get("funFactsInput").focus();
});
$('.funFactsSave').click(function () {
	funFactsInput = tinymce.get('funFactsInput').getContent();
});
$('.funFactsCancel').click(function () {
	tinymce.get('funFactsInput').setContent(funFactsInput);
});