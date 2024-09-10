<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Siswa</title>
        <style>
            .container {
                display: flex;
                flex-wrap: wrap; 
                gap: 20px;
            }
            .column {
                flex: 1 1 10%;
                border: 1px solid #000;
                padding: 10px;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <h1>Daftar Siswa</h1>

        @for ($i = 1; $i<7; $i++)
            <h2>Kelas {{$i}}</h2>
            <div class="container">
                @if ($i == 1)
                    @foreach ($kelas1 as $kelas) 
                        @if ($kelas != null)
                            <div class="column">
                                <p><strong>Nama:</strong> {{ $kelas['nama'] }}</p>
                                <p><strong>Nilai:</strong> {{ $kelas['nilai'] }}</p>
                            </div>
                        @endif
                    @endforeach
                @elseif ($i ==2)
                    @foreach ($kelas2 as $kelas) 
                        @if ($kelas != null)
                            <div class="column">
                                <p><strong>Nama:</strong> {{ $kelas['nama'] }}</p>
                                <p><strong>Nilai:</strong> {{ $kelas['nilai'] }}</p>
                            </div>
                        @endif
                    @endforeach
                @elseif ($i ==3)
                    @foreach ($kelas3 as $kelas) 
                        @if ($kelas != null)
                            <div class="column">
                                <p><strong>Nama:</strong> {{ $kelas['nama'] }}</p>
                                <p><strong>Nilai:</strong> {{ $kelas['nilai'] }}</p>
                            </div>
                        @endif
                    @endforeach
                @elseif ($i ==4)
                    @foreach ($kelas4 as $kelas) 
                        @if ($kelas != null)
                            <div class="column">
                                <p><strong>Nama:</strong> {{ $kelas['nama'] }}</p>
                                <p><strong>Nilai:</strong> {{ $kelas['nilai'] }}</p>
                            </div>
                        @endif
                    @endforeach
                @elseif ($i ==5)
                    @foreach ($kelas5 as $kelas) 
                        @if ($kelas != null)
                            <div class="column">
                                <p><strong>Nama:</strong> {{ $kelas['nama'] }}</p>
                                <p><strong>Nilai:</strong> {{ $kelas['nilai'] }}</p>
                            </div>
                        @endif
                    @endforeach
                @elseif ($i ==6)
                    @foreach ($kelas6 as $kelas) 
                        @if ($kelas != null)
                            <div class="column">
                                <p><strong>Nama:</strong> {{ $kelas['nama'] }}</p>
                                <p><strong>Nilai:</strong> {{ $kelas['nilai'] }}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        @endfor
        <hr>

        <h1>Jumlah siswa yang akan mati di bulan ini</h1>
        <div class="container">
            @foreach ($dataMeninggal as $meninggal) 
                @if ($meninggal != null)
                    <div class="column meninggal">
                        <p><strong>Nama:</strong> {{ $meninggal['nama'] }}</p>
                        <p><strong>Nilai:</strong> {{ $meninggal['nilai'] }}</p>
                    </div>
                @endif
            @endforeach
            <p><strong>Total: <span id="total-mati"></span> </strong></p>
        </div>
        <hr>

        <h1>Jumlah siswa yang akan menikah di tahun depan</h1>
        <div class="container">
            @foreach ($kelas6 as $menikah) 
                @if ($menikah['nilai'] % 7 == 0)
                    <div class="column menikah">
                        <p><strong>Nama:</strong> {{ $menikah['nama'] }}</p>
                        <p><strong>Nilai:</strong> {{ $menikah['nilai'] }}</p>
                    </div>
                @endif
            @endforeach
            <p><strong>Total: <span id="total-nikah"></span> </strong></p>
        </div>
    </body>

    <script>
        const divsNikah = document.querySelectorAll('.menikah');
        document.getElementById('total-nikah').textContent = divsNikah.length;

        const divsMati = document.querySelectorAll('.meninggal');
        document.getElementById('total-mati').textContent = divsMati.length;
    </script>
</html>