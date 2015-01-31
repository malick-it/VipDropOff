<?php

/////fonction de suppression des fichiers 
function supprimer($fichier){
    
    if (file_exists($fichier)) {
	
        unlink($fichier);
        return 1;//fichier supprimer
} else {
	return 0;//fichier non supprimer
}
}

/////fonction deplace fichier des fichiers 
function deplacer($fichier,$destination){
    
    if (file_exists($fichier)) {
	copy($fichier,$destination);
        unlink($fichier);
        return 1;//fichier supprimer
} else {
	return 0;//fichier non supprimer
}
}

/////fonction houverture
function houverture($de,$a)
{

$heure=strftime("%H");

  
  
 if($de < $a)
 {
  if($heure>=$de && $heure<$a)
  {
    return"<b style='color:green'>Actuelement ouvert</b>";
  }
  else
  {
    return "<b style='color:red'>Actuelement ferm&#233;e</b>";
  }
 }
 else{
  
  if(($heure>=$de && $heure<23) ||  ($heure>=0 && $heure<$a) )
  {
    return "<b style='color:green'>Actuelement ouvert</b>";
  }
  else
  {
    return "<b style='color:red'>Actuelement ferm&#233;e</b>";
  }
  
 }
 
 



}


 function ilya($iTime) {
                  $temps_ecoule = time() - $iTime;
         //echo $temps_ecoule;
      //echo $temps_ecoule;

$reste=0;
$reste1=0;
$reste1=0;
$jour=0;
$heure=0;
$minute=0;
$heur=0;
$final="";
$jour=round($temps_ecoule/86400,0, PHP_ROUND_HALF_DOWN);
//echo $jour;
$reste=$temps_ecoule%86400;
$heure=round($reste/3600, 0, PHP_ROUND_HALF_DOWN);

$reste1=$reste%3600;
$minute=round($reste1/60, 0, PHP_ROUND_HALF_DOWN);

$reste2=$reste1%60;

if($jour==0 && $heure==0 && $minute==0 && $reste2==0)
{
   $final= '&#224; l\' instant' ;
}
elseif($jour>0 && $heure==0 && $minute==0 && $reste2==0)
{
    if($jour==1)
    {
     $final='depuis hier'  ; 
    }else
    {
        $final="il y a $jour jours";
    }
}
elseif($jour==0 && $heure>0 && $minute==0 && $reste2==0)
{
    $final="il y a  environ $heure heure(s)";
}
elseif($jour>0 && $heure>0 && $minute==0 && $reste2==0)
{
     if($jour==1)
    {
    $final=" depuis hier";
    }
    else
    {
         $final="il y a environ $jour jours et $heure heure(s)";
    }
}
elseif($jour==0 && $heure==0 && $minute>0 && $reste2==0)
{
    $final="il y a environ $minute minute(s)";
}
elseif($jour>0 && $heure==0 && $minute>0 && $reste2==0)
{
    if($jour==1)
    {
     $final=" environ $minute minute(s) DEpuis hier"  ; 
    }else
    {
        $final="il y a environ  $jour jours ";
    }
}
elseif($jour==0 && $heure>0 && $minute>0 && $reste2==0)
{
    $final="il y a  environ $heure heure(s) $minute minute(s)";
}
elseif($jour>0 && $heure>0 && $minute>0 && $reste2==0)
{
    if($jour==1)
    {
     $final=" environ $heure heure(s) et $minute minute(s) depuis hier"  ; 
    }else
    {
        $final="il y a environ $jour jours  $heure heure(s) et $minute minute(s)";
    }
}
elseif($jour==0 && $heure==0 && $minute==0 && $reste2>0)
{
    $final="il y a environ $reste2 seconde(s)";
}
elseif($jour>0 && $heure==0 && $minute==0 && $reste2>0)
{
    if($jour==1)
    {
     $final=" environ $reste2 seconde(s) et depuis hier"  ; 
    }else
    {
        $final="il y a environ $jour jours ";
    }
}
elseif($jour==0 && $heure>0 && $minute==0 && $reste2>0)
{
    $final="il y a environ $heure heure(s) ";
}
elseif($jour==0 && $heure==0 && $minute>0 && $reste2>0)
{
    $final="il y a environ $minute minute(s) et  $reste2 seconde(s)";
}
elseif($jour>0 && $heure==0 && $minute>0 && $reste2>0)
{
    if($jour==1)
    {
     $final="  depuis hier"  ; 
    }else
    {
        $final="il y a environ $jour jours  ";
    }
}
elseif($jour==0 && $heure>0 && $minute>0 && $reste2>0)
{
    $final="il y a  environ $heure heure(s) $minute minute(s) ";
}
else{
   
   if($jour==1)
    {
     $final="  depuis hier"  ; 
    }else
    {
        if($jour<30)
    {
        $final="il y a environ $jour jours  ";
    }
    else
    {
       $tmois=round( $jour/30,0,PHP_ROUND_HALF_DOWN);
       $jour=$jour%30;
       $final="il y a environ $tmois mois et $jour jour(s)";
    }
    } 
      
}
      
     
            
       return $final;             
                }


function apercu($lien){
   $text=$lien;
   $txt2=substr($text,0,23);
             if($txt2=="https://www.youtube.com")
       {
        
     $c='http://img.youtube.com/vi/'.substr($text,32,40).'/0.jpg';
      return $c;
       }
       else
       {
        return 0;
       }
};


/////couleur dominante
function dominant_color($url){
    $i = imagecreatefrompng($url);
    $rTotal  = '';
    $bTotal  = '';
    $gTotal  = '';
    $total = '';
    for ($x=0;$x<imagesx($i);$x++) {
        for ($y=0;$y<imagesy($i);$y++) {
            $rgb = imagecolorat($i, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
    }

}

$r = round($rTotal/$total);
$g = round($gTotal/$total);
$b = round($bTotal/$total);

echo '<img style="float:left;margin-right:5px;" width="63" height="63" src="'.$url.'">';

echo '<div style="float:left;"><div style="font-size:10px;font-family:Verdana;text-align:center;width:300px;padding:5px;margin-bottom:5px;border-radius:5px;border:3px solid;border-color:rgb('.($r-20).','.($g-20).','.($b-20).');background-color:rgb('.$r.','.$g.','.$b.')">Rouge : '.$r.', Vert : '.$g.', Bleu : '.$b.'</div>';

echo '<div style="font-size:10px;font-family:Verdana;text-align:center;width:300px;padding:5px;margin-bottom:5px;border-radius:5px;border:3px solid;border-color:rgb('.($r-20).','.($g-20).','.($b-20).');background-color:rgb('.$r.','.$g.','.$b.')">Url : '.$url.'</div></div>';

}

/*
   Calcule le prix du voyage en fonction de la distance et du nombre de personnes.
*/
function calculerPrix($distance){
  $prixUnit = 2.1;
  //$prixUnitDuParcours = $prixUnit*(2 - 1/$nbPersonnes);
  return  $distance*$prixUnit + 10;
}

/*
   generer le pdf.
*/

function gpdf($contenue,$id,$emplacement)
{
    //'reservations/pdf.html'   
    $content = $contenue;

    require_once('html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);

    //  $pdf->pdf->IncludeJS('print(true)');  
    $html2pdf->Output("$emplacement/$id.pdf",'F') ;
    //$html2pdf->Output("reservation/pdf/$name.pdf");
    return "1";
    //$html2pdf->pdf("reservation/pdf/$name.pdf");
    
   
    
}


?>