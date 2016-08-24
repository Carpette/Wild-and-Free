<html>

	<head>
	<meta http-equiv="Content-Type"
	content="text/html; charset=iso-8859-1">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">
	<title></title>
	</head>
	<body>
	<?php

	include ('arith.lib.php');

require("config.txt");

$ext = "php";

function UpCaseAllSp($s)
{
	$s=ereg_replace("à","A",$s);
	$s=ereg_replace("â","A",$s);
	$s=ereg_replace("ä","A",$s);
	$s=ereg_replace("é","E",$s);
	$s=ereg_replace("è","E",$s);
	$s=ereg_replace("ê","E",$s);
	$s=ereg_replace("ë","E",$s);
	$s=ereg_replace("î","I",$s);
	$s=ereg_replace("ï","I",$s);
	$s=ereg_replace("ô","O",$s);
	$s=ereg_replace("ö","O",$s);
	$s=ereg_replace("ù","U",$s);
	$s=ereg_replace("ü","U",$s);
	$s=ereg_replace("û","U",$s);
	$s=ereg_replace(";",".,",$s);
	$s=strtoupper($s);
	return $s;
}

function microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

function stringpos($c,$s)
{
	global $ext;

	$posi=strpos($s,$c);
	if ($ext!='php3')
	{
		if ($posi===FALSE)
		{
			$posi=-1;
		}
	}
	else {
		if (is_string($posi) && !$posi)
		{
			$posi=-1;
		}
	}
	return $posi;
}

function stringalignsx($s)
{
	$res=chr(ord($s)-1);
	return $res;
}

function stringalignsy($s)
{
	$res=chr(ord($s)+1);
	return $res;
}

function stringcopy($s,$p,$l)
{
	$res=substr($s,$p-1,$l);
	return $res;
}

function stringlength($s)
{
	$res=strlen($s);
	return $res;
}

function conv0($t)
{
	if (strlen($t) == 1)
	{
		$t="0".$t;
	}
	return $t;
}

function GetString(&$r)
{
	if (stringpos("+",$r)>=0)
	{
		$res=stringcopy($r,1,stringpos("+",$r)-1);
		$r=stringcopy($r,stringpos("+",$r)+1,stringlength($r));
	}
	else
	{
		$res=$r;
		$r="";
	}
	return $res;
}

function addLineNumber($don)
{
	if (file_exists($don))
	{
		$fic=file($don);
		reset($fic);
		$i=0;
		while ($val=each($fic))
		{
			$ligne=$val[1];
			$i++;
			$result[]=$ligne.";".$i;
		}
	}
	return $result;
}

function secure($chaine)
{
	return htmlspecialchars($chaine);
}

function PrepPage(&$Ficw)
{
}

function CountPages(&$Ficw,$nmestot,$nmes,&$npag,$mot,$nofb,$nof,$Idx)
{
	global $ext,$fnnpg,$ftnpg,$fcnpg,$fnpgc,$ftpgc,$fcpgc;
	$s0='';$nn=3;

	if ($nmestot>$nmes)
	{
		if ($npag=="") { $npag=1; }
		$nbpage=$nmestot/$nmes;
		if (($nmestot%$nmes)!=0) { $nbpage++; }
		$Ficw[]="<CENTER>";
		$Ficw[]="<TABLE WIDTH=90% BORDER=1 CELLPADDING=4 CELLSPACING=0 FRAME=HSIDES>";
		$Ficw[]="<COL WIDTH=256*>";
		$Ficw[]="<TR>";
		$Ficw[]="<TD WIDTH=100%>";
		$Ficw[]="<P ALIGN=CENTER>";
		if ($mot=="") { $adr="livredor.$ext?action=readall";}
		else {$adr="livredor.$ext?action=read&mots=$mots";}

		$fnpag="<FONT FACE=$fnnpg><FONT SIZE=\"$ftnpg\"><FONT COLOR=\"$fcnpg\">";
		$fpagc="<FONT FACE=$fnpgc><FONT SIZE=\"$ftpgc\"><FONT COLOR=\"$fcpgc\"><B>";
		$Ficw[]=$fpagc."Page ".$nofb;
		$pgsuiv=$npag+1;
		$pgprec=$npag-1;
		if ($npag!=1)
		{
			$Ficw[]="<a href=\"$adr&npag=$pgprec\">".$fnpag."<<".$nof."</a> ";
		}
		for ($i=1;$i<=$nbpage;$i++)
		{
			if ($i!=$npag)
			{
				$Ficw[]="<a href=\"$adr&npag=$i\">".$fnpag.$i.$nof."</a> ";
			}
			else
			{
				$Ficw[]=$fpagc."$i ".$nofb;
			}
		}
		if ($npag!=$nbpage)
		{
			$Ficw[]=" <a href=\"$adr&npag=$pgsuiv\">".$fnpag.">>".$nof."</a>";
		}
		$Ficw[]="</P>";
		$Ficw[]="</TD>";
		$Ficw[]="</TR>";
		$Ficw[]="</TABLE>";
		$Ficw[]="</CENTER>";
		$Ficw[]="<BR>";
	}
	else
	{
		$fnpag="<FONT FACE=$fnnpg><FONT SIZE=\"$ftnpg\"><FONT COLOR=\"$fcnpg\">";
		$fpagc="<FONT FACE=$fnpgc><FONT SIZE=\"$ftpgc\"><FONT COLOR=\"$fcpgc\"><B>";
	}
	if ($Idx!=0)
	{
		for ($i=0;$i<=$nn;$i++)
		{
			$Ficw[]=$Ficw[$Idx+$i];
			$Ficw[$Idx+$i]=$s0;
		}
		$ficw[]=$fpagc."Page ".$nofb;
		$ficw[]="</P>";
		$ficw[]="</TD>";
		$ficw[]="</TR>";
		$ficw[]="</TABLE>";
		$ficw[]="</CENTER>";
		$ficw[]="<BR>";
	}
}

function limit($s,$max)
{
	$split=split(" ",$s);
	$nmots=count($split);
	$so="";
	for ($i=0;$i<$nmots;$i++)
	{
		$url=($i>0) && ($split[$i-1]=="<a") &&
			(stringpos("href=",$split[$i])==0);
		if ((!$url) && (strlen($split[$i])>$max))
		{
			$nbm=(strlen($split[$i])/$max)+1;
			$mot=stringcopy($split[$i],1,$max);
			for ($j=1;$j<=$nbm;$j++)
			{
				$mot=$mot." ".stringcopy($split[$i],$j*$max+1,$max);
			}
			$split[$i]=$mot;
		}
		if ($i==0) {$so=$split[$i];}
		else {$so=$so." ".$split[$i];}
	}
	return $so;
}

function CreatePage($mots,$res,$SearchResult,$npag)
{
	global  $ltab,$tbord,$nmes,$nmax,
		$tbcel1,$lcel2,$tbcel2,$lcel3,$tbcel3,$tbcel4,
		$cfond,$cbord,$cbclair,$cbfonce,$cbbckimg,$cfdat,$cbdat,$cbcdat,$cbfdat,
		$cfnom,$cbnom,$cbcnom,$cbfnom,$cfurl,$cburl,$cbcurl,$cbfurl,
		$cftxt,$cbtxt,$cbctxt,$cbftxt,
		$fccompt,$ftcompt,$fncompt,$fcsign,$ftsign,$fnsign,
		$fcnom,$ftnom,$fnnom,$fcurl,$fturl,$fnurl,
		$fctxt,$fttxt,$fntxt,$anbm,$fcnumm,$fnnumm,$ftnumm,
		$fcnpg,$ftnpg,$fnnpg,$fcpgc,$ftpgc,$fnpgc,$ext;
	$ac="bob";$bc="ff/gs";
	$Ficw=file($res);
	end($Ficw);

	$Ficw[]="<P ALIGN=$anbm STYLE=\"text-decoration: none\"><FONT COLOR=\"$fccompt\">".
		"<FONT FACE=\"$fncompt\"><FONT SIZE=$ftcompt><B>".count($SearchResult);

	$Ficw[]=" parties en cours</B></FONT></FONT></FONT></P>";

	$nofb="</B></FONT></FONT></FONT>";
	$nof="</FONT></FONT></FONT>";

	$fsign="<FONT FACE=$fnsign><FONT SIZE=\"$ftsign\"><FONT COLOR=\"$fcsign\">";
	$fnumm="<FONT FACE=$fnnumm><FONT SIZE=\"$ftnumm\"><FONT COLOR=\"$fcnumm\">";
	$fnom="<FONT FACE=$fnnom><FONT SIZE=\"$ftnom\"><FONT COLOR=\"$fcnom\"><B>";
	$fip="<FONT FACE=$fnnom><FONT SIZE=\"0\"><FONT COLOR=\"$fcnom\">";
	$furl="<FONT FACE=$fnurl><FONT SIZE=\"$fturl\"><FONT COLOR=\"$fcurl\"><B>";
	$ftxt="<FONT FACE=\"$fntxt\"><FONT SIZE=$fttxt><FONT COLOR=\"$fctxt\">";

	$ptab="border=\"$tbord\" width=\"$ltab\" bgcolor=\"$cfond\" bordercolor=\"$cbord\"
		bordercolordark=\"$cbfonce\" bordercolorlight=\"$cbclair\"";
	//no background
	$pcel1="bgcolor=\"$cfdat\" bordercolor=\"$cbdat\"
		bordercolordark=\"$cbfdat\" bordercolorlight=\"$cbcdat\"";
	$pcel23="bgcolor=\"$cfnom\" bordercolor=\"$cbnom\"
		bordercolordark=\"$cbfnom\" bordercolorlight=\"$cbcnom\"";
	$pcel2="width=\"$lcel2\" bgcolor=\"$cfnom\" bordercolor=\"$cbnom\"
		bordercolordark=\"$cbfnom\" bordercolorlight=\"$cbcnom\"";
	$pcel3="width=\"$lcel3\" bgcolor=\"$cfurl\" bordercolor=\"$cburl\"
		bordercolordark=\"$cbfurl\" bordercolorlight=\"$cbcurl\"";
	$pcel4="width=\"100%\" bgcolor=\"$cftxt\" bordercolor=\"$cbtxt\"
		bordercolordark=\"$cbftxt\" bordercolorlight=\"$cbctxt\"";

	$nmestot=count($SearchResult);
	CountPages($Ficw,$nmestot,$nmes,$npag,$mot,$nofb,$nof,$idx);
	$bi=($npag-1)*$nmes;
	$bs=$npag*$nmes;
	for ($i=$nmestot-1;$i>=0;$i--)
	{
		$ii=$nmestot-$i;
		if ( ($npag=="") || (($bi<$ii) && ($ii<=$bs)) )
		{
			$atab=split(";",$SearchResult[$i],13);
			$id=$atab[0];
			$date=$atab[1];
			$nom=str_replace(".,",";",$atab[2]);
			$nom=limit($nom,40);
			$texte=limit($texte,90);
			$ip=$atab[3];
			$num=$atab[10];
			$href="livredor.$ext?action=edit&idligne=$num";
			$Ficw[]="<CENTER>";
			$Ficw[]="<table $ptab>";
			$Ficw[]="<tr>";
			$Ficw[]="<td width=\"$lcel1\" $pcel1><p align=\"left\">".$fnumm.$id.$nof."</p></td>";
			$Ficw[]="<td width=\"$lcel2\" $pcel1><p align=\"left\">".$fsign.$date.$nof."</p></td>";
			$Ficw[]="<td width=\"$lcel3\" $pcel1><p align=\"right\">"."<a href=$href>".$fnumm.$num.$nof."</a></p></td>";
			$Ficw[]="</tr>";
			$Ficw[]="<tr>";
			if (strtoupper($url)=="HTTP://") {$url="";}
			$ucnom=UpCaseAllSp($nom);

			$wmi="";

			if ($ip!="")
			{
				$iptab=explode(".",$ip);
				$ip=$fip." (".$ip.")".$nof;
			}

			$Ficw[]="<td colspan=\"2\" $pcel23>".$wmi.$fnom.$nom.$nofb.$ip."</td>";

			$Ficw[]="</tr>";
			$Ficw[]="</table>";
			$Ficw[]="</CENTER>";

			$Ficw[]="<BR>";
		}
	}
	CountPages($Ficw,$nmestot,$nmes,$npag,$mot,$nofb,$nof,$Idx);
	return $Ficw;
}

function convert($ligne,$secureit,$wm)
{
	$inter="";
	if ($ligne!="")
	{
		$bold=false;$under=false;$ital=false;
		if ($secureit) {$ligne=secure($ligne);}
		for ($i=0;$i<stringlength($ligne);$i++)
		{
			$add=$ligne[$i];
			if ($ligne[$i]==";")
			{
				$add=".,";
			}
			if ($ligne[$i]=="\r")
			{
				$add="<BR>";
				if ($bold)  { $add="</B>" .$add;  $bold=false; }
				if ($under) { $add="</U>" .$add; $under=false; }
				if ($ital)  { $add="</EM>".$add;  $ital=false; }
				$i++; // pour sauter le #10
			}
			if ($ligne[$i]=="$")
			{
				$i++;
				$c=strtoupper($ligne[$i]);
				if ($c=="G") { $add="<B>" ; $bold=true; }
				if ($c=="S") { $add="<U>" ;$under=true; }
				if ($c=="I") { $add="<EM>"; if (!$wm) {$ital=true;} }
				if (($c!="G")&&($c!="S")&&($c!="I")) { $add="$";$i--; }
			}
			if ($ligne[$i]==" ")
			{
				if ($bold)  { $add="</B>" .$add;  $bold=false; }
				if ($under) { $add="</U>" .$add; $under=false; }
				if ($ital)  { $add="</EM>".$add;  $ital=false; }
			}
			$inter=$inter.$add;
		}
		$add="";
		if ($bold)  { $add="</B>" ;  $bold=false; }
		if ($under) { $add="</U>" ; $under=false; }
		if ($ital)  { $add="</EM>";  $ital=false; }
		$inter=$inter.$add;
		$inter=StripSlashes($inter);
	}
	return $inter;
}

function produceHTML($f)
{
	$fic=file($f);
	reset($fic);
	while ($val=each($fic))
	{
		echo "$val[1]";
	}
}

function echopage($page)
{
	reset($page);
	if (stringpos('http',$page[count($page)-3])==-1) {PrepPage($page);}
	while ($val=each($page))
	{
		echo "$val[1]";
	}
}

function deletec($don,$idligne,$edit)
{
	$fic=file($don);
	$ficw=fopen($don,"w+");
	$nl=count($fic);
	reset($fic);
	$i=0;
	$direct_ip = ARIHT_getipreelle();
	while ($val=each($fic))
	{
		$i++;

		$atab=split(";",$val[1],13);
		if ($atab[0]!=$idligne)
		{
			$s=$val[1];
			fwrite($ficw,$s);
		}
		else
		{
			if ($atab[3]!=$direct_ip )
			{
				$s=$val[1];
				fwrite($ficw,$s);
			}
			else
			{
				$last=($i==$nl);
				echo "<p><font face=\"Arial\">Destruction de la ligne : <em>$atab[0]</em></font></p>";
			}
		}
	}
	fclose($ficw);

	if ($last)
	{
		$fic=file($don);
		$ficw=fopen($don,"w+");
		$nl=count($fic);
		reset($fic);
		$i=0;
		while ($val=each($fic))
		{
			$i++;
			$s=$val[1];
			if ($i==$nl) {$s=trim($s);}
			fwrite($ficw,$s);
		}
		fclose($ficw);
	}
	if ($edit!="edit")
	{
		echo "<HR size=\"1\">";
		echo "<BR>";
	}
}

function deletePrevious($don,$localIp)
{
	$fic=file($don);
	$ficw=fopen($don,"w+");
	$nl=count($fic);
	reset($fic);
	$i=0;
	$direct_ip = ARIHT_getipreelle();
	while ($val=each($fic))
	{
		$i++;

		$atab=split(";",$val[1],13);
		if ($atab[4]!=$localIp)
		{
			$s=$val[1];
			fwrite($ficw,$s);
		}
		else
		{
			if ($atab[3]!=$direct_ip )
			{
				$s=$val[1];
				fwrite($ficw,$s);
			}
			else
			{
				$last=($i==$nl);
			}
		}
	}
	fclose($ficw);

	if ($last)
	{
		$fic=file($don);
		$ficw=fopen($don,"w+");
		$nl=count($fic);
		reset($fic);
		$i=0;
		while ($val=each($fic))
		{
			$i++;
			$s=$val[1];
			if ($i==$nl) {$s=trim($s);}
			fwrite($ficw,$s);
		}
		fclose($ficw);
	}
}

function UpDBase($don)
{
	if (file_exists($don))
	{
		$fic=file($don);
		reset($fic);
		$val=each($fic);
		$minTime=microtime_float()-(360.0);

		$ficw=fopen($don,"w+");
		reset($fic);
		$i=0;
		while ($val=each($fic))
		{
			$i++;
			$s=$val[1];
			$atab=split(";",$s,13);
			if ($atab[0]>$minTime)
			{
				fwrite($ficw,$s);
			}
		}
		fclose($ficw);
	}
}

function CleanName($s)
{
	$s=str_replace("à","A",$s);
	$s=str_replace("â","A",$s);
	$s=str_replace("ä","A",$s);
	$s=str_replace("é","E",$s);
	$s=str_replace("è","E",$s);
	$s=str_replace("ê","E",$s);
	$s=str_replace("ë","E",$s);
	$s=str_replace("î","I",$s);
	$s=str_replace("ï","I",$s);
	$s=str_replace("ô","O",$s);
	$s=str_replace("ö","O",$s);
	$s=str_replace("ù","U",$s);
	$s=str_replace("ü","U",$s);
	$s=str_replace("û","U",$s);
	$s=str_replace("!","-",$s);
	$s=str_replace("?","-",$s);
	$s=str_replace(":","-",$s);
	$s=str_replace("\n","-",$s);
	$s=str_replace(" ","-",$s);
	$s=str_replace("\r","-",$s);
	$s=str_replace(";","-",$s);

	$s=strtoupper($s);
	return $s;
}

// ------------------------- MAIN

ignore_user_abort(true);
UpDBase($don);

$paramTab=explode(":",$_SERVER['QUERY_STRING']);
$nbParam = count($paramTab);

$action="readall";

if($nbParam>0)
{
	$action=$paramTab[0];
}

$res=$res1;

if ($action=="wimi")
{
	$direct_ip = ARIHT_getipreelle();
	echo "~".$direct_ip."~";
}

if ($action=="add")
{
	$nom="server";
	$localIp="255.255.255.255";
	$lanOnly="0";

	if($nbParam>1)
	{
		$nom=$paramTab[1];
		$clean=CleanName($nom);
		$nom=$clean;
	}

	if($nbParam>2)
	{
		$localIp=$paramTab[2];
	}
	if($nbParam>3)
	{
		$lanOnly=$paramTab[3];
	}

	deletePrevious($don,$localIp);

	if ($nom!="")
	{
		if (file_exists($don))
		{
			$rc="\r\n";
			$fic=file($don);
			reset($fic);
			$max=$nmes*$nmax;
			if (count($fic)==$max)
			{
				next($fic);
				$ficw=fopen($don,"w+");
				while ($val=each($fic))
				{
					fwrite($ficw,$val[1]);
				}
			}
			else { $ficw=fopen($don,"a+");
			}
		}
		else
		{
			$rc="";
			$ficw=fopen($don,"w+");
		}

		$id=microtime_float();
		$direct_ip = ARIHT_getipreelle();
		$date=gmdate("d/m/Y H:i",time());
		fwrite($ficw,$rc.$id.";".$date.";".convert($nom,true,false).";".$direct_ip.";".$localIp.";".$lanOnly.";;;;");
		fclose($ficw);

		echo "~".$id."~";

		//stats

		if (file_exists($stat))
		{
			$fic=file($stat);
			reset($fic);
			$ficw=fopen($stat,"w+");
			$val=each($fic);
			$snbServ=$val[1];
		}
		else
		{
			$snbServ=0;
			$ficw=fopen($stat,"w+");
		}

		$snbServ++;

		fwrite($ficw,$snbServ);
		fclose($ficw);
	}
}

if ($action=="delete")
{
	$idligne="";

	if($nbParam>1)
	{
		$idligne=$paramTab[1];
	}

	if ($idligne=="")
	{
		echo "<p><font face=\"Arial\">Manque idligne</font></p>";
	}
	else
	{
		deletec($don,$idligne,$edit);
	}
}

if ($action=="readall")
{
	$result=addLineNumber($don);
	$page=CreatePage($mots,$res,$result,$npag);
	echopage($page);
}

?>
	</body>
	</html>