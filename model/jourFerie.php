<?php
function paques($Jourj=0, $annee=NULL)
{
    /* *** Algorithme de Oudin, calcul de Pâque postérieure à 1583 ***
     * Transcription pour le langage PHP par david96 le 23/03/2010
     * *** Source : www.concepteursite.com/paques.php ***
     * Attributs de la fonction :
     * $Jourj : représente le jour de la semaine
     * (0=dimanche, 1=lundi...)
     * par défaut c'est le dimanche
     * $annee : représente l'année recherchée pour la date de Pâques
     * par défaut c'est l'année en cours.
     * */
    $annee=($annee==NULL) ? date("Y") : $annee;

    $G = $annee%19;
    $C = floor($annee/100);
    $C_4 = floor($C/4);
    $E = floor((8*$C + 13)/25);
    $H = (19*$G + $C - $C_4 - $E + 15)%30;

    if($H==29)
    {
        $H=28;
    }
    elseif($H==28 && $G>10)
    {
        $H=27;
    }
    $K = floor($H/28);
    $P = floor(29/($H+1));
    $Q = floor((21-$G)/11);
    $I = ($K*$P*$Q - 1)*$K + $H;
    $B = floor($annee/4) + $annee;
    $J1 = $B + $I + 2 + $C_4 - $C;
    $J2 = $J1%7; //jour de pâques (0=dimanche, 1=lundi....)
    $R = 28 + $I - $J2; // résultat final :)
    $mois = $R>30 ? 4 : 3; // mois (1 = janvier, ... 3 = mars...)
    $Jour = $mois==3 ? $R : $R-31;

    return mktime(0,0,0,$mois,$Jour+$Jourj,$annee);
}
	
function dimanche_paques($annee)
{
	return date("Y-m-d", easter_date($annee));
}
//function vendredi_saint($annee)
//{
//	$dimanche_paques = dimanche_paques($annee);
//	return date("Y-m-d", strtotime("$dimanche_paques -2 day"));
//}
function lundi_paques($annee)
{
	$dimanche_paques = date("Y-m-d",paques(0,$annee));
	return date("Y-m-d", strtotime("$dimanche_paques +1 day"));
}
function jeudi_ascension($annee)
{
	$dimanche_paques = date("Y-m-d",paques(0,$annee));
	return date("Y-m-d", strtotime("$dimanche_paques +39 day"));
}
function lundi_pentecote($annee)
{
	$dimanche_paques = date("Y-m-d",paques(0,$annee));
	return date("Y-m-d", strtotime("$dimanche_paques +50 day"));
}


function jours_feries($annee)
{
    $annee1 = $annee + 1;
	$jours_feries = array
	(    date("Y-m-d",paques(0,$annee))
	,    lundi_paques($annee)
	,    jeudi_ascension($annee)
	,    lundi_pentecote($annee)
	
	,    "$annee-01-01"        //    Nouvel an
	,    "$annee-05-01"        //    Fête du travail
	,    "$annee-05-08"        //    Armistice 1945
	,    "$annee-07-14"        //    Fête nationale
	,    "$annee-08-15"        //    Assomption
	,    "$annee-11-11"        //    Armistice 1918
	,    "$annee-11-01"        //    Toussaint
	,    "$annee-12-25"        //    Noël
	,    "$annee1-01-01"        //    Nouvel an Annee +1
	);
	sort($jours_feries);
	return $jours_feries;
}

