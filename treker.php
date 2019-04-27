<?php

error_reporting(0);

function banner()
{
        echo "
        echo " _ _ ____ _____ "
        echo " | \ | | | ___ | _ _ | "
        echo " | \ | | | | | "
        echo " | | \ | |___ | | "
        echo " | _ | \ _ | \ ____ | | _ | "
";
}

function track($ip)
{
        $link = "https://ipapi.co/$ip/json";

                $c = curl_init();
                curl_setopt($c, CURLOPT_URL, $link);
                curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
                // Lagi Belajar Gan :V Sumber https://github.com/PhobiaXplit
                // Tapi Gak Gw Rekode , cuma belajar dan coba kembangin :v
                // No Copas Copas Kleb :V
                curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($c, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
                $response = curl_exec($c);



                $json = json_decode($response);



                if (!curl_errno($c))       {
                	      if ($json->error == 1)  {
                	      	      echo "\033[91mInvailid IP Adress\n";

                	      } else {
                	      	       if ($json->reserved == 1)  {
                	      	       	        echo "033[91mNot Supported IP Public\n";
                                   } else {
                                   	        system("clear") or system("cls")
                                   	        banner();
                                   	        echo "[+]===============================================================================[+]\n";
                                   	        echo "IP Address     : ".$json->ip."\r\n";
                                   	        echo "City           : ".$json->city."\r\n";
                                   	        echo "Region         : ".$json->region."\r\n";
                                   	        echo "Country        : ".$json->country."\r\n";
                                   	        echo "Latitude       : ".$json->latitude."\r\n";
                                   	        echo "Longitude      : ".$json->longitude."\r\n";
                                   	        echo "Time Zone      : ".$json->timezone."\r\n";
                                   	        echo "Calling Code   : ".$json->country_calling_code."\r\n";
                                   	        echo "Currency       : ".$json->currency."\r\n";
                                   	        echo "Languagess     : ".$json->languages."\r\n";
                                   	        echo "ASN Number     : ".$json->asn."\r\n";
                                   	        echo "Organization   : ".$json->org."\r\n";
                                            echo "[+]===============================================================================[+]\n"

                                }
                        }
                }

                curl_close($c);
}


system("clear") or system("cls");
banner();
echo "\033[97mIP OR DOMAIN : \033[92m";
$urip = trim(fgets(STDIN, 1024));
if( is_numeric($urip) ){
	echo "\033[94mTracking...........\n";
	track($ip);
}else{	
	$ip = gethostbyname($urip);
	track($ip);

}


?>
