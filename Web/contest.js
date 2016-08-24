function httpGet(theUrl)
{
    var xmlHttp = null;

    xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}



function edMail(str)
{
	str = str.toUpperCase(); 
	str = str.replace("@", "a"); 
	str = str.replace(".", "d"); 
	var bytes = [];

	for (var i = 0; i < str.length; ++i)
	{
		bytes.push(str.charCodeAt(i));
	}

	var url = "http://wild.game.free.fr/AddContester.php?id="+bin2String(bytes);
    return httpGet(url);	
}

function bin2String(array) {
  var result = "";
  for (var i = 0; i < array.length; i++) {
	var asc=array[i];
	if(asc >= 65 && asc <=90)
	{
		asc = 65+Math.abs(asc-90)
	}
	if(asc >= 48 && asc <=57)
	{
		asc = 48+Math.abs(asc-57)
	}
    result +=String.fromCharCode(asc);
  }
  return result;
}

function score(id) {
	var txtbox = document.getElementById(id);
	var referrer = edMail(txtbox.value);
	
	window.location.href = "http://wild.game.free.fr/GetScore.php?id=".concat(referrer);	
	
}


function facebookContest(id) {
	var txtbox = document.getElementById(id);
	var referrer = edMail(txtbox.value);
	var w = 580, h = 300,
	left = (screen.width/2)-(w/2),
	top = (screen.height/2)-(h/2);

	if ((screen.width < 480) || (screen.height < 480)) {
	window.open ("http://www.facebook.com/share.php?u=http://wild.game.free.fr/?referrerId=".concat(referrer).concat("&referralType=0"), '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	} else {
	window.open ("http://www.facebook.com/share.php?u=http://wild.game.free.fr/?referrerId=".concat(referrer).concat("&referralType=0"), '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	}
}
function tweeterContest(id) {
	var txtbox = document.getElementById(id);
	var referrer = edMail(txtbox.value);
	var loc = encodeURIComponent("http://wild.game.free.fr/?referrerId=".concat(referrer).concat("&referralType=1")),
	title = ":D Awesome, wild and free game ;)",
	w = 580, h = 300,
	left = (screen.width/2)-(w/2),
	top = (screen.height/2)-(h/2);
	window.open('http://twitter.com/share?text=' + title + '&url=' + loc, '', 'height=' + h + ', width=' + w + ', top='+top +', left='+ left +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
}
function mailContest(id) {
	var txtbox = document.getElementById(id);
	var referrer = edMail(txtbox.value);
	window.open("mailto:?subject=Check%20out%20this%20awesome%20game&body=Hi%20%3AD%2C%20check%20out%20this%20awesome%20and%20free%20biker%20game%20here%20%3BD%20%0Dhttp%3A%2F%2Fwild.game.free.fr%2F%3FreferrerId%3D".concat(referrer).concat("%26referralType%3D2"));
}
function tweeterContestfr(id) {
	var txtbox = document.getElementById(id);
	var referrer = edMail(txtbox.value);
	var loc = encodeURIComponent("http://wild.game.free.fr/?referrerId=".concat(referrer).concat("&referralType=1")),
	title = ":D Super jeu de motard gratuit ;)",
	w = 580, h = 300,
	left = (screen.width/2)-(w/2),
	top = (screen.height/2)-(h/2);
	window.open('http://twitter.com/share?text=' + title + '&url=' + loc, '', 'height=' + h + ', width=' + w + ', top='+top +', left='+ left +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
}
function mailContestfr(id) {
	var txtbox = document.getElementById(id);
	var referrer = edMail(txtbox.value);
	window.open("mailto:?subject=Super%20jeu%20trop%20bien&body=Salut%20%3AD%2C%20je%20viens%20juste%20de%20jouer%20a%20un%20jeu%20de%20motard%20trop%20bien%20ici%20%3BD%20%0Dhttp%3A%2F%2Fwild.game.free.fr%2F%3FreferrerId%3D".concat(referrer).concat("%26referralType%3D2"));
}