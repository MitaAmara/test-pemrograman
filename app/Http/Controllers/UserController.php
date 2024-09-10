<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = 'https://bachood.beit.co.id/api/Test/TestBEIT';
        $response = $client->request('GET', $url);
        $users = json_decode($response->getBody(), true);

        $kelas1 = [];
        $kelas2 = [];
        $kelas3 = [];
        $kelas4 = [];
        $kelas5 = [];
        $kelas6 = [];

        for ($i = 0; $i < sizeof($users['listNama']); $i++) {
            if ($users['listNilai'][$i] >= 50 || $users['listNilai'][$i] <= 60){
                array_push($kelas1, $users['listNama'][$i], $users['listNilai'][$i]);
                echo "$kelas1";
            } elseif ($users['listNilai'][$i] >= 60 || $users['listNilai'][$i] <= 70){
                array_push($kelas1, $users['listNama'][$i], $users['listNilai'][$i]);
                echo "$kelas1";
            } elseif ($users['listNilai'][$i] >= 70 || $users['listNilai'][$i] <= 80){
                array_push($kelas1, $users['listNama'][$i], $users['listNilai'][$i]);
                echo "$kelas1";
            } elseif ($users['listNilai'][$i] >= 80 || $users['listNilai'][$i] <= 90){
                array_push($kelas1, $users['listNama'][$i], $users['listNilai'][$i]);
                echo "$kelas1";
            } elseif ($users['listNilai'][$i] >= 90 || $users['listNilai'][$i] <= 100){
                array_push($kelas1, $users['listNama'][$i], $users['listNilai'][$i]);
                echo "$kelas1";
            } elseif (str_contains($users['listNama'][$i], 'C') && str_contains($users['listNama'][$i], '')){
                array_push($kelas1, $users['listNama'][$i], $users['listNilai'][$i]);
                echo "$kelas1";
            }
            // echo "Nama: " . $users['listNama'][$i] . ", Nilai: " . $users['listNilai'][$i] . "<br>";
        }

        return view('users.index', compact('users'));
    }
}
