$(function() {
var clicks = 0;
$('button').on('click', function() {
clicks++;
var percent = Math.min(Math.round(clicks / 3 * 100), 100);
$('.percent').width(percent + '%');
$('.number').text(percent + '%');
});
$('.facebook').on('click', function() {
var w = 580, h = 300,
left = (screen.width/2)-(w/2),
top = (screen.height/2)-(h/2);
if ((screen.width < 480) || (screen.height < 480)) {
window.open ('http://www.facebook.com/share.php?u=http://wild.game.free.fr', '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} else {
window.open ('http://www.facebook.com/share.php?u=http://wild.game.free.fr', '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
});
$('.twitter').on('click', function() {
var loc = encodeURIComponent('http://wild.game.free.fr'),
title = "Wild Steel —  a biker racing game in which you ride a chopper on wild roads",
w = 580, h = 300,
left = (screen.width/2)-(w/2),
top = (screen.height/2)-(h/2);
window.open('http://twitter.com/share?text=' + title + '&url=' + loc, '', 'height=' + h + ', width=' + w + ', top='+top +', left='+ left +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
});
$('.greenlight').on('click', function() {
window.location.href = "http://steamcommunity.com/sharedfiles/filedetails/?id=314252359";
});
$('.alpha').on('click', function() {
window.location.href = "http://canyon-carving.mutsu.fr/Wild_Setup.zip";
});
$('.press').on('click', function() {
window.location.href = "https://www.dropbox.com/sh/9wetmzxn2knt57f/AADeVrp7xOZqI_zMXtckCWlca?dl=0";
});
$('.visit').on('click', function() {
window.location.href = "https://www.indiegogo.com/projects/the-cool-biker-game-with-a-temporary-name";
});
$('.buy').on('click', function() {
window.location.href = "http://wild.game.free.fr/buy.html";
});
});