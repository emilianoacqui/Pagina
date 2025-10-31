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
        'es' => 'Accesibilidad web',
        'en' => 'Web accessibility',
        'it' => 'Accessibilità web',
    ],
    'updated' => [
        'es' => 'Última actualización: octubre 2025',
        'en' => 'Last updated: October 2025',
        'it' => 'Ultimo aggiornamento: ottobre 2025',
    ],
    'intro' => [
        'es' => 'La Scuola Italiana di Montevideo trabaja para que toda la comunidad pueda utilizar nuestros servicios digitales sin barreras. Seguimos las directrices internacionales de accesibilidad y aplicamos mejoras continuas en nuestros sitios y contenidos.',
        'en' => 'Scuola Italiana di Montevideo works to ensure that the entire community can use our digital services without barriers. We follow international accessibility guidelines and continuously improve our sites and content.',
        'it' => 'La Scuola Italiana di Montevideo lavora affinché tutta la comunità possa utilizzare i nostri servizi digitali senza barriere. Seguiamo le linee guida internazionali sull\'accessibilità e miglioriamo costantemente i nostri siti e contenuti.',
    ],
    'sections' => [
        [
            'heading' => [
                'es' => 'Nuestro compromiso',
                'en' => 'Our commitment',
                'it' => 'Il nostro impegno',
            ],
            'body' => [
                'es' => 'Diseñamos experiencias digitales centradas en las personas, contemplando distintas capacidades motoras, visuales, auditivas y cognitivas. Priorizamos contenidos claros, estructuras comprensibles y alternativas de navegación para diferentes dispositivos.',
                'en' => 'We design user-centred digital experiences that consider different motor, visual, auditory, and cognitive abilities. We prioritise clear content, understandable structures, and alternative navigation patterns for different devices.',
                'it' => 'Progettiamo esperienze digitali incentrate sulle persone, considerando diverse abilità motorie, visive, uditive e cognitive. Diamo priorità a contenuti chiari, strutture comprensibili e percorsi di navigazione alternativi per dispositivi differenti.',
            ],
        ],
        [
            'heading' => [
                'es' => 'Características clave',
                'en' => 'Key features',
                'it' => 'Funzionalità principali',
            ],
            'body' => [
                'es' => "- Contrastes verificados para la lectura en pantallas.\n- Navegación con teclado y foco visible.\n- Textos alternativos en imágenes informativas.\n- Estructuras semánticas para lectores de pantalla.",
                'en' => "- Verified colour contrast for on-screen reading.\n- Keyboard navigation with visible focus states.\n- Alternative text on informative images.\n- Semantic structures for screen readers.",
                'it' => "- Contrasti di colore verificati per la lettura su schermo.\n- Navigazione da tastiera con stati di focus visibili.\n- Testi alternativi per le immagini informative.\n- Strutture semantiche per i lettori di schermo.",
            ],
        ],
        [
            'heading' => [
                'es' => 'Mejoras continuas',
                'en' => 'Continuous improvements',
                'it' => 'Miglioramento continuo',
            ],
            'body' => [
                'es' => 'Realizamos monitoreo periódico de nuestros portales e incorporamos criterios WCAG 2.1 nivel AA en nuevos desarrollos. Los equipos docentes y técnicos reciben capacitación para mantener la accesibilidad en documentos y recursos educativos.',
                'en' => 'We periodically monitor our portals and incorporate WCAG 2.1 level AA criteria into new developments. Teaching and technical teams receive training to keep accessibility standards in documents and learning resources.',
                'it' => 'Monitoriamo periodicamente i nostri portali e integriamo i criteri WCAG 2.1 livello AA nei nuovi sviluppi. I team docenti e tecnici vengono formati per mantenere gli standard di accessibilità in documenti e risorse educative.',
            ],
        ],
        [
            'heading' => [
                'es' => 'Comentarios y contacto',
                'en' => 'Feedback and contact',
                'it' => 'Feedback e contatti',
            ],
            'body' => [
                'es' => 'Agradecemos los comentarios que nos permitan corregir barreras y ofrecer mejores soluciones. Si encuentra alguna dificultad, escríbanos a info@scuolaitaliana.edu.uy indicando la página o recurso en el que necesita asistencia.',
                'en' => 'We welcome feedback that helps us remove barriers and deliver better solutions. If you encounter any difficulty, please write to info@scuolaitaliana.edu.uy and mention the page or resource where you need assistance.',
                'it' => 'Accogliamo con favore i suggerimenti che ci permettono di rimuovere barriere e offrire soluzioni migliori. Se riscontri difficoltà, scrivici a info@scuolaitaliana.edu.uy indicando la pagina o la risorsa in cui necessiti assistenza.',
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
            background: linear-gradient(135deg, #0a2452 0%, #154087 100%);
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
            font-size: 1.35rem;
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

