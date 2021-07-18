<?php
    require_once __DIR__.'/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf( [
        'mode' => 'utf-8',
        'format' => 'legal',
        'margin_left' => 0,
        'margin_right' => 0,
        'margin_top' => 0,
        'margin_bottom' => 0,
        'margin_header' => 0,
        'margin_footer' => 0
    ]);
/*
    $mpdf->showImageErrors = true;
    $mpdf->img_dpi = 96;
    $mpdf->imageVars['myvariable'] = file_get_contents('header.png');
*/
    include "../connect.php";

    $nim_mhs    = $_GET['nim'];

    //Ubah Format Tanggal Bahasa Indonesia
    function tgl_indo($tgl)
    {
        $bulan  = array(1=> "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"
        );
        $split = explode("-",$tgl);
        return $split[2]." ".$bulan[$split[1]]." ".$split[0];
    }

    $q_prodi = mysqli_query($db,"SELECT * FROM admin");
    $d_prodi = mysqli_fetch_array($q_prodi);

    $query  = mysqli_query($db,"SELECT skripsi.nim,biodata.nama,skripsi.judul,biodata.prodi FROM skripsi,biodata WHERE skripsi.nim=biodata.nim and biodata.nim='$nim_mhs'");
    $data   = mysqli_fetch_array($query);

    $nama_mhs       = $data['nama'];
    $judul          = $data['judul'];
    $prodi          = $data['prodi'];
    $jurusan        = $d_prodi['jurusan'];
    $ket_jurusan    = $d_prodi['ketua_jur'];
    $nip            = $d_prodi['nip'];

    $stylesheet = file_get_contents('print.css');
    $html = '
            <div class="f4">
                <div class="header">           
                    <img src="untad_header.jpg" alt="" class="img1"> 
                    <div class="headtext">
                        KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI<br>
                        <b class="untad">UNIVERSITAS TADULAKO</b><br>
                        FAKULTAS ILMU SOSIAL DAN ILMU POLITIK<br>
                        <span class="addres">
                            Kampus Bumi Tadulako Tondo Palu - Sulawesi Tengah 94111<br>
                            Jl.Soekarno-Hatta Km.9 Telp. (0451) 422611 - 422355 Fax. (0451) 422844, Email : untadfisip18@gmail.com
                        </span>
                    </div>                    
                    
                    <img src="./hr.jpg" alt="" class="hr">
                    <img src="./faculty.jpg" alt="" class="img2">
                </div>
                <p class="a">
                    <b><u>TANDA TERIMA SKRIPSI</u></b>
                    <p>
                <div class="isi">                    
                    Ketua Jurusan Ilmu Administrasi Fakultas Ilmu Sosial dan Ilmu Politik Universitas Tadulako, Menyatakan benar telah menerima satu berkas Skripsi Mahasiswa.
                    <br>&nbsp;
                    <table border="0">
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td>'.$nama_mhs.'</td>
                        </tr>
                        <tr>
                            <td>STAMBUK</td>
                            <td>:</td>
                            <td>'.$nim_mhs.'</td>
                        </tr>
                        <tr>
                            <td>PROGRAM STUDI</td>
                            <td>:</td>
                            <td>'.$prodi.'</td>
                        </tr>
                        <tr>
                            <td>JUDUL SKRIPSI</td>
                            <td>:</td>
                            <td>'.$judul.'</td>
                        </tr>
                    </table>
                    <p>
                    Hal tersebut dimaksudkan sebagai salah sati syarat kelengkapan administrasi jurusan.<p>
                    Demikian surat keterangan ini dibuat untuk sebagaimana mestinya.
                    <p>
                    <div class="paraf">
                        <img class="imgttd" src="assets/ttd.jpg">
                        <br>
                        Palu, '.tgl_indo(date("Y-n-j")).'<br>
                        Ketua Jurusan '.$jurusan.',
                        <p>&nbsp;
                        <br>&nbsp;
                        <br><u><b>'.$ket_jurusan.'</b></u><br><b>Nip. '.$nip.'</b>
                    </div>
                    
                    <div class="arsip">
                        <sup>i</sup>Arsip<br>
                        <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br>
                        <span class="c">
                        1. Jurusan Ilmu Administrasi<br>
                        2. Mahasiswa
                        </span>
                    </div>
                </div>
            </div>
    ';
        
    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output("Tanda Terima Skripsi - ".$nama_mhs.".pdf","D");
    
    ?>