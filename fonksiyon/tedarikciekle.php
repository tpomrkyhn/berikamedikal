<?

require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";

if(p("musteriAdi") == "" || p("musteriKodu") == ""){

    echo "eksik";


}else {

    $eklehazir = $pdo->prepare("INSERT INTO sirketler SET
                                        sirket_tip = 'tedarikci',
                                        musteri_adi = :musteriAdi,
                                        musteri_unvani = :musteriUnvani,
                                        musteri_kodu = :musteriKodu,
                                        musteri_bilgi = :musteriBilgi,
                                        musteri_vergi_dairesi = :musteriVergiDairesi,
                                        musteri_vergi_no = :musteriVergiNo,
                                        musteri_ulke = :musteriUlke,
                                        musteri_il = :musteriIl,
                                        musteri_ilce = :musteriIlce,
                                        musteri_adres = :musteriAdres,
                                        musteri_telefon = :musteriTelefon,
                                        musteri_fax = :musteriFax,
                                        musteri_mail = :musteriMail,
                                        musteri_web = :musteriWeb,
                                        musteri_iban = :musteriIban,
                                        musteri_ek_kullandigi_marka = :musteriEkKullandigiMarka,
                                        musteri_ek_yatak_sayisi = :musteriEkYatakSayisi,
                                        musteri_ek_sermaye = :musteriEkSermaye,
                                        musteri_ek_banka_limiti = :musteriEkBankaLimiti,
                                        musteri_ek_cek_guvenilirligi = :musteriEkCekGuvenligi,
                                        musteri_ek_not1 = :musteriEkNot1,
                                        musteri_ek_not2 = :musteriEkNot2,
                                        musteri_yetkili = :musteriYetkili
                                        ");

    $ekle = $eklehazir->execute(array(
        "musteriAdi" => p("musteriAdi"),
        "musteriUnvani" => p("musteriUnvani"),
        "musteriKodu" => p("musteriKodu"),
        "musteriBilgi" => p("musteriBilgi"),
        "musteriVergiDairesi" => p("musteriVergiDairesi"),
        "musteriVergiNo" => p("musteriVergiNo"),
        "musteriUlke" => p("musteriUlke"),
        "musteriIl" => p("musteriIl"),
        "musteriIlce" => p("musteriIlce"),
        "musteriAdres" => p("musteriAdres"),
        "musteriTelefon" => p("musteriTelefon"),
        "musteriFax" => p("musteriFax"),
        "musteriMail" => p("musteriMail"),
        "musteriWeb" => p("musteriWeb"),
        "musteriIban" => p("musteriIban"),
        "musteriEkKullandigiMarka" => p("musteriEkKullandigiMarka"),
        "musteriEkYatakSayisi" => p("musteriEkYatakSayisi"),
        "musteriEkSermaye" => p("musteriEkSermaye"),
        "musteriEkBankaLimiti" => p("musteriEkBankaLimiti"),
        "musteriEkCekGuvenligi" => p("musteriEkCekGuvenligi"),
        "musteriEkNot1" => p("musteriEkNot1"),
        "musteriEkNot2" => p("musteriEkNot2"),
        "musteriYetkili" => p("musteriYetkili")
    ));

    if ($ekle) {

        echo $pdo->lastInsertId();

    }else{

        echo "hata";

    }

}

?>