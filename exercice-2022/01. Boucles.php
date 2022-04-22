
  <?php  
//Exercice  1
//Afficher  des  nombres  allant  de  1  à  100.
    
        $i = 0;
        $max = 101;
        while($i < $max) {
            if($i != $max-1)
                echo "$i---";
            else
                echo $i;
            $i++;
        }

        echo"<br>";

        
        
       
//Exercice  2
//Afficher  des  nombres  allant  de  1  à  100  avec  le  chiffre  50  en  rouge.
    
for ($i = 1; ; $i++){
    if($i > 100){
        break;
    }
    echo $i. '<br>';
    if($i==50){
        echo "<font color='red'>".$i."</font><br>";
    }
}


//Exercice  3 
//Afficher  des  nombres  allant  de  2000  à  1930.
//
for ($i = 2000; ; $i--){
    if($i>1930){
        break;
    }
}

//Exercice  4
//Afficher  le  titre  suivant  100  fois  :  <h1>Titre  à  afficher  100  fois</h1>
//

for ($i=0; $i<100; $i++){
    echo "<h1>Titre  à  afficher  100  fois</h1>";
}


//Exercice  5
//Afficher  le  titre  suivant  "<h1>Je  m\'affiche  pour  la  Nème  fois</h1>".Remplacer  le  N  avec  la  valeur  de  $i (valeur de votre choix)  (tour  de  boucle).
for ($i=0; $i<5; $i++){
    echo"<h1>Je  m\'affiche  pour  la  '. $i.'Nème  fois</h1>";
}


?>