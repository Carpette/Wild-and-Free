<?php
// AddiKTiV's Real IP/HOST Tool
// Script PHP par Greg 'AddiKTiV' ROUSSAT
// http://www.france-tuto.com
// Ce script est diffusé sous Lincense Publique Générale
// Merci de m'informer en cas de modifications / améliorations
// webmaster@addiktiv.info


/*
 * Essai de trouver la valeur de la '$var_name' pour un environnement donné.
 *
 * Cherches dans $_SERVER, $_ENV puis essai getenv() et apache_getenv()
 * dans cet ordre
 *
 * Cette fonction est tirée des librairies phpMyAdmin 2-8-1
 *
 */
function ARIHT_getenv($var_name) {
    if (isset($_SERVER[$var_name])) {
        return $_SERVER[$var_name];
    } elseif (isset($_ENV[$var_name])) {
        return $_ENV[$var_name];
    } elseif (getenv($var_name)) {
        return getenv($var_name);
    } elseif (function_exists('apache_getenv')
     && apache_getenv($var_name, true)) {
        return apache_getenv($var_name, true);
    }

    return '';
} // Fin de la fonction 'ARIHT_getenv()'.

/*
 * Trouves l'IP "réelle" de l'utilisateur courrant
 *
 * Cette fonction est tirée des librairies phpMyAdmin 2-8-1
 *
 */
function ARIHT_getipreelle()
{
    global $REMOTE_ADDR;
    global $HTTP_X_FORWARDED_FOR, $HTTP_X_FORWARDED, $HTTP_FORWARDED_FOR, $HTTP_FORWARDED;
    global $HTTP_VIA, $HTTP_X_COMING_FROM, $HTTP_COMING_FROM;

    // Trouves les valeurs des variables server/environment.
    if (empty($REMOTE_ADDR) && ARIHT_getenv('REMOTE_ADDR')) {
        $REMOTE_ADDR = ARIHT_getenv('REMOTE_ADDR');
    }
    if (empty($HTTP_X_FORWARDED_FOR) && ARIHT_getenv('HTTP_X_FORWARDED_FOR')) {
        $HTTP_X_FORWARDED_FOR = ARIHT_getenv('HTTP_X_FORWARDED_FOR');
    }
    if (empty($HTTP_X_FORWARDED) && ARIHT_getenv('HTTP_X_FORWARDED')) {
        $HTTP_X_FORWARDED = ARIHT_getenv('HTTP_X_FORWARDED');
    }
    if (empty($HTTP_FORWARDED_FOR) && ARIHT_getenv('HTTP_FORWARDED_FOR')) {
        $HTTP_FORWARDED_FOR = ARIHT_getenv('HTTP_FORWARDED_FOR');
    }
    if (empty($HTTP_FORWARDED) && ARIHT_getenv('HTTP_FORWARDED')) {
        $HTTP_FORWARDED = ARIHT_getenv('HTTP_FORWARDED');
    }
    if (empty($HTTP_VIA) && ARIHT_getenv('HTTP_VIA')) {
        $HTTP_VIA = ARIHT_getenv('HTTP_VIA');
    }
    if (empty($HTTP_X_COMING_FROM) && ARIHT_getenv('HTTP_X_COMING_FROM')) {
        $HTTP_X_COMING_FROM = ARIHT_getenv('HTTP_X_COMING_FROM');
    }
    if (empty($HTTP_COMING_FROM) && ARIHT_getenv('HTTP_COMING_FROM')) {
        $HTTP_COMING_FROM = ARIHT_getenv('HTTP_COMING_FROM');
    }

    // Trouves l'IP envoyée par l'utilisateur par defaut.
    if (!empty($REMOTE_ADDR)) {
        $direct_ip = $REMOTE_ADDR;
    }

    // Trouves le proxy utlisé par l'utilisateur par defaut.
    $proxy_ip     = '';
    if (!empty($HTTP_X_FORWARDED_FOR)) {
        $proxy_ip = $HTTP_X_FORWARDED_FOR;
    } elseif (!empty($HTTP_X_FORWARDED)) {
        $proxy_ip = $HTTP_X_FORWARDED;
    } elseif (!empty($HTTP_FORWARDED_FOR)) {
        $proxy_ip = $HTTP_FORWARDED_FOR;
    } elseif (!empty($HTTP_FORWARDED)) {
        $proxy_ip = $HTTP_FORWARDED;
    } elseif (!empty($HTTP_VIA)) {
        $proxy_ip = $HTTP_VIA;
    } elseif (!empty($HTTP_X_COMING_FROM)) {
        $proxy_ip = $HTTP_X_COMING_FROM;
    } elseif (!empty($HTTP_COMING_FROM)) {
        $proxy_ip = $HTTP_COMING_FROM;
    } 

    // Renvoie l'IP réelle si elle a été trouvée, sinon renvoie 'FALSE'.
    if (empty($proxy_ip)) {
        // IP réelle sans proxy
        return $direct_ip;
    } else {
        $is_ip = preg_match('|^([0-9]{1,3}\.){3,3}[0-9]{1,3}|', $proxy_ip, $regs);
        if ($is_ip && (count($regs) > 0)) {
            // IP réelle derriere proxy
            return $regs[0];
        } else {
            // IP indéfinissable: un proxy est utilisé mais on ne peut pas
            // trouver les informations sur l'IP réelle
            return FALSE;
        }
    } 
} // Fin de la fonction 'ARIHT_getipreelle()'.

function ARIHT_affichage_message ($taille, $couleur, $texte, $img) { // Formatte le message de detection de proxy, et affiche l'image.
   echo '<img src="./'.$img.'"><br /><font size = "'.$taille.'" color = "'.$couleur.'">'.$texte.'</font><br />';
}// Fin de la fonction 'ARIHT_getipreelle()'.

function ARIHT_affichage_detect ()

{
global $REMOTE_ADDR;
$proxy_ip = $_SERVER['REMOTE_ADDR'];
$proxy_host = gethostbyaddr($proxy_ip); // Renvoi du nom d'hote proxy.

$affichage_detect = '';// Affiche image/message en cas de detection de proxy.
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
elseif(isset($_SERVER['HTTP_X_FORWARDED'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
elseif(isset($_SERVER['HTTP_FORWARDED_FOR'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
elseif(isset($_SERVER['HTTP_FORWARDED'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
elseif(isset($_SERVER['HTTP_VIA'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
elseif(isset($_SERVER['HTTP_X_COMING_FROM'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
elseif(isset($_SERVER['HTTP_COMING_FROM'])){
ARIHT_affichage_message ("2", "red", "Proxy Détecté", "proxy.png");}
else{ 
ARIHT_affichage_message ("2", "red", "Pas de Proxy Détecté", "noproxy.png");}
}// Fin de la fonction 'ARIHT_affichage_detect ()'.

function ARIHT_affichage_ip_proxy ()

{
global $REMOTE_ADDR;
$proxy_ip = $_SERVER['REMOTE_ADDR'];
$proxy_host = gethostbyaddr($proxy_ip); // Renvoi du nom d'hote proxy.

$affichage_ip = ''; // Affiche l'ip du proxy en cas de detection.
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
elseif(isset($_SERVER['HTTP_X_FORWARDED'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
elseif(isset($_SERVER['HTTP_FORWARDED_FOR'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
elseif(isset($_SERVER['HTTP_FORWARDED'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
elseif(isset($_SERVER['HTTP_VIA'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
elseif(isset($_SERVER['HTTP_X_COMING_FROM'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
elseif(isset($_SERVER['HTTP_COMING_FROM'])){
echo "
<u>Adresse IP proxy</u> :".$proxy_ip."";}
else{ 
echo "";}

}// Fin de la fonction 'ARIHT_affichage_ip_proxy ()'.

function ARIHT_affichage_host_proxy ()

{
global $REMOTE_ADDR;
$proxy_ip = $_SERVER['REMOTE_ADDR'];
$proxy_host = gethostbyaddr($proxy_ip); // Renvoi du nom d'hote proxy.

$affichage_host = ''; // Affiche le nom d'hote du proxy en cas de detection.
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_host."";}
elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_host."";}
elseif(isset($_SERVER['HTTP_X_FORWARDED'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_host."";}
elseif(isset($_SERVER['HTTP_FORWARDED_FOR'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_hostp."";}
elseif(isset($_SERVER['HTTP_FORWARDED'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_host."";}
elseif(isset($_SERVER['HTTP_VIA'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_host."";}
elseif(isset($_SERVER['HTTP_X_COMING_FROM'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_host."";}
elseif(isset($_SERVER['HTTP_COMING_FROM'])){
echo "
<u>Nom d'hote proxy</u> :".$proxy_host."";}
else{ 
echo "";}

}// Fin de la fonction 'ARIHT_affichage_host_proxy ()'.
?>