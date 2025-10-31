<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/popap.css">
  <title>Admisiones 2026 - Scuola Italiana di Montevideo</title>
  <style>
    .breadcrumb-mini { max-width: 980px; margin: 8px auto 16px; padding: 0 16px; font-size: 13px; }
    .breadcrumb-mini a { color: #0A2452; text-decoration: none; }
    .breadcrumb-mini a:hover { text-decoration: underline; }
    .breadcrumb-mini .sep { margin: 0 6px; color: #9aa0a6; }
    @media (max-width: 640px){ .breadcrumb-mini { font-size: 12px; margin: 6px auto 12px; } }
  </style>
</head>
<div id="cms-root"></div>
<body>
  <div class="container">
    <!-- Logo -->
    <a href="index.php">
      <img src="FOTOS/fotosPrincipales/logotipo.png" alt="Logo Scuola Italiana di Montevideo" class="logo">
    </a>

    <!-- Título -->
    <h1>Admisiones 2026</h1>
    <nav class="breadcrumb-mini" aria-label="breadcrumb">
      <a href="index.php">Inicio</a>
      <span class="sep">/</span>
      <span>Admisiones 2026</span>
    </nav>

    <!-- Descripción -->
    <p class="description">
      Te invitamos a conocer nuestra amplia propuesta educativa para acompañar el crecimiento de tus hijos.<br><br>
      Completando el formulario a continuación nos pondremos en contacto a la brevedad para asesorarte.
    </p>

    <!-- Formulario -->
    <form>
      <input type="text" placeholder="Nombre y Apellido" required>
      <input type="email" placeholder="Email" required>
      <input type="tel" placeholder="Celular" required>
      <select required>
        <option value="">Sectores de interés</option>
        <option value="inicial">Inicial</option>
        <option value="primaria">Primaria</option>
        <option value="secundaria">Secundaria</option>
        <option value="extra">Actividades extracurriculares</option>
      </select>
      <button type="submit" class="btn">Enviar</button>
    </form>

    <!-- Imagen inferior -->
    <img src="FOTOS/fotosPrincipales/popap.png" alt="Deportes y alumnos" class="footer-img">
  </div>
  <script src="cms-admin.js"></script>
  <script src="analytics.js"></script>
</body>
</html>
