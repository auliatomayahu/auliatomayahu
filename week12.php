<?php

interface Kalkulator {
    public function RumusBangunRuang($satuan);
}

class Persegi_Panjang implements Kalkulator {
    public $panjang;
    public $lebar;

    public function RumusBangunRuang($satuan) {
        $this->panjang = $satuan['panjang'];
        $this->lebar = $satuan['lebar'];
        return ('Bangun Ruang : Persegi Panjang<br>'.
                'Panjang : '.$this->panjang.' m<br>'.
                'Lebar : '.$this->lebar.' m<br>'.
                'Rumus : panjang x lebar<br>'.
                'Luas Persegi Panjang : '.$this->panjang * $this->lebar.' m2 (kuadrat)');
    }
}

class Bola implements Kalkulator {
    public $jarijari;

    public function RumusBangunRuang($satuan) {
        $this->jejari = $satuan['jarijari'];
        return ('Bangun Ruang : Bola<br>'.
                'Jari-jari (r) : '.$this->jarijari.' m<br>'.
                'Rumus : 4/3 x phi x r x r x r<br>'.
                'Volume Bola : '.(4/3) * pi() * $this->jarijari * $this->jarijari * $this->jarijari.' m3 (kubik)');
    }
}

class Kerucut implements Kalkulator {
    public $tinggi;
    public $jarijari;

    public function RumusBangunRuang($satuan) {
        $this->tinggi = $satuan['tinggi'];
        $this->jarijari = $satuan['jarijari'];
        return ('Bangun Ruang : Kerucut<br>'.
                'Tinggi : '.$this->tinggi.' m<br>'.
                'Jejari (r) : '.$this->jarijari.' m<br>'.
                'Rumus : 1/3 x Luas Alas (lingkaran: phi*r*r) x t<br>'.
                'Volume Kerucut : '.(1/3) * pi() * $this->jarijari * $this->jarijari * $this->tinggi.' m3 (kubik)');
    }
}

class Kubus implements Kalkulator {
    public $rusuk;

    public function RumusBangunRuang($satuan) {
        $this->rusuk = $satuan['rusuk'];
        return ('Bangun Ruang : Kubus<br>'.
                'Panjang Rusuk (r) : '.$this->rusuk.' m<br>'.
                'Rumus : r x r x r<br>'.
                'Volume Kubus : '.$this->rusuk * $this->rusuk * $this->rusuk.' m3 (kubik)');
    }
}

class Lingkaran implements Kalkulator {
    public $jarijari;
    public function RumusBangunRuang($satuan) {
        $this->jarijari = $satuan['jarijari'];
        return ('Bangun Ruang : Lingkaran<br>'.
                'Jejari (r) : '.$this->jarijari.' m<br>'.
                'Rumus : 2 x phi x r<br>'.
                'Keliling Lingkaran : '.(2 * pi() * $this->jarijari.' m (meter)'));
    }
}

class KalkulatorBangunRuangFactory {
    public function initializeKalkulatorBangunRuang($menu) {
        if ($menu === 'Luas_Persegi_Panjang') {
            return new Persegi_Panjang();
        }
        if ($menu == 'Volume_Bola') {
            return new Bola();
        }
        if ($menu === 'Volume_Kerucut') {
            return new Kerucut();
        }
        if ($menu === 'Volume_Kubus') {
            return new Kubus();
        }
        if ($menu === 'Keliling_Lingkaran') {
            return new Lingkaran();
        }

        throw new Exception("Pilihan Tidak Tersedia!");
    }
}

$satuan = ['rusuk'=> 12, 'panjang'=> 0, 'lebar'=> 0, 'jarijari'=> 0, 'tinggi'=>0];
class Json {
    public static function form($data){
        return json_encode($data);
    }
}
echo 'Masukkan : <br>';
print(Json::form($satuan));
echo '<br><br>';

$PilihanKalkulatorBangunRuang = 'Volume_Kubus';
$KalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$KalkulatorBangunRuang = $KalkulatorBangunRuangFactory->initializeKalkulatorBangunRuang($PilihanKalkulatorBangunRuang);
$HasilKalkulatorBangunRuang = $KalkulatorBangunRuang->RumusBangunRuang($satuan);
print_r($HasilKalkulatorBangunRuang);
