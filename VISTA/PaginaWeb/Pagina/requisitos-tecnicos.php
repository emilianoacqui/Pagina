<!DOCTYPE html>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['lang']) && in_array($_GET['lang'], ['es', 'en', 'it'], true)) {
    $_SESSION['lang'] = $_GET['lang'];
}
$cl = $_SESSION['lang'] ?? 'es';

if (!function_exists('lp_tr')) {
    function lp_tr(array $map, string $lang): string
    {
        if (isset($map[$lang])) {
            return $map[$lang];
        }
        if (isset($map['es'])) {
            return $map['es'];
        }
        $first = reset($map);
        return is_string($first) ? $first : '';
    }
}

$pageStrings = [
    'title' => [
        'es' => 'Requisitos técnicos',
        'en' => 'Technical Requirements',
        'it' => 'Requisiti tecnici',
    ],
    'updated' => [
        'es' => 'Última actualización: octubre 2025',
        'en' => 'Last updated: October 2025',
        'it' => 'Ultimo aggiornamento: ottobre 2025',
    ],
    'intro' => [
        'es' => 'Estas indicaciones ayudan a garantizar el acceso óptimo a los servicios digitales de la Scuola Italiana di Montevideo. Ajuste la configuración recomendada para disfrutar de una experiencia estable y segura.',
        'en' => 'The following guidelines help ensure the best experience when accessing the digital services of Scuola Italiana di Montevideo. Please review the recommended settings for a stable and secure visit.',
        'it' => 'Queste indicazioni aiutano a garantire il miglior accesso ai servizi digitali della Scuola Italiana di Montevideo. Verifica le impostazioni consigliate per un\'esperienza stabile e sicura.',
    ],
    'sections' => [
        [
            'heading' => [
                'es' => 'Navegadores compatibles',
                'en' => 'Compatible browsers',
                'it' => 'Browser compatibili',
            ],
            'body' => [
                'es' => "- Últimas dos versiones de Google Chrome, Mozilla Firefox, Microsoft Edge o Apple Safari.\n- Navegadores móviles actualizados en iOS y Android.\n- Active JavaScript y permita cookies básicas para guardar preferencias de idioma.",
                'en' => "- Latest two versions of Google Chrome, Mozilla Firefox, Microsoft Edge, or Apple Safari.\n- Up-to-date mobile browsers on iOS and Android.\n- Enable JavaScript and allow basic cookies to save language preferences.",
                'it' => "- Le ultime due versioni di Google Chrome, Mozilla Firefox, Microsoft Edge o Apple Safari.\n- Browser mobili aggiornati su iOS e Android.\n- Abilita JavaScript e consenti cookie di base per salvare le preferenze linguistiche.",
            ],
        ],
        [
            'heading' => [
                'es' => 'Configuración recomendada',
                'en' => 'Recommended configuration',
                'it' => 'Configurazione consigliata',
            ],
            'body' => [
                'es' => "- Resolución mínima de pantalla 1280 x 720 píxeles.\n- Conexión a Internet de banda ancha mayor a 5 Mbps para contenidos multimedia.\n- Sistema operativo actualizado con los últimos parches de seguridad.",
                'en' => "- Minimum screen resolution of 1280 x 720 pixels.\n- Broadband connection above 5 Mbps for multimedia content.\n- Operating system updated with the latest security patches.",
                'it' => "- Risoluzione minima dello schermo di 1280 x 720 pixel.\n- Connessione a banda larga superiore a 5 Mbps per i contenuti multimediali.\n- Sistema operativo aggiornato con le ultime patch di sicurezza.",
            ],
        ],
        [
            'heading' => [
                'es' => 'Multimedia y documentos',
                'en' => 'Multimedia and documents',
                'it' => 'Multimedia e documenti',
            ],
            'body' => [
                'es' => "- Use reproductores compatibles con formatos MP4 y PDF.\n- Mantenga actualizado su visor de documentos (Adobe Acrobat Reader o equivalente).\n- Para transmisiones en vivo, recomendamos auriculares o altavoces externos.",
                'en' => "- Use players compatible with MP4 video and PDF documents.\n- Keep your document viewer (Adobe Acrobat Reader or equivalent) up to date.\n- For live streams we recommend headphones or external speakers.",
                'it' => "- Utilizza riproduttori compatibili con video MP4 e documenti PDF.\n- Mantieni aggiornato il lettore di documenti (Adobe Acrobat Reader o equivalenti).\n- Per le dirette consigliamo cuffie o altoparlanti esterni.",
            ],
        ],
        [
            'heading' => [
                'es' => 'Soporte técnico',
                'en' => 'Technical support',
                'it' => 'Supporto tecnico',
            ],
            'body' => [
                'es' => "Si experimenta algún problema, contacte al equipo de tecnología escribiendo a soporte@scuolaitaliana.edu.uy e incluya información sobre su navegador, dispositivo y una captura de pantalla si es posible.",
                'en' => "If you experience any issues, contact the technology team at soporte@scuolaitaliana.edu.uy and include information about your browser, device, and a screenshot if available.",
                'it' => "In caso di problemi, contatta il team tecnologico scrivendo a soporte@scuolaitaliana.edu.uy e includi informazioni sul browser, sul dispositivo e una schermata se disponibile.",
            ],
        ],
    ],
    'back_home' => [
        'es' => 'Volver al inicio',
        'en' => 'Back to home',
        'it' => 'Torna alla home',
    ],
];
?>
<html lang="<?php echo $cl; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars(lp_tr($pageStrings['title'], $cl)); ?></title>
    <link rel="icon" type="image/png" href="FOTOS/fotosPrincipales/logotipo.png">
    <style>
        body {
            margin: 0;
            font-family: 'Merriweather Sans', Arial, sans-serif;
            background: #f5f7fb;
            color: #0a2452;
        }
        .legal-hero {
            background: linear-gradient(135deg, #0a2452 0%, #0e3770 100%);
            color: #ffffff;
            padding: 60px 24px 40px;
            text-align: center;
        }
        .legal-hero h1 {
            margin: 0;
            font-size: 2.2rem;
        }
        .legal-hero p {
            margin-top: 12px;
            font-size: 0.95rem;
            opacity: 0.85;
        }
        .legal-container {
            max-width: 960px;
            margin: 0 auto;
            padding: 48px 24px 80px;
        }
        .legal-intro {
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 36px;
        }
        .legal-block {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(10, 36, 82, 0.08);
            padding: 32px;
            margin-bottom: 24px;
        }
        .legal-block h2 {
            margin-top: 0;
            font-size: 1.3rem;
        }
        .legal-block p {
            margin: 12px 0 0;
            line-height: 1.75;
            font-size: 1rem;
            color: #324d7b;
            white-space: pre-line;
        }
        .legal-back {
            text-align: center;
            margin-top: 48px;
        }
        .legal-back a {
            display: inline-block;
            padding: 12px 26px;
            border-radius: 999px;
            background: #0a2452;
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s ease, background 0.2s ease;
        }
        .legal-back a:hover {
            background: #f39c12;
            color: #0a2452;
            transform: translateY(-2px);
        }
        @media (max-width: 720px) {
            .legal-block {
                padding: 24px;
            }
            .legal-hero {
                padding: 48px 16px 32px;
            }
            .legal-hero h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <header class="legal-hero">
        <h1><?php echo htmlspecialchars(lp_tr($pageStrings['title'], $cl)); ?></h1>
        <p><?php echo htmlspecialchars(lp_tr($pageStrings['updated'], $cl)); ?></p>
    </header>

    <main class="legal-container">
        <p class="legal-intro"><?php echo htmlspecialchars(lp_tr($pageStrings['intro'], $cl)); ?></p>

        <?php foreach ($pageStrings['sections'] as $section): ?>
            <section class="legal-block">
                <h2><?php echo htmlspecialchars(lp_tr($section['heading'], $cl)); ?></h2>
                <p><?php echo htmlspecialchars(lp_tr($section['body'], $cl)); ?></p>
            </section>
        <?php endforeach; ?>

        <div class="legal-back">
            <a href="index.php"><?php echo htmlspecialchars(lp_tr($pageStrings['back_home'], $cl)); ?></a>
        </div>
    </main>
</body>
</html>

