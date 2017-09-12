$(function () {
	document.getElementById('logBtn').onclick = login;
});



function login() {
	$('#form').load("/php/pageParts/loginForm.php");
}
function registration() {
	$('#form').load("/php/pageParts/registrationForm.php");
}
function thumbsUp(article_id) {
	$('#rating').load("/php/pageParts/ratingUp.php",{id: article_id});
}
function thumbsDown(article_id) {
	$('#rating').load("/php/pageParts/ratingDown.php",{id: article_id});
}