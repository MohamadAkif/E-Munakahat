<?php

require_once __DIR__ . '/../Business Services/Model/IncentiveApplicationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/IncentiveApplicationController.php';
require_once __DIR__ . '/../facade.php';

$model = new IncentiveApplicationRecord();
$controllers = new IncentiveApplicationController($model);
$facade = new formFacade($controllers);

$applicantIC = '';
$application_status = '';

if (isset($_GET['applicant_ic'])) {
    $applicantIC = $_GET['applicant_ic']; 
}
$applicantDetail = $facade->viewDetail($applicantIC);
$applicantIC = $applicantDetail['applicant_ic'];


if (isset($_POST['submitStatus']))
{
    $application_status = $_POST['application_status'];
} 

?>

<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <style>
        
                .title{
                    padding: 10px;
                    font-family:"lucida console", monospace;
                    background-color: #6DA740;
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
                table {
                border-collapse: collapse;
                width: 100%;
                }
  
                th, td {
                text-align: left;
                padding: 8px;
                border-bottom: 1px solid #ddd;
                }
  
                th {
                background-color: #f2f2f2;
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
        <a href="IncentiveApplicationListPage.php">Insentif</a>
        <!-- <a href="#">Salinan Document</a>
        <a href="#">Pembetulan Dokumen</a> -->
    </div>
    <table>
  <thead>
    <tr>
      <th colspan="2">Maklumat Pemohon</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>No KP Pemohon</td>
      <td><?php echo $applicantDetail['applicant_ic'] ?></td>
    </tr>
    <tr>
      <td>Nama Pemohon</td>
      <td><?php echo $applicantDetail['applicant_name'] ?></td>
    </tr>
    <tr>
      <td>Jantina Pemohon</td>
      <td><?php echo $applicantDetail['applicant_gender'] ?></td>
    </tr>
    <tr>
      <td>Umur Pemohon</td>
      <td><?php echo $applicantDetail['applicant_age'] ?></td>
    </tr>
    <tr>
      <td>Gaji Pemohon</td>
      <td><?php echo $applicantDetail['applicant_salary'] ?></td>
    </tr>
  </tbody>
  
  <thead>
    <tr>
      <th colspan="2">Maklumat Pasangan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>No KP Pasangan</td>
      <td><?php echo $applicantDetail['partner_ic'] ?></td>
    </tr>
    <tr>
      <td>Nama Pasangan</td>
      <td><?php echo $applicantDetail['partner_name'] ?></td>
    </tr>
    <tr>
      <td>Jantina Pasangan</td>
      <td><?php echo $applicantDetail['partner_gender'] ?></td>
    </tr>
    <tr>
      <td>Umur Pasangan</td>
      <td><?php echo $applicantDetail['partner_age'] ?></td>
    </tr>
    <tr>
      <td>Gaji Pasangan</td>
      <td><?php echo $applicantDetail['partner_salary'] ?></td>
    </tr>
  </tbody>
</table>
    
  <form action="" method="POST">

    <label for="application_status">Status Permohonan:</label>
    <select name="application_status" id="status">
        <option value="Berjaya">Berjaya</option>
        <option value="Tidak Berjaya">Tidak berjaya</option>
</select><br><br>

<input type="submit" name="submitApplicant" value="HANTAR" onclick="alert('MAKLUMAT SELESAI DIHANTAR')">
   

</form>
</body>
<footer>
    <div class="footer">
    <p>&copy; 2023 e-Munakahat system. All rights reserved.</p>
    </div>
</footer>
</html>