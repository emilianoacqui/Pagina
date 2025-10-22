<!DOCTYPE html>
<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } if (isset($_GET['lang']) && in_array($_GET['lang'], ['es','en','it'])) { $_SESSION['lang'] = $_GET['lang']; } $cl = $_SESSION['lang'] ?? 'es'; ?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title><?php $idx_meta=['es'=>'Inicio','en'=>'Home','it'=>'Home']; echo $idx_meta[$cl]; ?></title>
    <link rel="icon" type="image/png" href="/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
    <link rel="apple-touch-icon" href="/VISTA/PaginaWeb/Pagina/FOTOS/fotosPrincipales/logotipo.png">
     
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Merriweather Sans', Arial, sans-serif;
            overflow-x: hidden;
            background: white;
        }

        /* CMS Classes */
        body.loading-cms-content #original-content {
            display: none !important;
        }

        body.loading-cms-content #cms-root {
            display: block !important;
        }

        #cms-root {
    display: none;
    margin: 0;
    padding: 0;
    position: relative;
    top: 0;
}
body:not(.loading-cms-content) #cms-root {
    display: none !important;
}

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: rgba(10, 36, 82, 0.5);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
            max-width: 1200px;
            margin: 0 auto;
            height: 100%;
        }

        .nav-logo {
            position: relative;
            height: 100%;
            overflow: visible;
        }

        .nav-logo img {
            height: 120px;
            width: auto;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .nav-menu-button {
            display: flex;
            flex-direction: column;
            cursor: pointer;
            padding: 8px;
            transition: all 0.3s ease;
        }

        

        .nav-login-btn {
            background: #0A2452;
            color: #FFFFFF;
            padding: 10px 18px;
            border-radius: 18px;
            text-decoration: none;
            font-size: 14px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            transition: background 0.3s ease, transform 0.2s ease, color 0.3s ease;
        }

        .nav-login-btn:hover {
            background: #F39C12;
            color: #0A2452;
            transform: translateY(-1px);
        }

        /* Flag icon size */
        .nav-login-btn .flag,
        .lang-dropdown-mini .flag {
            width: 20px;
            height: 14px;
            object-fit: cover;
            vertical-align: middle;
            display: inline-block;
        }

        /* Language dropdown (minimal) */
        .lang-wrapper { position: relative; }
        .lang-dropdown-mini {
            position: absolute;
            right: 0;
            top: 110%;
            background: #ffffff;
            border: 1px solid rgba(0,0,0,0.1);
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            display: none;
            min-width: 120px;
            overflow: hidden;
            z-index: 1001;
        }
        .lang-wrapper.open .lang-dropdown-mini { display: block; }
        .lang-dropdown-mini a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            font-size: 16px;
            border-bottom: 1px solid rgba(0,0,0,0.06);
            background: #ffffff;
            color: #0A2452;
            text-align: center;
        }
        .lang-dropdown-mini a:last-child { border-bottom: none; }
        .lang-dropdown-mini a:hover {
            background: #F39C12;
            color: #0A2452;
        }

        .nav-menu-button span {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }

        .nav-menu-button:hover span {
            background-color: #F39C12;
        }

        /* Header */
        .header {
            position: relative;
            height: 100vh;
            background: url('FOTOS/fotosPrincipales/portada1.jpg') center/cover;
            display: flex;
            align-items: center;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(10, 36, 82, 0.3), transparent);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding-left: 5%;
            max-width: 600px;
        }

        .hero-title {
            color: white;
            font-size: 48px;
            font-weight: 400;
            line-height: 1.2;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 1);
            margin-bottom: 30px;
        }

        .admissions-btn {
            background: #DC343C;
            border-radius: 20px;
            padding: 20px 40px;
            color: white;
            font-size: 36px;
            text-decoration: none;
            display: inline-block;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .admissions-btn:hover {
            transform: translateY(-2px);
        }

        /* Education Levels */
        .education-levels {
            display: flex;
            height: 500px;
        }

        .level-card {
            flex: 1;
            position: relative;
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .level-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.5;
        }

        .inicial {
            background-image: url('FOTOS/fotosPrincipales/inicial1.jpg');
        }
        .inicial::before { background: #049B4C; }

        .primaria {
            background-image: url('FOTOS/fotosPrincipales/primaria1.jpg');
        }
        .primaria::before { background: #D9D9D9; }

        .secundaria {
            background-image: url('FOTOS/fotosPrincipales/secundaria1.jpg');
        }
        .secundaria::before { background: #DC343C; }

        .level-content {
            position: relative;
            z-index: 2;
        }

        .level-title {
            font-size: 48px;
            font-weight: 400;
            margin-bottom: 10px;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 1);
        }

        .level-age {
            font-size: 20px;
            margin-bottom: 30px;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 1);
        }

        .level-btn {
            padding: 15px 30px;
            border-radius: 10px;
            color: white;
            font-size: 36px;
            text-decoration: none;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 1);
            transition: transform 0.3s ease;
        }

        .level-btn:hover {
            transform: scale(1.05);
        }

        .btn-green { background: #049B4C; }
        .btn-gray { background: #D9D9D9; }
        .btn-red { background: #DC343C; }

        /* Color Stripes */
        .color-stripes {
            height: 20px;
            display: flex;
            flex-direction: column;
        }

        .stripe {
            height: 5px;
        }

        .stripe-blue { background: #0A2452; }
        .stripe-green { background: #049B4C; }
        .stripe-white { background: white; }
        .stripe-red { background: #DC343C; }

        /* About Section */
        .about-section {
            padding: 80px 5%;
            display: flex;
            align-items: center;
            gap: 50px;
            background: white;
        }

        .about-image {
            flex: 1;
            max-width: 442px;
        }

        .about-image img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0px 4px 40px rgba(0, 0, 0, 0.25);
        }

        .about-content {
            flex: 1.5;
            max-width: 739px;
        }

        .section-title-small {
            color: #00B143;
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 30px;
            text-align: center;
        }

        .about-text {
            color: #1D1A1A;
            font-size: 25px;
            line-height: 30px;
            letter-spacing: 2px;
            margin-bottom: 40px;
        }

        .read-more-btn {
            background: #EC221F;
            color: #FEE9E7;
            padding: 12px 24px;
            border: 1px solid #C00F0C;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }

        /* Quality Section */
        .quality-section {
            background: white;
            padding: 100px 5%;
            text-align: center;
            position: relative;
        }

        .quality-section::before {
            display: none;
        }

        .quality-content {
            position: relative;
            z-index: 2;
        }

        .main-title {
            color: #0A2452;
            font-size: 96px;
            font-weight: 400;
            margin-bottom: 50px;
        }

        .quality-grid-new {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .quality-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
            flex: 1;
            max-width: 250px;
        }

        .quality-item-new {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .quality-item-new:hover {
            transform: translateY(-5px);
        }

        .quality-item-new a {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            text-decoration: none;
            color: inherit;
        }

        .quality-icon-new {
            width: 50px;
            height: 50px;
            background: #DC343C;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .quality-icon-new i {
            font-size: 20px;
            color: white;
        }

        .quality-text-new {
            flex: 1;
            font-size: 16px;
            font-weight: 600;
            color: #333;
            line-height: 1.4;
        }

        .center-video {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            flex: 0 0 400px;
        }

        .video-container {
            position: relative;
            width: 350px;
            height: 250px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .video-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .italian-quote {
            text-align: center;
            max-width: 300px;
        }

        .italian-quote p {
            font-size: 16px;
            font-style: italic;
            color: #0A2452;
            line-height: 1.6;
        }

        /* Projects Section */
        .projects-section {
            background: #0A2452;
            padding: 100px 5%;
            text-align: center;
        }

        .projects-title {
            color: #F4BC1C;
            font-size: 96px;
            font-weight: 400;
            margin-bottom: 80px;
        }

        .projects-grid {
            display: flex;
            flex-direction: column;
            gap: 50px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .project-item {
            background: #D9D9D9;
            border-radius: 50px 0 0 50px;
            display: flex;
            align-items: center;
            min-height: 344px;
            overflow: hidden;
        }

        .project-item:nth-child(even) {
            border-radius: 0 50px 50px 0;
            flex-direction: row-reverse;
        }

        .project-content {
            flex: 1;
            padding: 40px;
            text-align: center;
        }

        .project-title {
            color: #E5151C;
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .project-description {
            color: black;
            font-size: 16px;
            font-weight: 700;
            line-height: 25px;
            margin-bottom: 30px;
        }

        .project-btn {
            background: #B00900;
            color: white;
            padding: 8px 45px;
            border-radius: 23px;
            border: 1px solid #B00900;
            font-size: 12px;
            text-decoration: none;
        }

        .project-image {
            flex: 1;
            height: 344px;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* News Section */
        .news-section {
            padding: 140px 5% 180px 5%;
            background: #0A2452;
            position: relative;
            overflow: hidden;
        }

        .news-section::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 0%;
            height: 100%;
            background: #004ECC;
            transition: width 2.5s ease;
            z-index: 1;
        }

        .news-section.animate::after {
            width: 50%;
        }

        .news-header {
            text-align: right;
            margin-bottom: 50px;
            padding-right: 10%;
            position: relative;
            z-index: 2;
        }

        .news-title {
            color: white;
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .news-subtitle {
            color: #E3A412;
            font-size: 36px;
            font-weight: 400;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .news-card {
            background: #006326;
            border-radius: 27px;
            overflow: hidden;
            text-align: center;
            color: white;
        }

        .news-card img {
            width: 100%;
            height: 238px;
            object-fit: cover;
        }

        .news-card-content {
            padding: 30px 15px;
        }

        .news-card-text {
            font-size: 16px;
            font-weight: 700;
            line-height: 25px;
            margin-bottom: 30px;
        }

        .news-card-btn {
            background: #B00900;
            color: white;
            padding: 8px 45px;
            border-radius: 23px;
            border: 1px solid #B00900;
            font-size: 12px;
            text-decoration: none;
        }

        /* Footer Links */
        .footer-links {
            background: white;
            padding: 80px 5%;
            margin-top: 80px;
            margin-bottom: 80px;
            text-decoration: none;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            height: 257px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            font-size: 32px;
            font-weight: 400;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .footer-card:hover {
            transform: scale(1.05);
        }

        .footer-card img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none; /* ensure image overlay does not block taps */
        }

        .footer-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.25;
            pointer-events: none; /* decorative overlay should not intercept clicks */
        }

        .footer-card-content {
            position: relative;
            z-index: 2;
            color: white;
        }

        .footer-card.blue::before { background: #2C4C84; }
        .footer-card.red::before { background: #DC343C; }
        .footer-card.yellow::before { background: #FDB813; }
        .footer-card.green::before { background: #049B4C; }
        .footer-card.dark-blue::before { background: #0A2452; }

        /* Footer Bottom */
        .footer-bottom-new {
            background: #1B4F72;
            color: white;
            padding: 0;
        }

        .footer-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 30px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-left {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .footer-logo img {
            height: 60px;
            width: auto;
        }

        .footer-subtitle p {
            margin: 0;
            font-size: 14px;
            color: #E8E8E8;
        }

        .footer-center,
        .footer-right {
            flex: 1;
            padding: 0 20px;
        }

        .footer-section h4 {
            color: white;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            padding-bottom: 5px;
        }

        .footer-section p {
            margin: 8px 0;
            font-size: 14px;
            color: #E8E8E8;
            line-height: 1.4;
        }

        .footer-info-bar {
            background: #154360;
            text-align: center;
            padding: 15px 5%;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .footer-info-bar p {
            margin: 0;
            font-size: 12px;
            color: #BDC3C7;
        }

        /* Responsive */
        /* ============================================
   RESPONSIVE MOBILE STYLES
   ============================================ */

@media (max-width: 768px) {
    /* Navigation */
    .navbar {
        height: 60px;
    }

    .nav-container {
        padding: 0 4%;
        position: relative; /* allow centering the middle group */
    }

    /* Center the Ingresar + language buttons group */
    .nav-container > div:nth-child(2) {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 2;
    }

    .nav-logo img {
        height: 80px;
    }

    .nav-login-btn {
        padding: 8px 14px;
        font-size: 12px;
        border-radius: 15px;
    }

    .nav-menu-button span {
        width: 20px;
        height: 2px;
    }

    /* Header */
    .header {
        height: 70vh;
        min-height: 500px;
    }

    .hero-content {
        padding: 0 5%;
        max-width: 100%;
    }

    .hero-title {
        font-size: 28px;
        margin-bottom: 20px;
        line-height: 1.3;
    }

    .admissions-btn {
        font-size: 20px;
        padding: 15px 30px;
        border-radius: 15px;
    }

    /* Education Levels */
    .education-levels {
        flex-direction: column;
        height: auto;
    }

    .level-card {
        height: 250px;
        min-height: 250px;
    }

    .level-title {
        font-size: 32px;
    }

    .level-age {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .level-btn {
        font-size: 24px;
        padding: 12px 24px;
    }

    /* About Section */
    .about-section {
        flex-direction: column;
        padding: 50px 5%;
        gap: 30px;
    }

    .about-image {
        max-width: 100%;
        width: 100%;
    }

    .about-image img {
        height: 250px;
    }

    .about-content {
        max-width: 100%;
    }

    .section-title-small {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .about-text {
        font-size: 16px;
        line-height: 24px;
        letter-spacing: 0.5px;
        margin-bottom: 25px;
    }

    .read-more-btn {
        font-size: 14px;
        padding: 10px 20px;
    }

    /* Quality Section */
    .quality-section {
        padding: 60px 5%;
    }

    .main-title {
        font-size: 36px;
        margin-bottom: 30px;
    }

    .quality-grid-new {
        flex-direction: column;
        gap: 20px;
        padding: 20px 0;
    }

    .quality-column {
        max-width: 100%;
        width: 100%;
    }

    .quality-item-new {
        padding: 15px;
    }

    .quality-item-new a {
        gap: 12px;
    }

    .quality-icon-new {
        width: 40px;
        height: 40px;
    }

    .quality-icon-new i {
        font-size: 18px;
    }

    .quality-text-new {
        font-size: 14px;
        text-align: left;
    }

    .center-video {
        flex: 1;
        width: 100%;
        margin: 20px 0;
    }

    .video-container {
        width: 100%;
        max-width: 350px;
        height: 200px;
    }

    .italian-quote {
        max-width: 100%;
        padding: 0 20px;
    }

    .italian-quote p {
        font-size: 14px;
    }

    /* Projects Section */
    .projects-section {
        padding: 60px 5%;
    }

    .projects-title {
        font-size: 36px;
        margin-bottom: 40px;
    }

    .projects-grid {
        gap: 30px;
    }

    .project-item {
        flex-direction: column !important;
        border-radius: 20px !important;
        min-height: auto;
    }

    .project-item:nth-child(even) {
        flex-direction: column !important;
    }

    .project-content {
        padding: 25px 20px;
    }

    .project-title {
        font-size: 28px;
        margin-bottom: 15px;
    }

    .project-description {
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 20px;
    }

    .project-btn {
        padding: 8px 30px;
        font-size: 11px;
    }

    .project-image {
        width: 100%;
        height: 200px;
    }

    /* News Section */
    .news-section {
        padding: 60px 5% 80px 5%;
    }

    .news-section::after {
        display: none;
    }

    .news-header {
        text-align: center;
        padding-right: 0;
        margin-bottom: 30px;
    }

    .news-title {
        font-size: 32px;
    }

    .news-subtitle {
        font-size: 24px;
    }

    .news-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .news-card img {
        height: 200px;
    }

    .news-card-content {
        padding: 20px 15px;
    }

    .news-card-text {
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 20px;
    }

    .news-card-btn {
        padding: 8px 30px;
        font-size: 11px;
    }

    /* Footer Links */
    .footer-links {
        padding: 50px 5%;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .footer-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .footer-card {
        height: 180px;
        font-size: 20px;
        border-radius: 15px;
    }

    .footer-card-content {
        padding: 0 10px;
    }

    /* Footer Bottom */
    .footer-container {
        flex-direction: column;
        gap: 25px;
        text-align: center;
        padding: 25px 5%;
    }

    .footer-left {
        flex-direction: column;
        gap: 15px;
    }

    .footer-logo img {
        height: 50px;
    }

    .footer-subtitle p {
        font-size: 12px;
    }

    .footer-center,
    .footer-right {
        padding: 0;
        width: 100%;
    }

    .footer-section h4 {
        font-size: 14px;
        margin-bottom: 8px;
    }

    .footer-section p {
        font-size: 12px;
        margin: 6px 0;
    }

    .footer-info-bar {
        padding: 12px 5%;
    }

    .footer-info-bar p {
        font-size: 10px;
        line-height: 1.4;
    }
}

/* Extra small devices */
@media (max-width: 480px) {
    .hero-title {
        font-size: 24px;
    }

    .admissions-btn {
        font-size: 18px;
        padding: 12px 25px;
    }

    .main-title,
    .projects-title {
        font-size: 32px;
    }

    .level-card {
        height: 220px;
    }

    .level-title {
        font-size: 28px;
    }

    .level-btn {
        font-size: 20px;
        padding: 10px 20px;
    }
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>

<body>
    
    
        <!-- Navigation -->
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
                </div>
                <div style="display:flex; align-items:center; gap:12px;">
                    <a href="../../Auth/index.php" class="nav-login-btn">Ingresar</a>
                    <?php 
                        $currentLang = $_SESSION['lang'] ?? 'es';
                        // Use CDN flags to avoid emoji fallback to letters
                        $flags = [
                            'es' => '<img class="flag" src="https://flagcdn.com/24x18/es.png" alt="ES">',
                            'en' => '<img class="flag" src="https://flagcdn.com/24x18/gb.png" alt="EN">',
                            'it' => '<img class="flag" src="https://flagcdn.com/24x18/it.png" alt="IT">',
                        ];
                        $others = array_values(array_diff(['es','en','it'], [$currentLang]));
                    ?>
                    <div class="lang-wrapper" id="langWrap">
                        <a href="#" class="nav-login-btn" id="langBtn" aria-haspopup="true" aria-expanded="false"><?php echo $flags[$currentLang]; ?></a>
                        <div class="lang-dropdown-mini" id="langDrop">
                            <a href="?lang=<?php echo $others[0]; ?>"><?php echo $flags[$others[0]]; ?></a>
                            <a href="?lang=<?php echo $others[1]; ?>"><?php echo $flags[$others[1]]; ?></a>
                        </div>
                    </div>
                </div>
                <div class="nav-menu-button" onclick="window.location.href='menuScuola.php'">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>

        <div id="original-content"> </div>
        <header class="header">
            <div class="hero-content">
                <?php 
                    $cl = $_SESSION['lang'] ?? 'es';
                    $hero = [
                        'es' => ['Una nueva visión de la educación.', 'La escuela abierta al mundo'],
                        'en' => ['A new vision of education.', 'The school open to the world'],
                        'it' => ["Una nuova visione dell'educazione.", 'La scuola aperta al mondo'],
                    ];
                    $admissions = [
                        'es' => 'Admisiones',
                        'en' => 'Admissions',
                        'it' => 'Ammissioni',
                    ];
                ?>
                <h1 class="hero-title"><?php echo $hero[$cl][0]; ?><br><?php echo $hero[$cl][1]; ?></h1>
                <a href="popap.php" class="admissions-btn"><?php echo $admissions[$cl]; ?></a>
            </div>
        </header>

        <!-- Color Stripes -->
        <div class="color-stripes">
            <div class="stripe stripe-blue"></div>
            <div class="stripe stripe-green"></div>
            <div class="stripe stripe-white"></div>
            <div class="stripe stripe-red"></div>
        </div>

        <!-- Education Levels Section -->
        <section class="education-levels">
            <?php 
                $levelTitle = [
                    'es' => ['Inicial','Primaria','Secundaria'],
                    'en' => ['Early Years','Primary','Secondary'],
                    'it' => ['Infanzia','Primaria','Secondaria'],
                ];
                $seeMore = [
                    'es' => 'Ver más',
                    'en' => 'See more',
                    'it' => 'Vedi di più',
                ];
                $ages = [
                    'es' => ['3 meses a 5 años','6 a 12 años','12 a 18 años'],
                    'en' => ['3 months to 5 years old','6 to 12 years old','12 to 18 years old'],
                    'it' => ['3 mesi a 5 anni','6 a 12 anni','12 a 18 anni'],
                ];
            ?>
            <div class="level-card inicial">
                <div class="level-content">
                    <h2 class="level-title"><?php echo $levelTitle[$cl][0]; ?></h2>
                    <p class="level-age"><?php echo $ages[$cl][0]; ?></p>
                    <a href="menuInicial.php" class="level-btn btn-green"><?php echo $seeMore[$cl]; ?></a>
                </div>
            </div>
            <div class="level-card primaria">
                <div class="level-content">
                    <h2 class="level-title"><?php echo $levelTitle[$cl][1]; ?></h2>
                    <p class="level-age"><?php echo $ages[$cl][1]; ?></p>
                    <a href="Primaria.php" class="level-btn btn-gray"><?php echo $seeMore[$cl]; ?></a>
                </div>
            </div>
            <div class="level-card secundaria">
                <div class="level-content">
                    <h2 class="level-title"><?php echo $levelTitle[$cl][2]; ?></h2>
                    <p class="level-age"><?php echo $ages[$cl][2]; ?></p>
                    <a href="menuSecundaria.php" class="level-btn btn-red"><?php echo $seeMore[$cl]; ?></a>
                </div>
            
                    </section>
        </div>

        <!-- Color Stripes -->
        <div class="color-stripes">
            <div class="stripe stripe-blue"></div>
            <div class="stripe stripe-green"></div>
            <div class="stripe stripe-gray"></div>
            <div class="stripe stripe-red"></div>
        </div>

        <!-- About Section -->
        <section class="about-section">
            <div class="about-image">
                <img src="FOTOS/fotosPrincipales/estructura.jpg" alt="Sobre nosotros">
            </div>
            <div class="about-content">
                <?php 
                    $aboutTitle = [
                        'es' => 'SOBRE NOSOTROS',
                        'en' => 'ABOUT US',
                        'it' => 'CHI SIAMO',
                    ];
                    $aboutText = [
                        'es' => 'La Scuola Italiana di Montevideo desarrolla un programa educativo nacional e internacional que abre las puertas a un mundo plurilingüe y multicultural.',
                        'en' => 'The Scuola Italiana di Montevideo offers a national and international educational program that opens doors to a multilingual and multicultural world.',
                        'it' => 'La Scuola Italiana di Montevideo sviluppa un programma educativo nazionale e internazionale che apre le porte a un mondo plurilingue e multiculturale.',
                    ];
                    $readMore = [
                        'es' => 'Leer más ->',
                        'en' => 'Read more ->',
                        'it' => 'Leggi di più ->',
                    ];
                ?>
                <h2 class="section-title-small"><?php echo $aboutTitle[$cl]; ?></h2>
                <p class="about-text"><?php echo $aboutText[$cl]; ?></p>
                <a href="verMas.php" class="read-more-btn"><?php echo $readMore[$cl]; ?></a>
            </div>
        </section>

        <!-- Quality Section -->
        <section class="quality-section">
            <div class="quality-content">
                <?php
                    $qualityTitle = [
                        'es' => 'Vivir la scuola',
                        'en' => 'Live the scuola',
                        'it' => 'Vivere la scuola',
                    ];
                    $qualityItemsLeft = [
                        'es' => ['Cursos extracurriculares','Voluntariado','Idiomas','Propuesta<br>ecológica'],
                        'en' => ['Extracurricular courses','Volunteering','Languages','Ecological<br>initiative'],
                        'it' => ['Corsi extracurriculari','Volontariato','Lingue','Proposta<br>ecologica'],
                    ];
                    $qualityItemsRight = [
                        'es' => ['Convivencia<br>en el colegio','Deportes','Arte, ciencia<br>y tecnología','Intercambios'],
                        'en' => ['School life &<br>coexistence','Sports','Art, science<br>& technology','Exchanges'],
                        'it' => ['Convivenza<br>a scuola','Sport','Arte, scienza<br>e tecnologia','Scambi'],
                    ];
                ?>
                <h2 class="main-title"><?php echo $qualityTitle[$cl]; ?></h2>
                
                <div class="quality-grid-new">
                    <!-- Columna izquierda -->
                    <div class="quality-column left">
                        <div class="quality-item-new">
                            <a href="CursosIdioma.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-paint-brush"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsLeft[$cl][0]; ?></p>
                            </a>
                        </div>
                        
                        <div class="quality-item-new">
                            <a href="Voluntariado.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsLeft[$cl][1]; ?></p>
                            </a>
                        </div>
                        
                        <div class="quality-item-new">
                            <a href="idiomas.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-language"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsLeft[$cl][2]; ?></p>
                            </a>
                        </div>
                        
                        <div class="quality-item-new">
                            <a href="PropuestaEcologica.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsLeft[$cl][3]; ?></p>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Centro - Video -->
                    <div class="center-video">
                        <div class="video-container">
                            <video class="video-thumbnail" controls poster="FOTOS/fotosPrincipales/secundaria3.jpg">
                                <source src="FOTOS/fotosPrincipales/scuola.mp4" type="video/mp4">
                            </video>
                        </div>
                        
                        <div class="italian-quote">
                            <p>"La meta dell'educazione deve essere stimolare il naturale desiderio di imparare."</p>
                        </div>
                    </div>
                    
                    <!-- Columna derecha -->
                    <div class="quality-column right">
                        <div class="quality-item-new">
                            <a href="convivencia.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-users"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsRight[$cl][0]; ?></p>
                            </a>
                        </div>
                        
                        <div class="quality-item-new">
                            <a href="menudeportes.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-running"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsRight[$cl][1]; ?></p>
                            </a>
                        </div>
                        
                        <div class="quality-item-new">
                            <a href="Arte.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-atom"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsRight[$cl][2]; ?></p>
                            </a>
                        </div>
                        
                        <div class="quality-item-new">
                            <a href="menuIntercambio.php">
                                <div class="quality-icon-new">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <p class="quality-text-new"><?php echo $qualityItemsRight[$cl][3]; ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

        <!-- Projects Section -->
        <section class="projects-section">
            <?php
                $projectsTitle = [
                    'es' => 'Nuestros Proyectos',
                    'en' => 'Our Projects',
                    'it' => 'I nostri progetti',
                ];
                $proj = [
                    'es' => [
                        ['Arcimboldo', 'Propuesta multidisciplinaria para 6º de Ciencias Biológicas y Social-Económico integrando italiano, matemática, literatura, biología y química.', 'Ver mas'],
                        ['Heliopolis', 'Proyecto para investigar a Francisco Piria y sus vínculos con la alquimia y la astronomía, con visitas a Piriápolis.', 'Ver Mas'],
                        ['Scuola paradiso ecologico', 'Plan pluridisciplinar con participación estudiantil para crear y recuperar espacios con criterios de sustentabilidad.', 'Ver mas'],
                    ],
                    'en' => [
                        ['Arcimboldo', 'A multidisciplinary proposal for 6th year students integrating Italian, math, literature, biology and chemistry.', 'See more'],
                        ['Heliopolis', 'A project exploring Francisco Piria’s links to alchemy and astronomy, including field trips to Piriápolis.', 'See more'],
                        ['Scuola paradiso ecologico', 'A cross-curricular plan led by students to build and restore spaces with sustainable practices.', 'See more'],
                    ],
                    'it' => [
                        ['Arcimboldo', 'Proposta multidisciplinare per studenti del 6º anno integrando italiano, matematica, letteratura, biologia e chimica.', 'Vedi di più'],
                        ['Heliopolis', 'Progetto che esplora i legami di Francisco Piria con alchimia e astronomia, con visite a Piriápolis.', 'Vedi di più'],
                        ['Scuola paradiso ecologico', 'Piano pluridisciplinare guidato dagli studenti per creare e recuperare spazi con pratiche sostenibili.', 'Vedi di più'],
                    ],
                ];
            ?>
            <h2 class="projects-title"><?php echo $projectsTitle[$cl]; ?></h2>
            
            <div class="projects-grid">
                <div class="project-item">
                    <div class="project-content">
                        <h3 class="project-title"><?php echo $proj[$cl][0][0]; ?></h3>
                        <p class="project-description"><?php echo $proj[$cl][0][1]; ?></p>
                        <a href="arcimboldo.php" class="project-btn"><?php echo $proj[$cl][0][2]; ?></a>
                    </div>
                    <div class="project-image">
                        <img src="FOTOS/fotosPrincipales/archimboldo.jpg" alt="Arcimboldo">
                    </div>
                </div>
                
                <div class="project-item">
                    <div class="project-content">
                        <h3 class="project-title"><?php echo $proj[$cl][1][0]; ?></h3>
                        <p class="project-description"><?php echo $proj[$cl][1][1]; ?></p>
                        <a href="heliopolis.php" class="project-btn"><?php echo $proj[$cl][1][2]; ?></a>
                    </div>
                    <div class="project-image">
                        <img src="FOTOS/fotosPrincipales/heliopolis.jpg" alt="Heliopolis">
                    </div>
                </div>
                
                <div class="project-item">
                    <div class="project-content">
                        <h3 class="project-title"><?php echo $proj[$cl][2][0]; ?></h3>
                        <p class="project-description"><?php echo $proj[$cl][2][1]; ?></p>
                        <a href="paradiso.php" class="project-btn"><?php echo $proj[$cl][2][2]; ?></a>
                    </div>
                    <div class="project-image">
                        <img src="FOTOS/fotosPrincipales/paradiso.jpg" alt="Scuola paradiso">
                    </div>
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section class="news-section" id="news-animate">
            <?php
                $newsHdr = [
                    'es' => ['Noticias','Destacadas'],
                    'en' => ['News','Highlights'],
                    'it' => ['Notizie','In evidenza'],
                ];
                $newsTexts = [
                    'es' => [
                        'Día de la Familia: evento organizado por la generación que se gradúa para recaudar fondos para su viaje. Habrá comida, actividades, sorteos y muchas sorpresas.',
                        'Estudiantes desarrollan iniciativas ambientales y proyectos de reforestación en el campus.',
                        'La comunidad de exalumnos comparte experiencias y oportunidades profesionales.',
                    ],
                    'en' => [
                        'Family Day: an event organized by the graduating class to raise funds for their trip, with food, activities, raffles and more.',
                        'Students lead environmental initiatives and reforestation projects on campus.',
                        'The alumni community shares experiences and career opportunities.',
                    ],
                    'it' => [
                        'Giornata della Famiglia: evento organizzato dalla classe diplomanda per raccogliere fondi per il viaggio, con cibo, attività, lotterie e molto altro.',
                        'Gli studenti guidano iniziative ambientali e progetti di riforestazione nel campus.',
                        "La comunità degli ex‑alunni condivide esperienze e opportunità professionali.",
                    ],
                ];
                $seeMoreNews = [ 'es' => 'Ver mas', 'en' => 'See more', 'it' => 'Vedi di più' ];
            ?>
            <div class="news-header">
                <h2 class="news-title"><?php echo $newsHdr[$cl][0]; ?></h2>
                <p class="news-subtitle"><?php echo $newsHdr[$cl][1]; ?></p>
            </div>
            
            <div class="news-grid">
                <div class="news-card">
                    <img src="FOTOS/fotosPrincipales/arcimboldo4.jpg" alt="Noticia 1">
                    <div class="news-card-content">
                        <p class="news-card-text"><?php echo $newsTexts[$cl][0]; ?></p>
                        <a href="noticiaDestacada1.php" class="news-card-btn"><?php echo $seeMoreNews[$cl]; ?></a>
                    </div>
                </div>
                
                <div class="news-card">
                    <img src="FOTOS/fotosPrincipales/PrimerDia4.jpg.png" alt="Noticia 2">
                    <div class="news-card-content">
                        <p class="news-card-text"><?php echo $newsTexts[$cl][1]; ?></p>
                        <a href="noticiaDestacada2.php" class="news-card-btn"><?php echo $seeMoreNews[$cl]; ?></a>
                    </div>
                </div>
                
                <div class="news-card">
                    <img src="FOTOS/fotosPrincipales/Comunidad.jpg" alt="Noticia 3">
                    <div class="news-card-content">
                        <p class="news-card-text"><?php echo $newsTexts[$cl][2]; ?></p>
                        <a href="noticiaDestacada3.php" class="news-card-btn"><?php echo $seeMoreNews[$cl]; ?></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Links -->
        <section class="footer-links">
            <div class="footer-grid">
                <?php
                    $footerCards = [
                        'es' => ['Acceso a<br>familia','Comunidad<br>Exalumnos','Scuola Club','Noticias','Cursos de<br>idioma','Trabaja con<br>nosotros'],
                        'en' => ['Family<br>access','Alumni<br>community','Scuola Club','News','Language<br>courses','Work with<br>us'],
                        'it' => ['Accesso<br>famiglia','Comunità<br>ex-alunni','Scuola Club','Notizie','Corsi di<br>lingua','Lavora con<br>noi'],
                    ];
                ?>
                <a href="acceso-familia.php" class="footer-card blue">
                    <img src="FOTOS/fotosSeccion/familia.jpg" alt="Acceso a familia">
                    <div class="footer-card-content"><?php echo $footerCards[$cl][0]; ?></div>
                </a>
                
                <a href="comunidad-exalumnos.php" class="footer-card red">
                    <img src="FOTOS/fotosPrincipales/Comunidad.jpg" alt="Comunidad Exalumnos">
                    <div class="footer-card-content"><?php echo $footerCards[$cl][1]; ?></div>
                </a>
                
                <a href="scuola-club.php" class="footer-card yellow">
                    <img src="FOTOS/fotosSeccion/scuolaClub.png" alt="Scuola Club">
                    <div class="footer-card-content"><?php echo $footerCards[$cl][2]; ?></div>
                </a>
                
                <a href="noticias.php" class="footer-card green">
                    <img src="FOTOS/fotosPrincipales/ejemplo5.jpg" alt="Noticias">
                    <div class="footer-card-content"><?php echo $footerCards[$cl][3]; ?></div>
                </a>
                
                <a href="CursosIdioma.php" class="footer-card dark-blue">
                    <img src="FOTOS/fotosClases/bachillerato3.jpg" alt="Cursos de idioma">
                    <div class="footer-card-content"><?php echo $footerCards[$cl][4]; ?></div>
                </a>
                
                <a href="trabaja-con-nosotros.php" class="footer-card red">
                    <img src="FOTOS/fotosSeccion/trabaja.jpg" alt="Trabaja con nosotros">
                    <div class="footer-card-content"><?php echo $footerCards[$cl][5]; ?></div>
                </a>
            </div>
        </section>
    

        <!-- Footer Bottom -->
        <footer class="footer-bottom-new">
            <div class="footer-container">
                <div class="footer-left">
                    <div class="footer-logo">
                        <img src="FOTOS/fotosPrincipales/logo2.png" alt="Scuola Italiana di Montevideo">
                    </div>
                    <div class="footer-subtitle">
                        <p>AMC Scuola Italiana di Montevideo</p>
                    </div>
                </div>
                
                <div class="footer-center">
                    <div class="footer-section">
                        <?php $footerTitles = ['es' => 'Contacto','en' => 'Contact','it' => 'Contatto']; ?>
                        <h4><?php echo $footerTitles[$cl]; ?></h4>
                        <p>Gral. French 2380</p>
                        <p>CP 11500 - Montevideo, Uruguay</p>
                        <p>(+598) 2600 1527</p>
                        <p>info@scuolaitaliana.edu.uy</p>
                    </div>
                </div>
                
                <div class="footer-right">
                    <div class="footer-section">
                        <?php
                            $linksTitle = ['es' => 'Enlaces útiles','en' => 'Useful links','it' => 'Link utili'];
                            $linkItems = [
                                'es' => ['Política de privacidad','Requisitos técnicos','Accesibilidad'],
                                'en' => ['Privacy Policy','Technical Requirements','Accessibility'],
                                'it' => ['Informativa sulla privacy','Requisiti tecnici','Accessibilità'],
                            ];
                        ?>
                        <h4><?php echo $linksTitle[$cl]; ?></h4>
                        <p><?php echo $linkItems[$cl][0]; ?></p>
                        <p><?php echo $linkItems[$cl][1]; ?></p>
                        <p><?php echo $linkItems[$cl][2]; ?></p>
                    </div>
                </div>
            </div>
            
            <div class="footer-info-bar">
                <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
            </div>
        </footer>
    </div>

    <div id="cms-root"></div>
   
    <script>
        // Navbar hide/show on scroll
        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (!navbar) return;
            
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                navbar.style.transform = 'translateY(-100%)';
                navbar.style.opacity = '0';
            } else {
                navbar.style.transform = 'translateY(0)';
                navbar.style.opacity = '1';
            }
            
            lastScrollTop = scrollTop;
        });

        // News section animation observer
        function startNewsObserver() {
            const newsSection = document.getElementById('news-animate');
            if (!newsSection) return;
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        setTimeout(function() {
                            entry.target.classList.add('animate');
                        }, 500);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.4,
                rootMargin: '0px 0px -100px 0px'
            });
            
            observer.observe(newsSection);
        }

        // Initialize on page load
        window.addEventListener('load', function() {
            window.scrollTo(0, 0);
            startNewsObserver();
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.scrollTo(0, 0);
            startNewsObserver();
            // Language dropdown toggle
            const langWrap = document.getElementById('langWrap');
            const langBtn = document.getElementById('langBtn');
            if (langWrap && langBtn) {
                langBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const isOpen = langWrap.classList.contains('open');
                    if (isOpen) {
                        langWrap.classList.remove('open');
                        langBtn.setAttribute('aria-expanded', 'false');
                    } else {
                        langWrap.classList.add('open');
                        langBtn.setAttribute('aria-expanded', 'true');
                    }
                });

                // Close on outside click
                document.addEventListener('click', function(e) {
                    if (!langWrap.contains(e.target)) {
                        langWrap.classList.remove('open');
                        langBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                // Close on Escape
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        langWrap.classList.remove('open');
                        langBtn.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });


    
    </script>
    
<script src="cms-admin.js"></script>
<script src="analytics.js"></script>

    </body>
    </html>
  
