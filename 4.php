function hitungParkir($lama_parkir)
{
 $tarif = 2000;  
 if($lama_parkir <=3)
{
    echo $tarif*$lama_parkir;
}
else if($lama_parkir >3) {
    $hasil = ($tarif*3) + (($lama_parkir-3)*1000);
    /*echo $hasil;*/
    if($hasil < 10000)
    {
        echo $hasil;
    }
    else if($hasil > 10000){
        echo 10000;
    }
}

}

hitungParkir(12);
