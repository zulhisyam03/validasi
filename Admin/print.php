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
    $nim = $_GET['nim'];

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
            </div>
    ';
        
    $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output("Tanda Terima Skripsi.pdf","D");
    
    ?>