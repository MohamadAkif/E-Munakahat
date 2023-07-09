<?php
require_once __DIR__ . '/../Business Services/Model/IncentiveApplicationRecord.php';
require_once __DIR__ . '/../Business Services/Controller/IncentiveApplicationController.php';
require_once __DIR__ . '/../facade.php';

    $model = new IncentiveApplicationRecord();
    $controllers = new IncentiveApplicationController($model);
    $facade = new formFacade($controllers);

    class CheckApplicationStatus
    {

        private $facade;
        private $applicant;

        public function __construct($facade)
        {
            $this->facade = $facade;
        }
        public function searchIC()
        {

        if (isset($_GET['searchIC'])) {
        //$applicantIC = $_GET['applicantIC'];
        $applicantIC = isset($_GET['applicantIC']) ? $_GET['applicantIC']: '';

        if (isset($_GET['searchIC'])){

        $this->applicant = $this->facade->searchIC($applicantIC);
        
    }
}
        }

public function renderForm()
{
    $this->searchIC();
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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
            <a href="IncentiveApplicationMenu">Insentif</a>
            <!-- <a href="#">Salinan Document</a>
            <a href="#">Pembetulan Dokumen</a> -->
        </div>

    <h5>Masukkan Nombor Kad Pengenalan Pemohon</h5>
    <form action="" method="">
    <span><span class="required"></span></span><input type="text" class="" name="applicantIC" value=""><br><br>

    <input type="submit" name="searchIC" value="SEMAK"><br><br>
    </form>

    <form action="ViewApplicationInformation.php" method="GET">
    <table>
        <tr>
            <th>IC Pemohon</th>
            <th>Status</th>
        </tr>

    <?php if($this->applicant): ?> 
    <tr>
    <td><?php echo $this->applicant['applicant_ic']; ?></td>
    <td><?php echo $this->applicant['application_status']; ?></td>
    </tr>
    <?php endif; ?>
    </table>

    <br><br>
    <button onclick="window.location.href='IncentiveApplicationMenu.php'" class="button2">KEMBALI</button>
    </form>

    <div class="footer">
        <p>&copy; 2023 e-Munakahat system. All rights reserved.</p>
    </div>
</body>
</html>
<?php

    }
}

$form = new CheckApplicationStatus($facade);
$form->searchIC();
$form->renderForm();