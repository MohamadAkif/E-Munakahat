<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<script>
    const form = document.getElementById("next_page");
    form.addEventListener("submit", (event) => {
    event.preventDefault();
    window.location.href = "NewApplicationPage.php";
  });

    const form = document.getElementById("next_page1");
    form.addEventListener("submit", (event) => {
    event.preventDefault();
    window.location.href = "CheckApplicationStatus.php";
  });

</script>
<style>
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
        <a href="#">Kursus Perkahwinan</a>
        <a href="#">Permohonan Perkahwinan</a>
        <a href="#">Pendaftaran Perkahwinan</a>
        <a href="#">Khidmat Nasihat</a>
        <a href="#">Insentif</a>
        <!-- <a href="#">Salinan Document</a>
        <a href="#">Pembetulan Dokumen</a> -->
    </div>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bantuan Perkahwinan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Bantuan Perkahwinan</h1>
  </header>
  
  <main>
    <section>
      <h2>Syarat Kelayakan</h2>
      
      <article>
        <h3>Insentif ini disediakan untuk pasangan yang pengantin lelakinya berpendapatan RM5000.00 dan ke bawah tertakluk kepada syarat-syarat dan garis panduan yang ditentukan.</h3>
        
        <ul>
          <li>Hanya anak-anak Pahang sahaja yang layak menerima insentif ini.</li>
          <li>Samada pengantin lelaki atau perempuan mestilah anak kelahiran Negeri Pahang.</li>
          <li>Pasangan pengantin yang mana pengantin lelaki sahaja berpendapatan RM5000.00 dan ke bawah layak menerima insentif.</li>
          <li>Bagi perkahwinan di luar negeri Pahang, pengantin lelaki mestilah anak kelahiran Pahang.(Kebenaran Luar Negeri (KBLN)).</li>
          <li>Perkahwinan ini mestilah didaftarkan di Negeri Pahang dengan Kebenaran Pejabat Agama Islam Daerah.</li>
          <li>Perkahwinan anak Pahang yang didaftarkan di luar negeri Pahang,pengantin perlu membuat permohonan dan pengesahan di Pejabat Agama Islam (dimana tempat permohonan).</li>
          <li>Bagi pemastautin di negeri Pahang sekurang-kurangnya 10 tahun atau lebih, perlu mendapatkan pengesahan dari Penghulu/ADUN Kawasan/pengurus FELDA/Imam Qaryah atau Penyelaras.</li>
          <li>Duda atau Janda atau salah seorang yang mana pasangannya adalah anak negeri Pahang dan berkelayakan, perkahwinan kali pertama dengan pasangan yang lain, layak untuk menerima insentif.</li>
          <li>Setiap permohonan perlu hantar ke Pejabat Agama Islam Daerah di mana Permohonan Kebenaran atau Pendaftaran Perkahwinan di buat.</li>
        </ul>
      </article>
      
      <article>
        <h3>Anda tidak layak sekiranya</h3>
        
        <ul>
          <li>Poligami</li>
          <li>Nikah semula (pasangan yang sama selepas tamat tempoh iddah)</li>
          <li>Nikah tanpa kebenaran</li>
          <li>Kedua pasangan bukan asal Pahang</li>
          <li>Pendapatan lelaki melebihi RM 5,000.00</li>
        </ul>
      </article>
      
      <button onclick="window.location.href='NewApplicationPage.php'" class="btn-primary">Permohonan Baru</button>
      <button onclick="window.location.href='CheckApplicationStatus.php'" class="btn-primary">Semakan Permohonan</button>
    </section>
  </main>

</body>
</html>
    
    <style>

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        }

    header {
        background-color: #555;
        color: #fff;
        text-align: center;
        padding: 5px;
        }

    main {
        margin: 20px;
        }

    section {
        border: 1px solid #999;
        padding: 10px;
        }

    h2 {
        margin-top: 0;
        }

    ul {
        list-style: disc;
        margin-left: 20px;
        }

    article {
        margin-bottom: 20px;
        }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-right: 10px;
        cursor: pointer;
        }

    .btn-primary:hover {
        background-color: #0069d9;
        }


    </style>

    <div class="footer">
        <p>&copy; 2023 e-Munakahat system. All rights reserved.</p>
    </div>

</body>
</html>