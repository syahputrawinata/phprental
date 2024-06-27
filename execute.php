<?php

class Data {
    public $member;
    public $jenis;
    public $waktu;
    public $diskon;
    protected $pajak;
    private $Scooter, $Sport, $SportTouring, $Cross;
    private $listMember = ['ana', 'sam', 'alex', 'ara'];

    function __construct(){
        $this->pajak = 10000;

    }
        public function getMember(){
            if  (in_array($this->member, $this->listMember)){
                return "Member";
            }else {
                return "Non Member";
            }
        }

        public function setHarga($jenis1, $jenis2, $jenis3, $jenis4){
            $this->Scooter = $jenis1;
            $this->Sport = $jenis2;
            $this->SportTouring = $jenis3;
            $this->Cross = $jenis4;
        }

        public function getHarga(){
            $data["Scooter"] = $this->Scooter;
            $data["Sport"] = $this->Sport;
            $data["SportTouring"] = $this->SportTouring;
            $data["Cross"] = $this->Cross;
            return $data;
        }
}

class Rental extends Data {
    public function hargaRental(){
        $dataHarga = $this->getHarga()[$this->jenis];
        $diskon = $this->getMember() == "Member" ? 5 : 0;
        if($this->waktu === 1 ) {
            $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
        } else {
            $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100)) + $this->pajak;
        }
        return [$bayar, $diskon];
    }

    public function pembayaran() {
        echo "<center>";
        echo $this->member . "Berstatus Sebagai " . $this->getMember() . "Mendapatkan Diskon Sebesar " . $this->hargaRental()[1] . "%";
        echo "<br/>";
        echo "Jenis Motor yang di Rental Adalah " . $this->jenis . "Selama " . $this->waktu . "Hari";
        echo "<br/>";
        echo "Harga Rental Per-Harinya : Rp. " . number_format($this->getHarga()[$this->jenis], 0, '', '.');
        echo "<br/f>";
        echo "<br/f>";
        echo "Besar Harga yang harus dibayarkan adalah . " . number_format($this->hargaRental()[0], 0, ',' );
        echo "</center>";
    }
}
?>