<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RestApiModel;
use CodeIgniter\HTTP\Response;

class DataTerbuka extends ResourceController
{


    use ResponseTrait;
    public function __construct()
    {
        $this->model = new RestApiModel();
        helper(['api', 'form', 'security']);
    }




    public function get_wilayah()
    {
        $menu = $this->request->getVar('menu');
        $wilayah = $this->request->getVar('wilayah');

        if (isset($menu)) {
            if ($menu == "cuaca") {
                if (isset($wilayah)) {
                    $wil = strtolower($wilayah);
                    if ($wil != "") {
                        $cuacaJson = $this->cuaca($wil);
                        return $this->respond($cuacaJson, 200);
                    }
                }
            } elseif ($menu == "gempa") {
                $gempaJson = $this->gempa();
                return $this->respond($gempaJson, 200);
            } else {
                $err = array("error wrong parameter!");
                return $this->respond($err, 200);
            }
        } else {
            $err = array("error wrong method!");

            return $this->respond($err, 200);
        }
    }








    private function gempa()
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $htmlContent = file_get_contents(
            "http://inatews.bmkg.go.id/light/?act=realtimeev",
            false,
            stream_context_create($arrContextOptions)
        );

        $internalErrors = libxml_use_internal_errors(true);
        $DOM = new \DOMDocument();
        $DOM->loadHTML($htmlContent);
        $xpath = new \DOMXPath($DOM);

        $Header = $DOM->getElementsByTagName('th');
        $Detail = $DOM->getElementsByTagName('td');
        libxml_use_internal_errors($internalErrors);
        foreach ($Header as $NodeHeader) {
            $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
        }
        //@$jmlHeader = count($aDataTableHeaderHTML);
        //print_r($aDataTableHeaderHTML);

        $i = 0;
        $j = 0;
        foreach ($Detail as $sNodeDetail) {
            $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
            $i = $i + 1;
            $j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
        }

        // dd($aDataTableDetailHTML);
        for ($i = 0; $i < count($aDataTableDetailHTML); $i++) {
            for ($j = 0; $j < count($aDataTableHeaderHTML); $j++) {
                $aTempData[$i][$aDataTableHeaderHTML[$j]] = $aDataTableDetailHTML[$i][$j];
            }
        }
        $aDataTableDetailHTML = $aTempData;
        unset($aTempData);
        //print_r($aDataTableDetailHTML); 
        //echo "<br/>";
        $js = [];
        foreach ($aDataTableDetailHTML as $d) {
            array_push($js, ['stts' => $d['Status'], 'tgl' => $d['Tanggal'], 'jam' => $d['Jam (UTC)'] . " (UTC)", 'lintang' => $d['Lintang'], 'bujur' => $d['Bujur'], 'kedalaman' => $d['Kedalaman'], 'm' => $d['M'], 'mt' => $d['MT'], 'region' => $d['Region']]);
        }

        //print($js);
        return $js;
    }


    private function cuaca($wil)
    {
        switch ($wil) {
            case "aceh":
            case "banda aceh":
            case "bandaaceh":
                $url = "?Prov=01&NamaProv=Aceh";
                break;
            case "bali":
                $url = "?Prov=02&NamaProv=Bali";
                break;
            case "bangka belitung":
            case "babel":
                $url = "?Prov=03&NamaProv=Bangka%20Belitung";
                break;
            case "banten":
                $url = "?Prov=04&NamaProv=Banten";
                break;
            case "bengkulu":
                $url = "?Prov=05&NamaProv=Bengkulu";
                break;
            case "di yogyakarta":
            case "diy yogyakarta":
            case "diy jogyakarta":
            case "jogyakarta":
            case "diy":
                $url = "?Prov=06&NamaProv=DI%20Yogyakarta";
                break;
            case "dki jakarta":
            case "jakarta":
                $url = "?Prov=07&NamaProv=DKI%20Jakarta";
                break;
            case "gorontalo":
                $url = "?Prov=08&NamaProv=Gorontalo";
                break;
            case "jambi":
                $url = "?Prov=09&NamaProv=Jambi";
                break;
            case "jawa barat":
            case "jabar":
                $url = "?Prov=10&NamaProv=Jawa%20Barat";
                break;
            case "jawa tengah":
            case "jateng":
                $url = "?Prov=11&NamaProv=Jawa%20Tengah";
                break;
            case "jawa timur":
            case "jatim":
                $url = "?Prov=12&NamaProv=Jawa%20Timur";
                break;
            case "kalimantan barat":
            case "kalbar":
                $url = "?Prov=13&NamaProv=Kalimantan%20Barat";
                break;
            case "kalimantan selatan":
            case "kalsel":
                $url = "?Prov=14&NamaProv=Kalimantan%20Selatan";
                break;
            case "kalimantan tengah":
            case "kalteng":
                $url = "?Prov=15&NamaProv=Kalimantan%20Tengah";
                break;
            case "kalimantan timur":
            case "kaltim":
                $url = "?Prov=16&NamaProv=Kalimantan%20Timur";
                break;
            case "kalimantan utara":
            case "kalut":
                $url = "?Prov=17&NamaProv=Kalimantan%20Utara";
                break;
            case "kepulauan riau":
            case "kepri":
                $url = "?Prov=18&NamaProv=Kepulauan%20Riau";
                break;
            case "lampung":
            case "bandar lampung":
            case "bandarlampung":
                $url = "?Prov=19&NamaProv=Lampung";
                break;
            case "maluku":
            case "ambon":
                $url = "?Prov=20&NamaProv=Maluku";
                break;
            case "maluku utara":
            case "malut":
            case "ternate":
                $url = "?Prov=21&NamaProv=Maluku%20Utara";
                break;
            case "nusa tenggara barat":
            case "ntb":
                $url = "?Prov=22&NamaProv=Nusa%20Tenggara%20Barat";
                break;
            case "nusa tenggara timur":
            case "ntt":
                $url = "?Prov=23&NamaProv=Nusa%20Tenggara%20Timur";
                break;
            case "papua":
            case "jayapura":
                $url = "?Prov=24&NamaProv=Papua";
                break;
            case "papua barat":
                $url = "?Prov=25&NamaProv=Papua%20Barat";
                break;
            case "riau":
                $url = "?Prov=26&NamaProv=Riau";
                break;
            case "sulawesi barat":
            case "sulbar":
                $url = "?Prov=27&NamaProv=Sulawesi%20Barat";
                break;
            case "sulawesi selatan":
            case "sulsel":
                $url = "?Prov=28&NamaProv=Sulawesi%20Selatan";
                break;
            case "sulawesi tengah":
            case "sulteng":
                $url = "?Prov=29&NamaProv=Sulawesi%20Tengah";
                break;
            case "sulawesi tenggara":
            case "sultra":
                $url = "?Prov=30&NamaProv=Sulawesi%20Tenggara";
                break;
            case "sulawesi utara":
            case "sulut":
                $url = "?Prov=31&NamaProv=Sulawesi%20Utara";
                break;
            case "sumatra barat":
            case "sumatera barat":
            case "sumbar":
                $url = "?Prov=32&NamaProv=Sumatera%20Barat";
                break;
            case "sumatra selatan":
            case "sumatera selatan":
            case "sumsel":
                $url = "?Prov=33&NamaProv=Sumatera%20Selatan";
                break;
            case "sumatra utara":
            case "sumatera utara":
            case "sumut":
                $url = "?Prov=34&NamaProv=Sumatera%20Utara";
                break;
            case "indonesia":
                $url = "?Prov=35&NamaProv=Indonesia";
                break;
            case "list":
                $lst = [
                    "Aceh", "Bali", "Bangka Belitung", "Banten", "Bengkulu", "DI Yogyakarta", "DKI Jakarta", "Gorontalo", "Jambi", "Jawa Barat", "Jawa Tengah", "Jawa Timur", "Kalimantan Barat ", "Kalimantan Selatan ", "Kalimantan Tengah", "Kalimantan Timur", "Kalimantan Utara", "Kepulauan Riau", "Lampung ", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Papua", "Papua Barat", "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tengah", "Sulawesi Tenggara", "Sulawesi Utara", "Sumatera Barat", "Sumatera Selatan", "Sumatera Utara", "Indonesia"
                ];
                return $lst;
            default:
                $err = array("error provinsi not found!");
                return $err;
        }

        $html = "http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg" . $url;
        $tempat = "";
        $prdom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $prdom->loadHTMLFile($html);
        libxml_use_internal_errors(false);
        $xpath = new \DOMXPath($prdom);
        $tbp = 1;
        $idTab = '//div[@id="TabPaneCuaca' . $tbp . '"]';
        $divTag = $xpath->query($idTab);
        if ($divTag->length == 0) {
            for ($z = 2; $z <= 3; $z++) {
                $idTab = '//div[@id="TabPaneCuaca' . $z . '"]';
                $divTag = $xpath->query($idTab);
                if ($divTag->length == 0) {
                    break;
                }
            }
        }

        foreach ($divTag as $val) {
            $tempat .= $prdom->saveXML($val);
        }

        $internalErrors = libxml_use_internal_errors(true);
        $DOM = new \DOMDocument();
        $DOM->loadHTML($tempat);
        $xpath = new \DOMXPath($DOM);

        $Header = $DOM->getElementsByTagName('th');
        $Detail = $DOM->getElementsByTagName('td');
        //struktur table
        $head1 =  array("kota", "pagi", "siang", "malam", "dini_hari", "suhu", "kelembaban");
        $head2 =  array("kota", "Siang", "malam", "dini_hari", "suhu", "kelembaban");
        $head3 =  array("kota", "malam", "dini_hari", "suhu", "kelembaban");
        $head4 =  array("kota", "dini_hari", "suhu", "kelembaban");
        libxml_use_internal_errors($internalErrors);

        foreach ($Header as $NodeHeader) {
            $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
        }
        @$jmlHeader = count($aDataTableHeaderHTML);
        switch ($jmlHeader) {
            case 8:                    //klo full pagi sampe larut dan 3 hari
                $head = $head1;
                break;
            case 7:                    //klo - pagi dan 1 hari
                $head = $head2;
                break;
            case 6:                    //klo - pagi siang dan 1 hari
                //echo "Your favorite color is " . $jmlHeader;
                $head = $head3;
                break;
            case 5:                    //klo dini hari doang dan 1 hari
                $head = $head4;
                break;
            default:
                $err = array("error data not found!");
                return $err;
        }
        $i = 0;
        $j = 0;
        foreach ($Detail as $sNodeDetail) {
            $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
            $i = $i + 1;
            $j = $i % count($head) == 0 ? $j + 1 : $j;
        }
        for ($i = 0; $i < count($aDataTableDetailHTML); $i++) {
            for ($j = 0; $j < count($head); $j++) {
                $aTempData[$i][$head[$j]] = $aDataTableDetailHTML[$i][$j];
            }
        }
        $aDataTableDetailHTML = $aTempData;

        unset($aTempData);
        $js = $aDataTableDetailHTML;
        return $js;
    }
}
