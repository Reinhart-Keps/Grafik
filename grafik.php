<?php 
    $conn = mysqli_connect("localhost","root", "", "mmif");
    if(!$conn){
        die('gagal koneksi: ' . mysql_error());
    }

    
    // $result = mysqli_query($conn, ("SELECT * FROM mahasiswa WHERE NIM = '$NIM'"));
    // $row = mysqli_fetch_assoc($result);
    // $NIM = 'D121191051';
    // $pass = mysqli_query($conn, "SELECT * FROM password WHERE NIM='$NIM'");
    // $row_pass = mysqli_fetch_assoc($pass);
    // echo $row_pass["jam_password"];echo '<br>';

    // $tgl_sekarang=date("Y-m-d H:i:s", strtotime('+'. 6 .'hours'));//tanggal sekarang
    // echo 'sekarang:  ' . $tgl_sekarang; echo '<br>';

    // $jam_mulai=$row_pass["jam_password"];// jam launching password
    // echo $jam_mulai;echo '<br>';

    // $jangka_waktu = strtotime('+' . 20 . 'minutes', strtotime($jam_mulai));
    // echo $jangka_waktu;echo '<br>';
   
    // $tgl_exp=date("Y-m-d H:i:s",$jangka_waktu);//tanggal expired
    // echo 'exp:  ' . $tgl_exp;echo '<br>';
    // if ($tgl_sekarang >=$tgl_exp )
    // {
    // echo"Data sudah tidak berlaku";
    // }
    // else
    // {
    // echo "Masih dalam jangka waktu";
    // }

    // // $tgl_sekarang=date("Y-m-d");//tanggal sekarang
    // // $tgl_mulai="2020-07-27";// tanggal launching aplikasi
    // // $jangka_waktu = strtotime('+4 days', strtotime($tgl_mulai));// jangka waktu + 365 hari
    // // $tgl_exp=date("Y-m-d",$jangka_waktu);//tanggal expired
    // // if ($tgl_sekarang >=$tgl_exp )
    // // {
    // // echo"Data sudah tidak berlaku";
    // // }
    // // else
    // // {
    // // echo "Masih dalam jangka waktu";
    // // }

    // echo '<br>';echo '<br>';echo '<br>';





    
    $data_awal ="2020-08-02 00:00:00";
    $loop = 16;
    $calonketude1 = [];
    $calonketude2 = [];
    $calonketum1 = [];
    $calonketum2 = [];
    // $data = 12;

    function kedua(){
        for($data=0; $data<$loop*1.5; $data+=6){
            $enamjam = date('Y-m-d H:i:s', strtotime('+1 days +'.$data.'hours',strtotime($data_awal)));
            echo $enamjam;
            echo '<br>';
            $calonketude1[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
            $calonketude2[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
            $calonketum1[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
            $calonketum2[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
        }
        echo '<br>';
        $q1 = '';
        $q2 = '';
        $q3 = '';
        $q4 = '';
        
        for($data=0; $data<6;$data++){
            while($datas = mysqli_fetch_array($calonketude1[$data])) {
                $q1 = $q1.$datas['calonketude1'].',';
            }
            while($datas = mysqli_fetch_array($calonketude2[$data])) {
                $q2 = $q2.$datas['calonketude2'].',';
            }
            while($datas = mysqli_fetch_array($calonketum1[$data])) {
                $q3 = $q3.$datas['calonketum1'].',';
            }
            while($datas = mysqli_fetch_array($calonketum2[$data])) {
                $q4 = $q4.$datas['calonketum2'].',';
            }

        }
    }
    
    // echo '<br>';echo '<br>';
    function ketiga(){
        for($data=0; $data<$loop*1.5; $data+=6){
            $enamjam = date('Y-m-d H:i:s', strtotime('+2 days +'.$data.'hours',strtotime($data_awal)));
            echo $enamjam;
            echo '<br>';
            $calonketude1[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
            $calonketude2[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
            $calonketum1[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
            $calonketum2[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
        }
        echo '<br>';
        $q1 = '';
        $q2 = '';
        $q3 = '';
        $q4 = '';
        
        for($data=0; $data<6;$data++){
            while($datas = mysqli_fetch_array($calonketude1[$data])) {
                $q1 = $q1.$datas['calonketude1'].',';
            }
            while($datas = mysqli_fetch_array($calonketude2[$data])) {
                $q2 = $q2.$datas['calonketude2'].',';
            }
            while($datas = mysqli_fetch_array($calonketum1[$data])) {
                $q3 = $q3.$datas['calonketum1'].',';
            }
            while($datas = mysqli_fetch_array($calonketum2[$data])) {
                $q4 = $q4.$datas['calonketum2'].',';
            }
        }
    }
    
    // echo '<br>';echo '<br>';
    // function pertama(){
        for($data=0; $data<$loop*1.5; $data+=6){
            $enamjam = date('Y-m-d H:i:s', strtotime('+'. $data .'hours',strtotime($data_awal)));
            echo $enamjam;
            echo '<br>';
            $calonketude1[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
            $calonketude2[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
            $calonketum1[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
            $calonketum2[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
        }
        echo '<br>';
        $q1 = '';
        $q2 = '';
        $q3 = '';
        $q4 = '';
        
        for($data=0; $data<4;$data++){
            while($datas = mysqli_fetch_array($calonketude1[$data])) {
                $q1 = $q1.$datas['calonketude1'].',';
            }
            while($datas = mysqli_fetch_array($calonketude2[$data])) {
                $q2 = $q2.$datas['calonketude2'].',';
            }
            while($datas = mysqli_fetch_array($calonketum1[$data])) {
                $q3 = $q3.$datas['calonketum1'].',';
            }
            while($datas = mysqli_fetch_array($calonketum2[$data])) {
                $q4 = $q4.$datas['calonketum2'].',';
            }

        }
    // }
    



    // echo '<br>';echo '<br>';
    
    // echo $q1.'data, pada jam: '. $tigajam;
    // echo $q2.'data, pada jam: '. $tigajam;
    // echo $q3.'data, pada jam: '. $tigajam;
    // echo $q4.'data, pada jam: '. $tigajam;

    // echo '<br>';echo '<br>';echo '<br>';echo '<br>';
    // $NIM='D121191052';
    // $result = mysqli_query($conn, "SELECT NIM FROM suara_mmif");
    //     while($row = mysqli_fetch_assoc($result)){
    //         echo $row["NIM"];
    //         echo "<br>";
    //         $enc = base64_decode($row["NIM"]);
    //         echo $enc;
    //         echo "<br>";
    //         echo "<br>";
    //         if($NIM==$enc){
    //             echo "sama"; 
    //             echo "<br>";
    //         } else {
    //             echo "tidak sama";
    //             echo "<br>";
                
    //         }

    //         echo '<br>';echo '<br>';echo '<br>';echo '<br>';
        //     if( password_verify($NIM, $row["NIM"])) {
        //         $update1 = "UPDATE suara_mmif SET calonketude1='$data1', created_at=NOW()";
        //         mysqli_query($conn, $update1);
                
        //         $update = "UPDATE mahasiswa SET ketude='sudah' WHERE NIM = '$NIM'";
        //         mysqli_query($conn, $update);
        //         header("Location: halamanutamapemilih.php");
        //         exit;
        //     } else {
        //         continue;
        //     }
        // } 
    // mysqli_close($conn);
    
    
    // $pass=md5(Rein);
    // $result = mysqli_query($conn, "SELECT NIM FROM suara_mmif");

    // function decrypt
    // $enk_NIM = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256))  $enk_NIM);



    // $NI='Rein';
    // echo $NI;
    // echo "<br>";
    // $enk_NIM = base64_encode($NI);
    // echo $enk_NIM;
    // echo "<br>";
    
    // function encrypt($string, $enk_NIM){
    //     $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $enk_NIM, MCRYPT_MODE_ECB)));
    //     return $string;
    // }
    
    // $enk_NIM = base64_decode($enk_NIM);
    // echo $enk_NIM;
    // echo "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>
<body>
<!-- <div id="tes"></div>
<div id="tes1"></div>
<div id="tes2"></div> -->
<!-- <div id="chartContainer" style="height: 350px; width: 50%;"></div> -->
<div style="width: 350px; height:350px; margin: auto;">
        <form action="" method="post">
            <select class="grafikKetude" id="">
                <option value="hari">Hari</option>
                <option value="pertama">Pertama</option>
                <option value="kedua">Kedua</option>
                <option value="ketiga">Ketiga</option>
        </select>
        </form>
    <canvas id="chart1"></canvas>
        <form action="" method="post">
            <select class="grafikKetum" id="">
                <option value="hari">Hari</option>
                <option value="pertama">Pertama</option>
                <option value="kedua">Kedua</option>
                <option value="Ketiga">Ketiga</option>
        </select>
        </form>
    <canvas id="chart2"></canvas>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- <script>
    //tombol hari ketude
    $(document).ready(function(){
        $("select.grafik").change(function(){
            var hari = $(this).children("option:selected").val();
            
        });
    });

    // //tombol hari ketum
    // $(document).ready(function(){
    //     $("select.grafik").change(function(){
    //         var hari = $(this).children("option:selected").val();
            
    //     });
    // });
</script> -->



<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- <script>
   
$(document).ready(function() {
   
    let xlabel = [0];
    let interval = 3000 * 60 * 60 ;

    var ctx = document.getElementById('chart1').getContext('2d');
    
        
        var data = {
            labels: xlabel,
            datasets: [{
                label: "Ketude 1",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [<?php echo $q1?>]
                
                }
                , {
                label: "Ketude 2",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $q2?>] 
                
            }]
        };
        
        var options = {}

        var chart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
        
        setInterval(function() {
            waktu();
            
            var chart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        }, 2000);

        function waktu() {
            let d = new Date();
            let n = d.getHours();
            xlabel.push(n)
            // document.getElementById('tes1').innerHTML = xlabel;
            chart.render();
        };
    });


</script> -->
<script>

        $(document).ready(function() {
            let xlabel = [0];
            let interval = 3000 * 60 * 60 ;

            var ctx = document.getElementById('chart2').getContext('2d');
            $("select.grafikKetum").change(function(){
            var hari = $(this).children("option:selected").val();

            var data;

            if(hari=="pertama"){
                console.log(hari);
            } else if(hari=="kedua"){
                console.log(hari);
            }else if(hari=="ketiga"){
                console.log(hari);
            }else{
                data = {
                labels: xlabel,
                datasets: [{
                    label: "Ketum 1",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [<?php echo $q3?>]
                    }
                    , {
                    label: "Ketum 2",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [<?php echo $q4?>] 
                    
                }]
            };
            }

           
            
            var options = {}

            var chart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
            
            setInterval(function() {
                waktu();
                
                var chart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: options
                });
            }, 2000);

            function waktu() {
                let d = new Date();
                let n = d.getHours();
                xlabel.push(n)
                // document.getElementById('tes1').innerHTML = xlabel;
                chart.render();
            };
        });
    });

</script>

</body>
</html>