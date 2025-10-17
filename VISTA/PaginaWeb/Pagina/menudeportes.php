<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/menudeportes.css">
  <title><?php $md_meta=['es'=>'Scuola Italiana - Deportes','en'=>'Scuola Italiana - Sports','it'=>'Scuola Italiana - Sport']; echo $md_meta[$cl]; ?></title>

  
</head>
<div id="cms-root"></div>

<body>
  <div class="main-container">
    <img class="bg-image" src="https://placehold.co/1410x2262" />
    <div class="overlay"></div>
    
    <div class="header">
      <img class="logo" src="https://placehold.co/294x104" />
      <img class="menu-icon" src="https://placehold.co/72x75" />
    </div>

    <?php 
      $md = [
        'futbol' => ['es'=>'Fútbol','en'=>'Football','it'=>'Calcio'],
        'handball' => ['es'=>'Handball','en'=>'Handball','it'=>'Pallamano'],
        'hockey' => ['es'=>'Hockey','en'=>'Hockey','it'=>'Hockey'],
        'voley' => ['es'=>'Vóley','en'=>'Volleyball','it'=>'Pallavolo'],
        'gimnasia' => ['es'=>'Gimnasia Artística','en'=>'Artistic Gymnastics','it'=>'Ginnastica Artistica'],
        'atletismo' => ['es'=>'Atletismo','en'=>'Athletics','it'=>'Atletica'],
      ];
    ?>
    <div class="content">

      <a href="IntercambioArgentina.php" class="sport-card futbol left">
        <img class="sport-bg" src="https://placehold.co/800x148" />
        <div class="sport-overlay">
          <div class="sport-title"><?php echo $md['futbol'][$cl]; ?></div>

        </div>
      </a>

      <a href="handball.php" class="sport-card handball right">
        <img class="sport-bg" src="https://placehold.co/800x150" />
        <div class="sport-overlay">
          <div class="sport-title"><?php echo $md['handball'][$cl]; ?></div>

        </div>
      </a>

      <a href="hockey.php" class="sport-card hockey left">
        <img class="sport-bg" src="https://placehold.co/800x150" />
        <div class="sport-overlay">
          <div class="sport-title"><?php echo $md['hockey'][$cl]; ?></div>

        </div>
      </a>

      <a href="voley.php" class="sport-card voley right">
        <img class="sport-bg" src="https://placehold.co/800x150" />
        <div class="sport-overlay">
          <div class="sport-title"><?php echo $md['voley'][$cl]; ?></div>

        </div>
      </a>

      <a href="gimnasia.php" class="sport-card gimnasia left">
        <img class="sport-bg" src="https://placehold.co/800x150" />
        <div class="sport-overlay">
          <div class="sport-title"><?php echo $md['gimnasia'][$cl]; ?></div>

        </div>
      </a>

      <a href="atletismo.php" class="sport-card atletismo right">
        <img class="sport-bg" src="https://placehold.co/800x150" />
        <div class="sport-overlay">
          <div class="sport-title"><?php echo $md['atletismo'][$cl]; ?></div>

        </div>
      </a>
    </div>

    <img class="footer" src="https://placehold.co/1379x391" />
  </div>

<script src="breadcrumbs.js"></script>
  <script src="cms-admin.js"></script>
  <script src="analytics.js"></script>
</body>
</html>