<?php
/*  lydSoft by Tayyip Oto GMBH
    www.lydsoft.net
    Ömer Necmi KAYHAN - Genel Müdür
    Copyright 2017   */

	date_default_timezone_set('Europe/Istanbul');

	function p($par, $st = false){
		if ($st)
		{
			return htmlspecialchars(addslashes(trim($_POST[$par])));
		}
		else
		{
			return addslashes(trim($_POST[$par]));
		}
	}

	function g($par){
		return strip_tags(trim(addslashes($_GET[$par])));
	}

	function kisalt($par, $uzunluk = 50 ){
		if (strlen($par) > $uzunluk ){
			$par = mb_substr($par, 0, $uzunluk, "UTF-8")."...";
		}
	}

	function go($par, $time = 0){

        if ($time == 0){
            header("Location: {$par}");
        }
        else{
            header("Refresh: {$time}; url={$par}");
        }

	}

	function session($par){
		if ($_SESSION[$par]){
			return $_SESSION[$par];
		}
		else{
			return false;
		}
	}

	function ss($par){
		return stripslashes($par);
	}

	function session_olustur($par){
		foreach ($par as $anahtar => $deger){
			$_SESSION[$anahtar] = $deger;
		}
	}

	function sefflink($str, $options = array())
	{
		$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
		$defaults = array(
			'delimiter' => '-',
			'limit' => null,
			'lowercase' => true,
			'replacements' => array(),
			'transliterate' => true
		);
		$options = array_merge($defaults, $options);
		$char_map = array(
			// Latin
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
			'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
			'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
			'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
			'ß' => 'ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
			'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
			'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
			'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
			'ÿ' => 'y',
			// Latin symbols
			'©' => '(c)',
			// Greek
			'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
			'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
			'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
			'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
			'Ϋ' => 'Y',
			'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
			'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
			'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
			'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
			'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
			// Turkish
			'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
			'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
			// Russian
			'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
			'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
			'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
			'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
			'Я' => 'Ya',
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
			'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
			'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
			'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
			'я' => 'ya',
			// Ukrainian
			'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
			'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
			// Czech
			'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
			'Ž' => 'Z',
			'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
			'ž' => 'z',
			// Polish
			'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
			'Ż' => 'Z',
			'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
			'ż' => 'z',
			// Latvian
			'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
			'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
			'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
			'š' => 's', 'ū' => 'u', 'ž' => 'z'
		);
		$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
		if ($options['transliterate']) {
			$str = str_replace(array_keys($char_map), $char_map, $str);
		}
		$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
		$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
		$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
		$str = trim($str, $options['delimiter']);
		return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
	}

	function query($query){
		return mysql_query($query);
	}

	function row($query){
		return mysql_fetch_array($query);
	}

	function rows($query){
		return mysql_num_rows($query);
	}

	function a($gelen){

		return row(query("SELECT * FROM ayarlar"))[$gelen];

	}

	function sayiyiYaziyaCevir($sayi, $kurusbasamak, $parabirimi, $parakurus, $diyez, $bb1, $bb2, $bb3)
	{
	// kurusbasamak virgülden sonra gösterilecek basamak sayısı
	// parabirimi = TL gibi , parakurus = Kuruş gibi
	// diyez başa ve sona kapatma işareti atar # gibi

		$b1 = array("", "bir", "iki", "üç", "dört", "beş", "altı", "yedi", "sekiz", "dokuz");
		$b2 = array("", "on", "yirmi", "otuz", "kırk", "elli", "altmış", "yetmiş", "seksen", "doksan");
		$b3 = array("", "yüz", "bin", "milyon", "milyar", "trilyon", "katrilyon");

		if ($bb1 != null) { // farklı dil kullanımı yada farklı yazım biçimi için
			$b1 = $bb1;
		}
		if ($bb2 != null) { // farklı dil kullanımı
			$b2 = $bb2;
		}
		if ($bb3 != null) { // farklı dil kullanımı
			$b3 = $bb3;
		}

		$say1 = "";
		$say2 = ""; // say1 virgül öncesi, say2 kuruş bölümü
		$sonuc = "";

		$sayi = str_replace(",", ".", $sayi); //virgül noktaya çevrilir

		$nokta = strpos($sayi, "."); // nokta indeksi

		if ($nokta > 0) { // nokta varsa (kuruş)

			$say1 = substr($sayi, 0, $nokta); // virgül öncesi
			$say2 = substr($sayi, $nokta, strlen($sayi)); // virgül sonrası, kuruş

		} else {
			$say1 = $sayi; // kuruş yoksa
		}

		$son;
		$w = 1; // işlenen basamak
		$sonaekle = 0; // binler on binler yüzbinler vs. için sona bin (milyon,trilyon...) eklenecek mi?
		$kac = strlen($say1); // kaç rakam var?
		$sonint; // işlenen basamağın rakamsal değeri
		$uclubasamak = 0; // hangi basamakta (birler onlar yüzler gibi)
		$artan = 0; // binler milyonlar milyarlar gibi artışları yapar
		$gecici;

		if ($kac > 0) { // virgül öncesinde rakam var mı?

			for ($i = 0; $i < $kac; $i++) {

				$son = $say1[$kac - 1 - $i]; // son karakterden başlayarak çözümleme yapılır.
				$sonint = $son; // işlenen rakam Integer.parseInt(

				if ($w == 1) { // birinci basamak bulunuyor

					$sonuc = $b1[$sonint] . $sonuc;

				} else if ($w == 2) { // ikinci basamak

					$sonuc = $b2[$sonint] . $sonuc;

				} else if ($w == 3) { // 3. basamak

					if ($sonint == 1) {
						$sonuc = $b3[1] . $sonuc;
					} else if ($sonint > 1) {
						$sonuc = $b1[$sonint] . $b3[1] . $sonuc;
					}
					$uclubasamak++;
				}

				if ($w > 3) { // 3. basamaktan sonraki işlemler

					if ($uclubasamak == 1) {

						if ($sonint > 0) {
							$sonuc = $b1[$sonint] . $b3[2 + $artan] . $sonuc;
							if ($artan == 0) { // birbin yazmasını engelle
								$sonuc = str_replace($b1[1] . $b3[2], $b3[2], $sonuc);
							}
							$sonaekle = 1; // sona bin eklendi
						} else {
							$sonaekle = 0;
						}
						$uclubasamak++;

					} else if ($uclubasamak == 2) {

						if ($sonint > 0) {
							if ($sonaekle > 0) {
								$sonuc = $b2[$sonint] . $sonuc;
								$sonaekle++;
							} else {
								$sonuc = $b2[$sonint] . $b3[2 + $artan] . $sonuc;
								$sonaekle++;
							}
						}
						$uclubasamak++;

					} else if ($uclubasamak == 3) {

						if ($sonint > 0) {
							if ($sonint == 1) {
								$gecici = $b3[1];
							} else {
								$gecici = $b1[$sonint] . $b3[1];
							}
							if ($sonaekle == 0) {
								$gecici = $gecici . $b3[2 + $artan];
							}
							$sonuc = $gecici . $sonuc;
						}
						$uclubasamak = 1;
						$artan++;
					}

				}

				$w++; // işlenen basamak

			}
		} // if(kac>0)

		if ($sonuc == "") { // virgül öncesi sayı yoksa para birimi yazma
			$parabirimi = "";
		}

		$say2 = str_replace(".", "", $say2);
		$kurus = "";

		if ($say2 != "") { // kuruş hanesi varsa

			if ($kurusbasamak > 3) { // 3 basamakla sınırlı
				$kurusbasamak = 3;
			}
			$kacc = strlen($say2);
			if ($kacc == 1) { // 2 en az
				$say2 = $say2 . "0"; // kuruşta tek basamak varsa sona sıfır ekler.
				$kurusbasamak = 2;
			}
			if (strlen($say2) > $kurusbasamak) { // belirlenen basamak kadar rakam yazılır
				$say2 = substr($say2, 0, $kurusbasamak);
			}

			$kac = strlen($say2); // kaç rakam var?
			$w = 1;

			for ($i = 0; $i < $kac; $i++) { // kuruş hesabı

				$son = $say2[$kac - 1 - $i]; // son karakterden başlayarak çözümleme yapılır.
				$sonint = $son; // işlenen rakam Integer.parseInt(

				if ($w == 1) { // birinci basamak

					if ($kurusbasamak > 0) {
						$kurus = $b1[$sonint] . $kurus;
					}

				} else if ($w == 2) { // ikinci basamak
					if ($kurusbasamak > 1) {
						$kurus = $b2[$sonint] . $kurus;
					}

				} else if ($w == 3) { // 3. basamak
					if ($kurusbasamak > 2) {
						if ($sonint == 1) { // 'biryüz' ü engeller
							$kurus = $b3[1] . $kurus;
						} else if ($sonint > 1) {
							$kurus = $b1[$sonint] . $b3[1] . $kurus;
						}
					}
				}
				$w++;
			}
			if ($kurus == "") { // virgül öncesi sayı yoksa para birimi yazma
				$parakurus = "";
			} else {
				$kurus = $kurus . " ";
			}
			$kurus = $kurus . $parakurus; // kuruş hanesine 'kuruş' kelimesi ekler
		}

		$sonuc = $diyez . $sonuc . " " . $parabirimi . " " . $kurus . $diyez;
		return $sonuc;
	}

	function telefon($gelen){

		return "0.".$gelen[0].$gelen[1].$gelen[2]." ".$gelen[3].$gelen[4].$gelen[5]." ".$gelen[6].$gelen[7]." ".$gelen[8].$gelen[9];

	}

    function harfbuyut($al){
        $bul = array("a","b","c","ç","d","e","f","g","ğ","h","ı","i","j","k","l","m","n","o","ö","p","r","s","ş","t","u","ü","v","y","z"," ");

        $degistir = array("A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","_");

        $ver = str_replace($bul,$degistir,$al);
        return $ver;
    }

    if(g("dil") !== ""){

        $url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

        $url2 = str_replace("&dil=".g("dil"),"",$url);
        $url3 = str_replace("?dil=".g("dil"),"",$url2);

        $dil2 = g("dil");

        $session = array(

            "dil" => $dil2

        );

        session_olustur($session);

        go("http://".$url3);

    }

    $ssayfa = g("do");
    if($ssayfa == ""){
        $ssayfa = "anasayfa";
    }

    $url = "";

    function faturatoplam($id,$tip = ""){

		if($tip == ""){

            $ara = faturatoplam($id,"ara");
            $kdv = faturatoplam($id,"kdv");

            $toplam = $ara + $kdv;

		}else if($tip == "brut"){

            $query = query("SELECT * FROM urunhareketleri WHERE hareket_belge_id = '$id'");
            $toplam = 0;
            while($kalem = row($query)){

                $top = $kalem["hareket_fiyat"] * $kalem["hareket_adet"];

                $toplam = $toplam + $top;

            }

        }else if($tip == "iskonto"){

            $query = query("SELECT * FROM urunhareketleri WHERE hareket_belge_id = '$id'");
            $toplam = 0;
            while($kalem = row($query)){

                $stoplam = $kalem["hareket_fiyat"] * $kalem["hareket_adet"];

                $top = (($stoplam * $kalem["hareket_isk1"]) / 100);
                $itoplam = $stoplam - $top;
                $top = (($itoplam * $kalem["hareket_isk2"]) / 100);

                $itoplam = $itoplam - $top;
                $tutar = $tutar + $itoplam;
                $toplam = $toplam + ($stoplam - $itoplam);

            }

            $yuzde = row(query("SELECT * FROM belgeaciklamalari WHERE aciklama_belge_id = '$id' AND aciklama_adi = 'yuzde'"))["aciklama"];
            $geneliskonto = row(query("SELECT * FROM belgeaciklamalari WHERE aciklama_belge_id = '$id' AND aciklama_adi = 'geneliskonto'"))["aciklama"];

            $toplam += ($tutar * $yuzde) / 100;

            $toplam += $geneliskonto;

        }else if($tip == "ara"){

            $brut = faturatoplam($id,"brut");
            $iskonto = faturatoplam($id,"iskonto");

            $toplam = $brut - $iskonto;

        }else if($tip == "kdv"){

            $ara = faturatoplam($id,"ara");

            $toplam = ($ara * 18) / 100;

        }

		return round($toplam, 2);

	}

	function site($tip,$gelen){

		switch($tip){

			case ad:

				$query = query("SELECT * FROM ayarlar LIMIT 1");
				$row = row($query);
				return ss($row["site_adi"]);

				break;

			case icon:

				$query = query("SELECT * FROM ayarlar LIMIT 1");
				$row = row($query);
				return ss($row["site_icon"]);

				break;

		}

	}

	function sirket($tip,$gelen){

		switch($tip){

		case anaad:

			$query = query("SELECT * FROM sirketler WHERE sirket_id = '1' AND tip = 'ana' LIMIT 1");
			$row = row($query);
			return ss($row["sirket_adi"]);

			break;

			case anaunvan:

			$query = query("SELECT * FROM sirketler WHERE sirket_id = '1' AND tip = 'ana' LIMIT 1");
			$row = row($query);
			return ss($row["sirket_unvani"]);

			break;

      case anaadres:

				$adres = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'adres' AND aciklama_sirket_id = '1' LIMIT 1"))["aciklama"];
				$ilce = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'ilce' AND aciklama_sirket_id = '1' LIMIT 1"))["aciklama"];
				$il = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'il' AND aciklama_sirket_id = '1' LIMIT 1"))["aciklama"];
				return $adres = $adres."<br>".$ilce."/".$il;

				break;

      case adres:

          $adres = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'adres' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          $ilce = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'ilce' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          $il = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'il' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          return $adres = $adres."<br>".$ilce."/".$il;

				break;

      case adrest:

          $adres = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'adres' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          return $adres;

				break;

      case il:

          $il = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'il' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          return $il;

				break;

      case ilce:

          $ilce = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'ilce' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          return $ilce;


          break;

      case posta:

          $posta = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'posta' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          return $posta;

				break;

      case telefon:

          $telefon = "";

          $query = query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'telefon' AND aciklama_sirket_id = '$gelen' AND aciklama <> ''");
				while($row = row($query)){

                    $telefon .= telefon(ss($row["aciklama"]))."<br>";

				}

				$telefon = rtrim($telefon,"<br>");

				return $telefon;

          break;

		case ftrtelefon:

			$telefon = "";

			$query = query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'telefon' AND aciklama_sirket_id = '$gelen' AND aciklama <> '' LIMIT 1");
			while($row = row($query)){

				$telefon .= ss($row["aciklama"]);

			}

			return $telefon;

			break;

      case telefonara:

          $telefon = "";

				$query = query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'telefon' AND aciklama_sirket_id = '$gelen' LIMIT 1");
				$row = row($query);

                    $telefon = ss($row["aciklama"]);

				return $telefon;

				break;

      case ad:

				$query = query("SELECT * FROM sirketler WHERE sirket_id = '$gelen' LIMIT 1");
				$row = row($query);
				return ss($row["sirket_adi"]);

				break;

      case no:

				$query = query("SELECT * FROM sirketler WHERE sirket_id = '$gelen' LIMIT 1");
				$row = row($query);
				return ss($row["sirket_no"]);

				break;

      case unvan:

				$query = query("SELECT * FROM sirketler WHERE sirket_id = '$gelen' LIMIT 1");
				$row = row($query);
				return ss($row["sirket_unvani"]);

				break;
      case sirketadi:

				$query = query("SELECT * FROM sirketler WHERE sirket_id = '$gelen' LIMIT 1");
				$row = row($query);
				return ss($row["sirket_adi"]);

				break;

      case sirketno:

				$query = query("SELECT * FROM sirketler WHERE sirket_id = '$gelen' LIMIT 1");
				$row = row($query);
				return ss($row["sirket_no"]);

				break;

      case sirketunvani:

				$query = query("SELECT * FROM sirketler WHERE sirket_id = '$gelen' LIMIT 1");
				$row = row($query);
				return ss($row["sirket_unvani"]);

				break;
      case vergidairesi:

          $posta = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'vergidairesi' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
          return $posta;

          break;
		case vergino:

			$posta = row(query("SELECT * FROM sirketaciklamalari WHERE aciklama_adi = 'vergino' AND aciklama_sirket_id = '$gelen' LIMIT 1"))["aciklama"];
			return $posta;

			break;

		}


	}


    function menu($id){

        $query = query("SELECT * FROM menuler WHERE menu_id = '$id'");
        $row = row($query);

        $varmi = query("SELECT * FROM menuler WHERE menu_ust_id = '$id'");
        if(mysql_affected_rows()){

            $alt = "dropdown";
            $alt2 = 'class="dropdown-toggle" data-toggle="dropdown"';
            $alt3 = '<ul class="dropdown-menu" role="menu">';
            $alt4 = '</ul>';

            $son = $alt3;

            while($row2 = row($varmi)){

                $son = $son.menu(ss($row2["menu_id"]));

            }

            $son = $son.$alt4;

            return '<li class="'.$alt.'"><a '.$alt2.' href="'.ss($row["menu_url"]).'">'.ss($row["menu"]).'</a>'.$son.'</li>';

        }else{

            return '<li role="presentation"><a role="menuitem" tabindex="-1" href="'.ss($row["menu_url"]).'">'.ss($row["menu"]).'</a></li>';

        }


    }

    function doviz($kod){

        return row(query("SELECT * FROM dovizler WHERE doviz_kod = '$kod'"))["doviz_kur"];

	}

    function fiyat($id,$ikincil = ""){

        $doviz = "try";
        $dovizsimge = "₺";


        $query = query("SELECT * FROM urunfiyatlari WHERE fiyat_urun_id = '$id'");
        $row = row($query);

        $fiyat = ss($row["fiyat"]) * doviz(ss($row["fiyat_doviz"]));

        $kdv = ($fiyat * ss($row["fiyat_kdv"])) / 100;

        $fiyat = round($fiyat,ayar("tanimli_kusurat"));
		
		if($ikincil == ""){
			
			return $fiyat;
			
		}else if($ikincil == "doviz"){
			
			return ss($row["fiyat"]);
			
		}else if($ikincil == "dovizkuru"){
			
			return doviz(ss($row["fiyat_doviz"]));
			
		}else if($ikincil == "kdv"){
			
			return $kdv;
			
		}

    }

    function urunadet($id){


        $query = query("SELECT * FROM urunhareketleri WHERE tip = 'arti' AND hareket_urun_id = '$id'");
        while($row = row($query)){

            $adet = $adet + ss($row["hareket_adet"]);

        }

        $query = query("SELECT * FROM urunhareketleri WHERE tip = 'eksi' AND hareket_urun_id = '$id'");
        while($row = row($query)){

            $adet = $adet - ss($row["hareket_adet"]);

        }

        if($adet == ""){

            $adet = 0;

        }

        return $adet;

    }

    function ondalik($gelen){

    	if(strstr($gelen,",")){

			$gelen = str_replace(",",".",$gelen);

		}

        return number_format($gelen, ayar("tanimli_kusurat"), ",", ".");

    }

    function ondaliksil($gelen){

    	$gelen = str_replace(".","",$gelen);
    	return $gelen = str_replace(",",".",$gelen);

    }

    function tarih($gelen,$tip,$model){

        switch($tip){


            case on:

                $tarih = explode(" ",$gelen)[0];
                $saat = explode(" ",$gelen)[1];

                if($model == "tarih"){

                    $tarih = explode("-",$tarih);
                    return $tarih = $tarih[2]."/".$tarih[1]."/".$tarih[0];

                }
                if($model == "gun-ay"){

                    $tarih = explode("-",$tarih);
                    return $tarih = $tarih[2]."/".$tarih[1];

                }
                if($model == "tarih2"){

                    $tarih = explode("-",$tarih);
                    return $tarih = $tarih[0]."".$tarih[1]."".$tarih[2];

                }

                if($model == "saat"){

                    $saat = explode(":",$saat);
                    return $saat = $saat[0].":".$saat[1];

                }

								if($model == "tarih-saat"){

										$tarih = explode("-",$tarih);
										$tarih = $tarih[2]."/".$tarih[1]."/".$tarih[0];
										$saat = explode(":",$saat);
                    $saat = $saat[0].":".$saat[1];
										return $tarih." ".$saat;

                }

								if($model == "gun-ay-saat"){

										$tarih = explode("-",$tarih);
										$tarih = $tarih[2]."/".$tarih[1];
										$saat = explode(":",$saat);
                    $saat = $saat[0].":".$saat[1];
										return $tarih." , ".$saat;

                }

                break;

            case veritabani:

                $tarih = explode(" ",$gelen)[0];

                if($model == "arama"){

                    $tarih = str_replace(".",",",$tarih);
                    $tarih = str_replace("/",",",$tarih);
                    $tarih = explode(",",$tarih);
                    return $tarih = $tarih[2]."-".$tarih[1]."-".$tarih[0];

                }

                break;


        }

    }

    function belgetip($id){

    	$query = query("SELECT * FROM belgeler WHERE belge_id = '$id'");
    	$row = row($query);
    	if(strstr($row["belge_tip"],"satis") || strstr($row["belge_tip"],"odeme")){

    		return "arti";

		}else if(strstr($row["belge_tip"],"alis") || strstr($row["belge_tip"],"tahsilat")){

            return "eksi";

        }else if(strstr($row["belge_tip"],"siparis")){

    		return "sifir";

        }else if(strstr($row["belge_tip"],"devir")){

            return "devir";

        }

	}

    function sepettoplam($gelen){

        if($gelen == ""){ $gelen = 1; }

        $query = query("SELECT * FROM urunhareketleri WHERE hareket_uye_id = '$gelen' AND tip = 'sepet'");
        while($sepet = row($query)){

            $uid = ss($sepet["hareket_urun_id"]);

            $fiyat = $fiyat + fiyat($uid) * ss($sepet["hareket_adet"]);

        }

				return $fiyat;

    }

    function kalangun($ilk){

        $ilkt = $ilk;
        $ilkt = $ilkt[8].$ilkt[9].".".$ilkt[5].$ilkt[6].".".$ilkt[0].$ilkt[1].$ilkt[2].$ilkt[3];
        $sont = date("d.m.Y");

        $ilkt=strtotime($ilkt);
        $sont=strtotime($sont);
        $farkt=($ilkt-$sont)/86400;

        return $farkt;

	}

    function sepetadet($gelen){

        if($gelen == ""){ $gelen = 1; }

        $query = query("SELECT * FROM urunhareketleri WHERE hareket_uye_id = '$gelen' AND tip = 'sepet'");
        while($sepet = row($query)){

            $uid = ss($sepet["hareket_urun_id"]);

            $adet = $adet + ss($sepet["hareket_adet"]);

						if($adet >= 99){

							goto gec;

						}

        }

				gec:

				if($adet >= 99){

						$adet = "99+";

				}if($adet <= ""){

					$adet = 0;

				}

				return $adet;

    }

		function kargo($gelen,$tip){

			$query = query("SELECT * FROM kargolar WHERE kargo_id = '$gelen'");
			$row = row($query);

			switch (ss($row["tip"])) {
				case ucretsiz:

					if($tip == "ad"){

						return ss($row["kargo_adi"]);

					}if($tip == "ucret1"){

						return "ucretsiz";

					}if($tip == "ucret2"){

						return 0;

					}

					break;
			}

		}

		function hanelikod($gelen,$hane){

			$eksik = $hane - strlen($gelen);
			$i = 1;
			while($i <= $eksik){

				$gelen = "0".$gelen;
				$i++;

			}

			return $gelen;

		}

		function uye($tip,$id){

			if($id == ""){ $id = 1; }
			$query = query("SELECT * FROM uyeler WHERE uye_id = '$id'");
			$uye = row($query);
			switch ($tip) {
				case ad:

					return ss($uye["uye_adi"]);

					break;
				case kadi:

					return ss($uye["uye_kadi"]);

					break;
				case sirket:

					return ss($uye["uye_sirket_id"]);

					break;
				case resim:

					return ss($uye["uye_resim"]);

					break;
				case grup:

					return ss($uye["uye_grup_id"]);

					break;
				case mail:

					return ss($uye["uye_mail"]);

					break;
				case tip:

					return ss($uye["tip"]);

					break;
				case telefon:

					return ss($uye["uye_telefon"]);

					break;
				case durum:

						if($uye["uye_onay"] == "evet"){ return "acik"; }else{ return "kapali"; }

						break;


			}

		}

		function kategori($tip,$gelen){

			switch ($tip) {
				case ad:

					$query = query("SELECT * FROM urungrupadlari WHERE ad_grup_id = '$gelen' AND ad_dil = '".DIL."'");
					$row = row($query);

					return ss($row["ad"]);

					break;
			}

		}

		function siparis_okunmamis(){

			$query = query("SELECT * FROM belgeler WHERE belge_tip = 'siparis' AND belge_oku = 'hayir'");
			return mysql_num_rows($query);

		}

		function oku($tip,$id){

			$query = query("SELECT * FROM okular WHERE tip = '$tip' AND oku_varlik_id = '$id' AND oku_uye_id = '".session("uye_id")."'");
			if(!mysql_affected_rows()) {

                $query = query("INSERT INTO okular SET tip = '$tip', oku_varlik_id = '$id', oku_uye_id = '".session("uye_id")."'");

            }

		}

		function sure($gelen,$tip){

		$ilks = explode(" ",$gelen)[1];
		$sons = date("H:i:s");

            $ilks=strtotime($ilks);
            $sons=strtotime($sons);
            $farks=$sons-$ilks;

	    $ilkt = explode(" ",$gelen)[0];
	    $ilkt = $ilkt[8].$ilkt[9].".".$ilkt[5].$ilkt[6].".".$ilkt[0].$ilkt[1].$ilkt[2].$ilkt[3];
	    $sont = date("d.m.Y");



	    $ilkt=strtotime($ilkt);
			$sont=strtotime($sont);
			$farkt=($sont-$ilkt)/86400;

	    if($farkt == 0){

	      if($farks <= 60){

              return $farks." Sn";

		  }else if(round($farks/60) <= 60){

              return round($farks/60)." Dk";

		  }else if(round(($farks/60)/60) <= 24){

              return round(($farks/60)/60)." Sa";

          }

	    }else if($farkt < 365){

	      return $farkt." Gün";

	    }else{

	      return round($farkt / 365)." Yıl";

	    }

	  }

	function sureuzun($gelen,$tip){

		$ilks = explode(" ",$gelen)[1];
		$sons = date("H:i:s");

		$ilks=strtotime($ilks);
		$sons=strtotime($sons);
		$farks=$sons-$ilks;

		$ilkt = explode(" ",$gelen)[0];
		$ilkt = $ilkt[8].$ilkt[9].".".$ilkt[5].$ilkt[6].".".$ilkt[0].$ilkt[1].$ilkt[2].$ilkt[3];
		$sont = date("d.m.Y");



		$ilkt=strtotime($ilkt);
		$sont=strtotime($sont);
		$farkt=($sont-$ilkt)/86400;

		if($farkt == 0){

			if($farks <= 60){

				return $farks." Saniye Önce";

			}else if(round($farks/60) <= 60){

				return round($farks/60)." Dakika Önce";

			}else if(round(($farks/60)/60) <= 24){

				return round(($farks/60)/60)." Saat Önce";

			}

		}else if($farkt < 365){

			return $farkt." Gün Önce";

		}else{

			return round($farkt / 365)." Yıl Önce";

		}

	}

	  function artir($gelen){

		if(strstr($gelen,"-")){ $bol = "-"; }
		if(strstr($gelen,",")){ $bol = ","; }
		if(strstr($gelen,".")){ $bol = "."; }
		if(strstr($gelen,"#")){ $bol = "#"; }
		if(strstr($gelen,"/")){ $bol = "/"; }

		$parcalar = explode($bol,$gelen);
		$parcasayisi = count($parcalar);

		if($parcasayisi == 1) {

            $dongui = 1;

		    $toplamkarakter2 = strlen($gelen);

            $gelen++;

            $toplamkarakter = $toplamkarakter2 - strlen($gelen);

			while ($dongui <= $toplamkarakter - 1) {

                $gelen = "0" . $gelen;
                $dongui++;

            }

            return $gelen;

        }

		$parcadongu = $parcasayisi;
		while(($parcadongu <= $parcasayisi) && ($parcadongu > 0)){

            $i = $parcadongu - 1;
            $artacak = $parcalar[$i];
            $artacakuzunluk = strlen($artacak);
            $artti = $artacak + 1;
            $arttiuzunluk = strlen($artti);
            $sifirsayisi = $artacakuzunluk - $arttiuzunluk;
            if($sifirsayisi >= 0) {
                $dongui = 1;

                while ($dongui <= $sifirsayisi) {

                    $artti = "0".$artti;
                    $dongui++;


                }

                $parcalar[$i] = $artti;

            }else if($sifirsayisi < 0){

                $artti = "";

                $dongui = 1;
                while ($dongui <= $artacakuzunluk) {

                    $artti = "0".$artti;
                    $dongui++;

                }


                $parcalar[$i] = $artti;

                geri:

                $i = $i - 1;
                $artacak = $parcalar[$i];
                $artacakuzunluk = strlen($artacak);
                $artti = $artacak + 1;
                $arttiuzunluk = strlen($artti);
                $sifirsayisi = $artacakuzunluk - $arttiuzunluk;
                if($sifirsayisi >= 0) {

                    $dongui = 1;
                    while ($dongui <= $sifirsayisi) {

                        $artti = "0".$artti;
                        $dongui++;
                    }

                    $parcalar[$i] = $artti;

                }else if($sifirsayisi < 0){

                    $artti = "";

                    $dongui = 1;
                    while ($dongui <= $artacakuzunluk) {

                        $artti = "0".$artti;
                        $dongui++;

                    }

                    $parcalar[$i] = $artti;

                    goto geri;


                }

            }

            $parcadongu = -1;

        }

        son:

        return join($bol,$parcalar);

	  }

	  function mailgelenokunmamis(){

          $adet = 0;

          $mailler = query("SELECT * FROM mailler WHERE mail_alan = '".session("uye_id")."'");
          while ($mail = row($mailler)){

              $sil = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".$mail["mail_id"]."'");
              if(mysql_affected_rows()){ goto atla; }

              $oku = query("SELECT * FROM okular WHERE oku_tip = 'mail' AND oku = '".$mail["mail_id"]."' AND oku_uye_id = '".session("uye_id")."'");
              if(!mysql_affected_rows()){ $adet++; }

              atla:

          }

          return $adet;

	  }

	function mailgelen(){

		$adet = 0;

		$mailler = query("SELECT * FROM mailler WHERE mail_alan = '".session("uye_id")."'");
		while ($mail = row($mailler)){

			$sil = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".$mail["mail_id"]."'");
			if(!mysql_affected_rows()){ $adet++; }


		}

		return $adet;

	}

	function mailgiden(){

		$adet = 0;

		$mailler = query("SELECT * FROM mailler WHERE mail_gonderen = '".session("uye_id")."'");
		while ($mail = row($mailler)){

			$sil = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".$mail["mail_id"]."'");
			if(!mysql_affected_rows()){ $adet++; }


		}

		return $adet;

	}

	function mailyildiz(){

		$adet = 0;

		$mailler = query("SELECT * FROM yildizlar WHERE yildiz_uye_id = '".session("uye_id")."'");
		while ($mail = row($mailler)){

			$sil = query("SELECT * FROM siller WHERE sil_tip = 'mail' AND sil_uye_id = '".session("uye_id")."' AND sil = '".$mail["yildiz"]."'");
			if(!mysql_affected_rows()){ $adet++; }


		}

		return $adet;

	}

	function mailcop(){

		$adet = 0;

		$mailler = query("SELECT * FROM siller WHERE sil_uye_id = '".session("uye_id")."' AND sil_durum = '1'");
		$adet = mysql_num_rows($mailler);

		return $adet;

	}

	function tatilmi($gelen){

    	$query = query("SELECT * FROM olaylar WHERE olay_tarih = '$gelen' AND olay_adi LIKE 'TATIL-%'");
    	if(mysql_affected_rows()){

    		return true;

		}else{

    		return false;

		}

	}

	function kactatilvar($gelen1, $gelen2){

    	$gunler1 = array();

		$query = query("SELECT * FROM olaylar WHERE olay_tarih >= '$gelen1' AND olay_tarih <= '$gelen2' AND olay_adi LIKE 'TATIL-%'");
		$adet = mysql_num_rows($query);
		while ($row = row($query)){

			array_push($gunler1,$row["olay_tarih"]);

		}
		$fark = (strtotime($gelen2) - strtotime($gelen1))/86400;

		//print_r($gunler1);


        $i = 1;
		while($i < $fark+1){

			if($i > 1){

				$day = "days";

			}else{

				$day = "day";

			}

            $gun = date("N",mktime(0,0,0,date("m",strtotime("+$i $day", strtotime($gelen1))),date("d",strtotime("+$i $day", strtotime($gelen1))),date("Y",strtotime("+$i $day", strtotime($gelen1)))));
            $tam = date("Y-m-d",mktime(0,0,0,date("m",strtotime("+$i $day", strtotime($gelen1))),date("d",strtotime("+$i $day", strtotime($gelen1))),date("Y",strtotime("+$i $day", strtotime($gelen1)))));
            //echo $tam."-";

            if(($gun == 6 || $gun == 7) && !in_array($tam, $gunler1)){

				$adet++;

			}
			$i++;

		}

		return $adet;

	}

	function tatilsebep($gelen){

		$query = query("SELECT * FROM olaylar WHERE olay_tarih = '$gelen' AND olay_adi LIKE 'TATIL-%'");
		$row = row($query);
		if(mysql_affected_rows()){

			return explode("-",$row["olay_adi"])["1"];

		}else{

			return false;

		}

	}
	function stok($gelen){
		$array=array();

		$query = query("SELECT * FROM parcalar");
		while ($row = row($query))
		 {
		 	
		 	$query2 = query("SELECT * FROM hareketler WHERE hareket_parca_id = '".$row["parca_id"]."'");
		 	while ($row2 = row($query2)) 
		 	{
		 		if ($row2["hareket_tip"]=="arti") 
		 		{
		 			$array[$row["parca_id"]]=$array[$row["parca_id"]]+$row2["hareket_miktar"];
		 		}else{
		 			$array[$row["parca_id"]]=$array[$row["parca_id"]]-$row2["hareket_miktar"];
		 		}
		 		
		 	}
			
		}
		if ($array[$gelen] == "")
		 {
			$array[$gelen] ="0";
		}
		
		return $array[$gelen];

}


	


?>
