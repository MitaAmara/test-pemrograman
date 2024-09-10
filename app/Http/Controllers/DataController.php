<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class DataController extends Controller
{
    public function index()
    {
        // ambil data dari api
        $client = new Client();
        $url = 'https://bachood.beit.co.id/api/Test/TestBEIT';
        $response = $client->request('GET', $url);
        $datas = json_decode($response->getBody(), true);

        // deklarasi variabel
        $kelas1 = [['nama' => '', 'nilai' => '']];
        $kelas2 = [['nama' => '', 'nilai' => '']];
        $kelas3 = [['nama' => '', 'nilai' => '']];
        $kelas4 = [['nama' => '', 'nilai' => '']];
        $kelas5 = [['nama' => '', 'nilai' => '']];
        $kelas6 = [['nama' => '', 'nilai' => '']];
        $dataMenikah = [['nama' => '', 'nilai' => '']];
        $dataMeninggal = [['nama' => '', 'nilai' => '']];
        $lastDigit = 0;
        $monthNumber = 0;

        // menghapus isi array sebelum diisi
        array_splice($kelas1, 0, count($kelas1));
        array_splice($kelas2, 0, count($kelas2));
        array_splice($kelas3, 0, count($kelas3));
        array_splice($kelas4, 0, count($kelas4));
        array_splice($kelas5, 0, count($kelas5));
        array_splice($kelas6, 0, count($kelas6)); 
        array_splice($dataMenikah, 0, count($dataMenikah)); 
        array_splice($dataMeninggal, 0, count($dataMeninggal)); 

        // pengulangan untuk pembagian kelas berdasarkan nilai dan kelas khusus dengan nama mengandung huruf 'C' dan 'O'
        for ($i = 0; $i < sizeof($datas['listNama']); $i++) {
            if (str_contains($datas['listNama'][$i], 'C') && str_contains($datas['listNama'][$i], 'O')){
                array_push($kelas6, ['nama' => $datas['listNama'][$i], 'nilai' => $datas['listNilai'][$i]]);
            } elseif ($datas['listNilai'][$i] >= 50 && $datas['listNilai'][$i] < 60){
                array_push($kelas1, ['nama' => $datas['listNama'][$i], 'nilai' => $datas['listNilai'][$i]]);
            } elseif ($datas['listNilai'][$i] >= 60 && $datas['listNilai'][$i] < 70){
                array_push($kelas2, ['nama' => $datas['listNama'][$i], 'nilai' => $datas['listNilai'][$i]]);
            } elseif ($datas['listNilai'][$i] >= 70 && $datas['listNilai'][$i] < 80){
                array_push($kelas3, ['nama' => $datas['listNama'][$i], 'nilai' => $datas['listNilai'][$i]]);
            } elseif ($datas['listNilai'][$i] >= 80 && $datas['listNilai'][$i] < 90){
                array_push($kelas4, ['nama' => $datas['listNama'][$i], 'nilai' => $datas['listNilai'][$i]]);
            } elseif ($datas['listNilai'][$i] >= 90 && $datas['listNilai'][$i] < 100){
                array_push($kelas5, ['nama' => $datas['listNama'][$i], 'nilai' => $datas['listNilai'][$i]]);
            }

            // pengecekan bilangan prima
            $isPrima = $this->isPrima($datas['listNilai'][$i]);
            if ($isPrima == true){
                $lastDigit = substr((string) $datas['listNilai'][$i], -1);
                if ($lastDigit == 9){
                    $monthNumber = $lastDigit;
                    array_push($dataMeninggal, ['nama' => $datas['listNama'][$i], 'nilai' => $datas['listNilai'][$i]]);
                }
            }
        }

        return view('datas.index', ['kelas1'=>$kelas1, 'kelas2'=>$kelas2, 'kelas3'=>$kelas3, 'kelas4'=>$kelas4, 'kelas5'=>$kelas5, 'kelas6'=>$kelas6, 'dataMenikah'=>$dataMenikah, 'dataMeninggal'=>$dataMeninggal]);
    }

    private function isPrima($number)
    {
        // angka 0 dan 1 bukan bilangan prima
        if ($number <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
