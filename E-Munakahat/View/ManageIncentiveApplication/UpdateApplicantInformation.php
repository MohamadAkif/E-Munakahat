<?php

if (isset($_POST['submit'])){
    $applicant_name=$_POST['applicant_ic'];
    $applicant_name=$_POST['applicant_name'];
    $applicant_gender=$_POST['applicant_gender'];
    $applicant_age=$_POST['applicant_age'];
    $applicant_salary=$_POST['applicant_salary'];
    $partner_ic=$_POST['partner_ic'];
    $partner_name=$_POST['partner_name'];
    $partner_gender=$_POST['partner_gender'];
    $partner_age=$_POST['partner_age'];
    $partner_salary=$_POST['partner_salary'];

    $sql="insert into `applicant` (applicant_ic,applicant_name,applicant_gender,applicant_age,applicant_salary) values ('$applicant_ic','$applicant_name','$applicant_gender','$applicant_age','$applicant_salary'); 
          insert into `partner` (partner_ic,partner_name,partner_gender,partner_age,partner_salary) values ('$partner_ic','$partner_name','$partner_gender','$partner_age','$partner_salary')";
    $result=mysqli_multi_query($con,$sql);
    if($result){
      // echo "Data inserted successfully";
      header('location:requestMarriageDisplay.php');
    }
    else{
      die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            width: 50%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .title{
            padding: 10px;
            font-family:"lucida console", monospace;
            background-color: #16537e;
            color: #f2f2f2;
        }
        
        .body{
            background-color:#cfe2f3;
        }

        /* CSS styles for the navigation bar */
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        /* CSS styles for the footer */
        .footer {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }
        </style>

       

</head>
<body>
<div class="title">
        <h1><b>e-Munakahat</b></h1>
        <h2>SISTEM MAKLUMAT PERKAHWINAN PAHANG</H2>
    </div>

    <div class="navbar">
        <a href="#">Profil</a>
        <a href="">Kursus Perkahwinan</a>
        <a href="#">Permohonan Perkahwinan</a>
        <a href="#">Pendaftaran Perkahwinan</a>
        <a href="#">Khidmat Nasihat</a>
        <a href="IncentiveApplicationMenu.php">Insentif</a>
        <!-- <a href="#">Salinan Document</a>
        <a href="#">Pembetulan Dokumen</a> -->
    </div>
        
    <form action="" method="post">
  <fieldset>
    <legend>Maklumat Pemohon</legend>
    <label for="ic_pemohon">No KP Pemohon<span class="required">*</span></label>
    <input type="text" id="ic_pemohon" name="ic_pemohon" required><br><br>
    
    <label for="nama_pemohon">Nama Pemohon<span class="required">*</span></label>
    <input type="text" id="nama_pemohon" name="nama_pemohon" required><br><br>
    
    <label for="alamat_pemohon">Alamat Pemohon<span class="required">*</span></label>
    <input type="text" id="alamat_pemohon" name="alamat_pemohon" required><br><br>
    
    <label for="phone_pemohon">Nombor Telefon Pemohon<span class="required">*</span></label>
    <input type="tel" id="phone_pemohon" name="phone_pemohon" required><br><br>
    
    <label for="email_pemohon">Email Pemohon<span class="required">*</span></label>
    <input type="email" id="email_pemohon" name="email_pemohon" required><br><br>
  </fieldset>
  
  <fieldset>
    <legend>Maklumat Pasangan</legend>
    <label for="ic_pasangan">No KP Pasangan<span class="required">*</span></label>
    <input type="text" id="ic_pasangan" name="ic_pasangan" required><br><br>
    
    <label for="nama_pasangan">Nama Pasangan<span class="required">*</span></label>
    <input type="text" id="nama_pasangan" name="nama_pasangan" required><br><br>
    
    <label for="alamat_pasangan">Alamat Pasangan<span class="required">*</span></label>
    <input type="text" id="alamat_pasangan" name="alamat_pasangan" required><br><br>
    
    <label for="phone_pasangan">Nombor Telefon Pasangan<span class="required">*</span></label>
    <input type="tel" id="phone_pasangan" name="phone_pasangan" required><br><br>
    
    <label for="email_pasangan">Email Pasangan<span class="required">*</span></label>
    <input type="email" id="email_pasangan" name="email_pasangan" required><br><br>
  </fieldset>
</form>

    <input type="submit" name="submitApplicant" value="HANTAR" onclick="alert('MAKLUMAT SELESAI DIHANTAR')">

    <footer>
    <div class="footer">
    <p>&copy; 2023 e-MUunakahat system. All rights reserved.</p>
    </div>
    </footer>
</form>