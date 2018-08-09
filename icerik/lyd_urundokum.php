<?php 
$deger=array();
$onay = "0";
$sil=array();

function idsil($id){

    return ltrim($id,"p");

}

if (g("id") !== "")
{
   
    $k = "u".g("id");
   
    $r = "1";
    $deger[$k]=$r;
    $agac = (query("SELECT * FROM urunagaclari WHERE agac_ust_id = '$k'"));
    while ($agacc = row($agac))
     {  
       
        $m = ($agacc["agac_adet"]*$r);
               
        $deger[$agacc['agac']]= "$m";
        unset($deger[$k]);
    //print_r($deger);
    //echo "<br>";
       
       
       
        
        

    }

    
    foreach ($deger as $a => $b)
     {

    $m = substr($a,0,1);
     if ($m == 'u')
      {
     $onay = "1";
     }
    }
    //echo $onay;


    while ($onay == 1)
     {
      foreach ($deger as $k => $r)
     {  

        //echo $k;
        //echo "<br>";
        $agac = query("SELECT * FROM urunagaclari WHERE agac_ust_id = '$k'");
        
        while ($agacc = row($agac)) 
        {
            
        
        $m = ($agacc["agac_adet"]*$deger[$k]);
               
        $deger[$agacc['agac']]= $deger[$agacc['agac']]+$m;
        $m = substr($k,0,1);
        if ($m == 'u')
        {
        array_push($sil, $k);
        }
        
         //print_r($deger);
         //echo "<br>";
        
       }
       foreach ($sil as $key => $value)
        {
           unset($deger[$value]);
       }
       
        
        

    }
    $onay = "0";
   

    //echo "<br>";
   
    foreach ($deger as $a => $b)
     {

    $m = $a[0];
    if ($m == 'u')
      {
     $onay = "1";
     }
     //echo $m;
    }
    //print_r($deger);
    //echo $onay;
    
    }



    $keys = array_keys($deger);
    $keys = array_map("idsil",$keys);
    $deger = array_values($deger);
    $deger = array_combine($keys,$deger);
    //print_r($deger);

    $tutar = 0;

    foreach ($deger as $key => $val) {

        $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '$key'"));

        //echo $parca["parca_kdv"]."<br>";
        //echo $parca["parca_fiyat"]."<br>";

        $kdv = round(($parca["parca_kdv"] * $parca["parca_fiyat"]) / 100,2);
        $fiyat = round($kdv + $parca["parca_fiyat"],2);

        //echo $kdv."<br>";
        //echo $fiyat."<br>";

        $tutar += round($fiyat * $val,2);

        //echo $tutar."<br>";

    }

    //echo $tutar;


    require "icerik/FPDF/fpdf.php";

    ob_end_clean(); //    the buffer and never prints or returns anything.
    ob_start(); // it starts buffering

    setlocale(LC_ALL, 'tr_TR.UTF-8');

    function turkce($gelen){

        return iconv('utf-8', 'ISO-8859-9', $gelen);

    }

    geri:
    $no = rand(0,999999999);
    $no = "UAD".hanelikod($no,12);

    $query = query("SELECT * FROM dokumanlar WHERE dokuman_no = '$no'");
    if(mysql_affected_rows()){

        goto geri;

    }else{

        query("INSERT INTO dokumanlar SET
            dokuman_no = '$no',
            dokuman_uye_id = '".session("uye_id")."'");

    }

    define("no",$no);

    class myPDF extends FPDF{

        function header(){

            $this->SetTextColor(11,47,94);

            $this->AddFont("Roboto Condensed","","RobotoCondensed-Regular_0.php");
            $this->AddFont("Roboto Condensed B","","RobotoCondensed-Bold_0.php");
            $this->image('http://www.berikamedikal.com.tr/images/Berika.png',180,6,"","15");
            $this->SetFont('Roboto Condensed B','',14);
            $this->Cell(0,5,turkce("ÜRÜN AĞACI DÖKÜMÜ"),0,0,"");
            $this->Ln();
            $this->SetFont('Roboto Condensed','',12);

            $urun = row(query("SELECT * FROM urunler WHERE urun_id = '".g("id")."'"));

            $this->Cell(0,10,turkce($urun["urun_adi"]." - ".$urun["urun_kodu"]),0,0,'');
            $this->Ln(20);



            $this->SetTextColor(0,0,0);
        }
        function footer(){

            $this->SetTextColor(150,150,150);

            $this->SetY(-15);
            $this->SetFont('Roboto Condensed','',8);
            $this->Cell(0,5,'Sayfa '.$this->PageNo().'/{nb}',0,1,'C');
            $this->Cell(0,5,turkce(a("sirket_adres")),0,0,'');
            $this->Cell(0,5,turkce(no." - ".session("uye_adi")." - ".date("d/m/Y")),0,0,'R');

            $this->SetTextColor(0,0,0);
        }
        function headerTable(){

            $this->SetFont('Roboto Condensed B','',10);
            $this->Cell(10,9,turkce("Sıra"),1,0,'C');
            $this->Cell(40,9,'   '.turkce("Parça Kodu"),1,0,'');
            $this->Cell(52,9,'   '.turkce("Parça Adı"),1,0,'');
            $this->Cell(20,9,turkce("Miktar"),1,0,'C');
            $this->Cell(20,9,turkce("KDV %"),1,0,'C');
            $this->Cell(25,9,turkce("Fiyat")."   ",1,0,'R');
            $this->Cell(25,9,turkce("Tutar")."   ",1,0,'R');
            $this->Ln();
        }
        function viewTable($deger){

            $brut = 0;
            $tutar = 0;
            $topkdv = 0;

            $this->SetFont('Roboto Condensed','',10);
            $i = 1;
            foreach ($deger as $key => $val) {

                $parca = row(query("SELECT * FROM parcalar WHERE parca_id = '$key'"));

                $kdv = round(($parca["parca_kdv"] * $parca["parca_fiyat"] * $val) / 100,2);
                $topkdv += $kdv;
                $brut += $parca["parca_fiyat"] * $val;
                $fiyat = round($parca["parca_fiyat"],2);

                $tutar = round($fiyat * $val,2);

                $this->Cell(10, 7, $i, 1, 0, 'C');
                $this->Cell(40, 7, "   ".turkce($parca["parca_kodu"]), 1, 0, '');
                $this->Cell(52, 7, "   ".turkce($parca["parca_adi"]), 1, 0, '');
                $this->Cell(20, 7,ondalik($val), 1, 0, 'C');
                $this->Cell(20, 7,ondalik($parca["parca_kdv"]), 1, 0, 'C');
                $this->Cell(25, 7,ondalik($fiyat)."   ", 1, 0, 'R');
                $this->Cell(25, 7,ondalik($tutar)."   ", 1, 0, 'R');
                $this->Ln();
                $i++;
            }

            $yazi = sayiyiYaziyaCevir($brut + $topkdv, 2, "TL", "Kuruş", "", null, null, null);

            $this->Ln();

            $this->Cell(122, 7, "# ".turkce($yazi)." #", 0, 0, '');
            $this->SetFont('Roboto Condensed B','',10);
            $this->Cell(45, 7,turkce("Brüt Tutar")."   ", 1, 0, 'R');
            $this->SetFont('Roboto Condensed','',10);
            $this->Cell(25, 7,ondalik($brut)."   ", 1, 0, 'R');
            $this->Ln();

            $this->Cell(122, 7, "", 0, 0, 'C');
            $this->SetFont('Roboto Condensed B','',10);
            $this->Cell(45, 7,turkce("Toplam KDV")."   ", 1, 0, 'R');
            $this->SetFont('Roboto Condensed','',10);
            $this->Cell(25, 7,ondalik($topkdv)."   ", 1, 0, 'R');
            $this->Ln();

            $this->Cell(122, 7, "", 0, 0, 'C');
            $this->SetFont('Roboto Condensed B','',10);
            $this->Cell(45, 7,turkce("Genel Toplam")."   ", 1, 0, 'R');
            $this->SetFont('Roboto Condensed','',10);
            $this->Cell(25, 7,ondalik($brut + $topkdv)."   ", 1, 0, 'R');
            $this->Ln();
            $this->Ln();
        }
    }


    $pdf = new myPDF();
    $pdf->SetTitle("BERIKA - $no");
    $pdf->AliasNbPages();
    $pdf->AddPage("",'A4',0);
    $pdf->headerTable();
    $pdf->viewTable($deger);
    $pdf->Output("F",'dosyalar/dokumanlar/'.$no.'.pdf');
    $pdf->Output("I","BERIKA - $no.pdf");

    //ob_end_flush();
  
}else
{
    //echo "id yok";
}




 ?>