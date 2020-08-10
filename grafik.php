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
    // $data_awal ="2020-08-02 00:00:00";
    // $loop = 16;
    // $calonketude1 = [];
    // $calonketude2 = [];
    // $calonketum1 = [];
    // $calonketum2 = [];
    // $data = 12;


    $data_awal ="2020-08-07 00:00:00";
    $loop = 16;
    $calonketude1 = [];
    $calonketude2 = [];
    $calonketum1 = [];
    $calonketum2 = [];
    
    for($data=0; $data<$loop*3; $data+=3){
        $tigajam = date('Y-m-d H:i:s', strtotime('+'.$data.'hours',strtotime($data_awal)));
        
        $calonketude11[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$tigajam'");
        $calonketude2[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$tigajam'");
        $calonketum1[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$tigajam'");
        $calonketum2[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$tigajam'");
    }

    // echo '<br>';
    $q1 = '';
    $q2 = '';
    $q3 = '';
    $q4 = '';
    
    for($data=0; $data<$loop;$data++){
        while($datas = mysqli_fetch_array($calonketude11[$data])) {
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
    echo $q1.'data, pada jam: '. $tigajam;
    echo '<br>';
    echo $q2.'data, pada jam: '. $tigajam;
    echo '<br>';
    echo $q3.'data, pada jam: '. $tigajam;
    echo '<br>';
    echo $q4.'data, pada jam: '. $tigajam;

    echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';
    
    $data_awal ="2020-08-07 00:00:00";
    $loop = 16;
    $calonketude11 = [];
    $calonketude12 = [];
    $calonketum11 = [];
    $calonketum12 = [];

    $q11 = '';
    $q12 = '';
    $q13 = '';
    $q14 = '';


    //Data grafik hari pertama
    for($data=0; $data<$loop*1.5; $data+=6){
        $enamjam = date('Y-m-d H:i:s', strtotime('+'. $data .'hours',strtotime($data_awal)));
        // echo $enamjam;
        echo '<br>';
        $calonketude11[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
        $calonketude12[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
        $calonketum11[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
        $calonketum12[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
    }
    echo '<br>';
    
    for($data=0; $data<4;$data++){
        while($datas = mysqli_fetch_array($calonketude11[$data])) {
            $q11 = $q11.$datas['calonketude1'].',';
        }
        while($datas = mysqli_fetch_array($calonketude12[$data])) {
            $q12 = $q12.$datas['calonketude2'].',';
        }
        while($datas = mysqli_fetch_array($calonketum11[$data])) {
            $q13 = $q13.$datas['calonketum1'].',';
        }
        while($datas = mysqli_fetch_array($calonketum12[$data])) {
            $q14 = $q14.$datas['calonketum2'].',';
        }
    }
    echo $q11.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo $q12.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo $q13.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo $q14.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo '<br>';

    // Data grafik hari kedua
    $calonketude21 = [];
    $calonketude22 = [];
    $calonketum21 = [];
    $calonketum22 = [];

    $q21 = '';
    $q22 = '';
    $q23 = '';
    $q24 = '';

    for($data=0; $data<$loop*1.5; $data+=6){
        $enamjam = date('Y-m-d H:i:s', strtotime('+1 days +'.$data.'hours',strtotime($data_awal)));
        echo $enamjam;
        echo '<br>';
        $calonketude21[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
        $calonketude22[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
        $calonketum21[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
        $calonketum22[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
    }
    echo '<br>';
    
    for($data=0; $data<4;$data++){
        while($datas = mysqli_fetch_array($calonketude21[$data])) {
            $q21 = $q1.$datas['calonketude1'].',';
        }
        while($datas = mysqli_fetch_array($calonketude22[$data])) {
            $q22 = $q2.$datas['calonketude2'].',';
        }
        while($datas = mysqli_fetch_array($calonketum21[$data])) {
            $q23 = $q3.$datas['calonketum1'].',';
        }
        while($datas = mysqli_fetch_array($calonketum22[$data])) {
            $q24 = $q4.$datas['calonketum2'].',';
        }
    }
    
    // Data grafik hari ketiga
    $calonketude31 = [];
    $calonketude32 = [];
    $calonketum31 = [];
    $calonketum32 = [];

    $q31 = '';
    $q32 = '';
    $q33 = '';
    $q34 = '';

    for($data=0; $data<$loop*6; $data+=6){
        $enamjam = date('Y-m-d H:i:s', strtotime('+'.$data.'hours',strtotime($data_awal)));
        echo $enamjam;
        echo '<br>';
        $calonketude31[]=mysqli_query($conn, "SELECT SUM(calonketude1) AS calonketude1 FROM suara_mmif WHERE calonketude1=1  AND created_at<='$enamjam'");
        $calonketude32[]=mysqli_query($conn, "SELECT SUM(calonketude2) AS calonketude2 FROM suara_mmif WHERE calonketude2=1  AND created_at<='$enamjam'");
        $calonketum31[]=mysqli_query($conn, "SELECT SUM(calonketum1) AS calonketum1 FROM suara_mmif WHERE calonketum1=1  AND created_at<='$enamjam'");
        $calonketum32[]=mysqli_query($conn, "SELECT SUM(calonketum2) AS calonketum2 FROM suara_mmif WHERE calonketum2=1  AND created_at<='$enamjam'");
    }
    echo '<br>';
    
    for($data=0; $data<$loop;$data++){
        while($datas = mysqli_fetch_array($calonketude31[$data])) {
            $q31 = $q1.$datas['calonketude1'].',';
        }
        while($datas = mysqli_fetch_array($calonketude32[$data])) {
            $q32 = $q2.$datas['calonketude2'].',';
        }
        while($datas = mysqli_fetch_array($calonketum31[$data])) {
            $q33 = $q3.$datas['calonketum1'].',';
        }
        while($datas = mysqli_fetch_array($calonketum32[$data])) {
            $q34 = $q4.$datas['calonketum2'].',';
        }
    }
    echo $q31.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo $q32.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo $q33.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo $q34.'data, pada jam: '. $enamjam;
    echo '<br>';
    echo '<br>';
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
    <form action="" method="post" id="grafikKetude">
        <select class="grafikKetude">
            <option value="hari">Hari</option>
            <option value="pertama1">Pertama</option>
            <option value="kedua1">Kedua</option>
            <option value="ketiga1">Ketiga</option>
        </select>
    </form>
    <canvas id="chart1"></canvas>
</div>
<div style="width: 350px; height:350px; margin: auto;">
    <form action="" method="post" id="grafikKetum">
        <select class="grafikKetum" >
            <option value="hari">Hari</option>
            <option value="pertama2">Pertama</option>
            <option value="kedua2">Kedua</option>
            <option value="Ketiga2">Ketiga</option>
        </select>
    </form>
    <canvas id="chart2"></canvas>
</div>


 <!-- c="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> --> --> -->
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

<script>
$(document).ready(function() {
    
    var hari2 = $('.grafikKetum').val();
    
    filterData = (hari2) => {
        if(hari2 == 'pertama2'){
            chartKetum1();
        } else if(hari2 == 'kedua2'){
            chartKetum2();
        } else if(hari2 == 'Ketiga2') {
            chartKetum3();
        }
    }

    
    chartKetum1 = () =>{
        $.ajax({
            url:'grafik.php',
            method: 'post',
            datatype: 'json',
            success: (res) => {
                let xlabel = [0];
                let interval = 3000 * 60 * 60 ;
                // 
                var ctx = document.getElementById('chart2').getContext('2d');
                data = {
                labels: xlabel,
                datasets: [{
                    label: "Keeeeeeeetum 1",
                    backgroundColor: 'transparent',
                    borderColor: 'black',
                    data: [0, <?php echo $q13?>]
                    }
                    , {
                    label: "Keeeeeeeetum 2",
                    backgroundColor: 'transparent',
                    borderColor: '#6397BD',
                    data: [0, <?php echo $q14?>]    
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
                }
            }
        })
    }

    chartKetum2 = () =>{
        $.ajax({
            url:'grafik.php',
            method: 'post',
            datatype: 'json',
            success: (res) => {
                let xlabel = [0];
                let interval = 3000 * 60 * 60 ;
                var ctx = document.getElementById('chart2').getContext('2d');
                data = {
                labels: xlabel,
                datasets: [{
                    label: "Kettttttttttum 1",
                    backgroundColor: 'transparent',
                    borderColor: 'black',
                    data: [0, <?php echo $q23?>]
                    }
                    , {
                    label: "Ketttttttttttttum 2",
                    backgroundColor: 'transparent',
                    borderColor: '#6397BD',
                    data: [0, <?php echo $q24?>]    
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
                }
            }
        })
    }

    chartKetum3 = () =>{
        $.ajax({
            url:'grafik.php',
            method: 'post',
            datatype: 'json',
            success: (res) => {
                let xlabel = [0];
                let interval = 3000 * 60 * 60 ;
                // 
                var ctx = document.getElementById('chart2').getContext('2d');
                data = {
                labels: xlabel,
                datasets: [{
                    label: "Ketuuuuuuuuuuum 1",
                    backgroundColor: 'transparent',
                    borderColor: 'black',
                    data: [0, <?php echo $q33?>]
                    }
                    , {
                    label: "Ketuuuuuuuuuuuuuuuuum 2",
                    backgroundColor: 'transparent',
                    borderColor: '#6397BD',
                    data: [0, <?php echo $q34?>]    
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
                }
            }
        })
    }

    $(document).on('change','#grafikKetum', () => {
    hari2 = $('.grafikKetum').val()

    filterData(hari2)
    });
})
</script>

<script>
    $(document).ready(function() {
        var hari1 = $('.grafikKetude').val();

        filterData = (hari1) => {
            if(hari1 == 'pertama1'){
                chartKetude1()
            } else if(hari1 == 'kedua1'){
                chartKetude2()
            } else if(hari1 == 'ketiga1') {
                chartKetude3()
            }
        }

        
        chartKetude1 = () =>{
            $.ajax({
                url:'grafik.php',
                method: 'post',
                datatype: 'json',
                success: (res) => {
                    let xlabel = [0];
                    let interval = 3000 * 60 * 60 ;
                    // 
                    var ctx = document.getElementById('chart1').getContext('2d');
                    data = {
                    labels: xlabel,
                    datasets: [{
                        label: "Kettttude 1",
                        backgroundColor: 'transparent',
                        borderColor: 'black',
                        data: [0, <?php echo $q11?>]
                        }
                        , {
                        label: "Ketttttude 2",
                        backgroundColor: 'transparent',
                        borderColor: '#6397BD',
                        data: [0, <?php echo $q12?>]    
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
                    }
                }
            })
        }

        chartKetude2 = () =>{
            $.ajax({
                url:'grafik.php',
                method: 'post',
                datatype: 'json',
                success: (res) => {
                    let xlabel = [0];
                    let interval = 3000 * 60 * 60 ;
                    var ctx = document.getElementById('chart1').getContext('2d');
                    data = {
                    labels: xlabel,
                    datasets: [{
                        label: "Ketuuuuuuuuude 1",
                        backgroundColor: 'transparent',
                        borderColor: 'black',
                        data: [0, <?php echo $q21?>]
                        }
                        , {
                        label: "Ketuuuuuuude 2",
                        backgroundColor: 'transparent',
                        borderColor: '#6397BD',
                        data: [0, <?php echo $q22?>]    
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
                    }
                }
            })
        }

        chartKetude3 = () =>{
            $.ajax({
                url:'grafik.php',
                method: 'post',
                datatype: 'json',
                success: (res) => {
                    let xlabel = [0];
                    let interval = 3000 * 60 * 60 ;
                    // 
                    var ctx = document.getElementById('chart1').getContext('2d');
                    data = {
                    labels: xlabel,
                    datasets: [{
                        label: "Ketuddddddde 1",
                        backgroundColor: 'transparent',
                        borderColor: 'black',
                        data: [0, <?php echo $q31?>]
                        }
                        , {
                        label: "Ketuddddddde 2",
                        backgroundColor: 'transparent',
                        borderColor: '#6397BD',
                        data: [0, <?php echo $q32?>]    
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
                    }
                }
            })
        }

        $(document).on('change','#grafikKetude', () => {
        hari1 = $('.grafikKetude').val()

        filterData(hari1)
        });
    })
</script>

</body>
</html>
