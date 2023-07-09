<?php
require_once __DIR__ . '/../Business Services/Model/IncentiveApplicationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/IncentiveApplicationController.php';
require_once __DIR__ . '/../facade.php';

$model = new IncentiveApplicationRecord();
$controllers = new IncentiveApplicationController($model);
$facade = new formFacade($controllers);

$applicantIC = '';

if (isset($_GET['applicant_ic'])) {

    $applicantIC = $_GET['applicant_ic'];
   
}
$apptInfo = $facade->viewAppt($applicantIC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 12px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        }

        .submit-button {
        background-color: #4CAF50; 
        color: white; 
        border-radius: 6px;
        padding: 12px 20px; 
        font-size: 16px;
        border: none;
        transition: all 0.3s ease 0s;
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
        <a href="#">Kursus Perkahwinan</a>
        <a href="#">Permohonan Perkahwinan</a>
        <a href="#">Pendaftaran Perkahwinan</a>
        <a href="#">Khidmat Nasihat</a>
        <a href="IncentiveApplicationMenu.php">Insentif</a>
        <!-- <a href="#">Salinan Document</a>
        <a href="#">Pembetulan Dokumen</a> -->
    </div>

    <h2>Maklumat Pemohon</h2>
<table>
    <tr>
        <th>Nombor Kad Pengenalan</th>
        <td><?php echo $apptInfo['applicant_ic'] ?></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?php echo $apptInfo['applicant_name'] ?></td>
    </tr>
    <tr>
        <th>Jantina</th>
        <td><?php echo $apptInfo['applicant_gender'] ?></td>
    </tr>
    <tr>
        <th>Umur</th>
        <td><?php echo $apptInfo['applicant_age'] ?></td>
    </tr>
    <tr>
        <th>Gaji</th>
        <td><?php echo $apptInfo['applicant_salary'] ?></td>
    </tr>
</table>

<h2>Maklumat Pasangan</h2>
<table>
    <tr>
        <th>Nombor Kad Pengenalan</th>
        <td><?php echo $apptInfo['partner_ic'] ?></td>
    </tr>
    <tr>
        <th>Nama</th>
        <td><?php echo $apptInfo['partner_name'] ?></td>
    </tr>
    <tr>
        <th>Jantina</th>
        <td><?php echo $apptInfo['partner_gender'] ?></td>
    </tr>
    <tr>
        <th>Umur</th>
        <td><?php echo $apptInfo['partner_age'] ?></td>
    </tr>
    <tr>
        <th>Gaji</th>
        <td><?php echo $apptInfo['partner_salary'] ?></td>
    </tr>
</table>

<table>
    <tr>
        <th>Ubahsuai<th>
        <td><a href="UpdateApplicantInformation.php?applicant_ic=<?php echo $apptInfo['consultation_id'] ?>">Ubahsuai maklumat</a></td>
    </tr>
</table>

<form action="NewApplicationPage.php" method="post">
    <input class="button" type="submit" value="KEMBALI" name="back">
</form>

<button type="submit" name="submitApplicant" class="submit-button" onclick="alert('MAKLUMAT SELESAI DIHANTAR')">HANTAR</button>
</body>

<footer>
    <div class="footer">
    <p>&copy; 2023 e-MUnakahat system. All rights reserved.</p>
    </div>
    </footer>
</html>