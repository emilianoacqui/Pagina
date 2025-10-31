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
        'es' => 'Política de privacidad',
        'en' => 'Privacy Policy',
        'it' => 'Informativa sulla privacy',
    ],
    'updated' => [
        'es' => 'Última actualización: octubre 2025',
        'en' => 'Last updated: October 2025',
        'it' => 'Ultimo aggiornamento: ottobre 2025',
    ],
    'intro' => [
        'es' => 'En la Scuola Italiana di Montevideo protegemos los datos personales de nuestra comunidad educativa. Esta política resume qué información tratamos cuando se navega por nuestros sitios, se participa en actividades institucionales o se completan formularios en línea.',
        'en' => 'At Scuola Italiana di Montevideo we protect the personal data of our educational community. This policy summarises the information we process when you browse our websites, participate in institutional activities, or complete online forms.',
        'it' => 'Alla Scuola Italiana di Montevideo proteggiamo i dati personali della nostra comunità educativa. Questa informativa riassume le informazioni che trattiamo quando navighi sui nostri siti, partecipi ad attività istituzionali o compili moduli online.',
    ],
    'sections' => [
        [
            'heading' => [
                'es' => 'Información que recopilamos',
                'en' => 'Information we collect',
                'it' => 'Informazioni che raccogliamo',
            ],
            'body' => [
                'es' => "Recopilamos datos identificatorios y de contacto que se proporcionan de forma voluntaria (por ejemplo, formularios de admisión, suscripciones a boletines, registros de eventos). También almacenamos información técnica mínima generada por la navegación (dirección IP abreviada, tipo de dispositivo y estadísticas de uso) para mantener la seguridad y mejorar la experiencia del usuario.",
                'en' => "We collect identifying and contact data that are provided voluntarily (for example, admission forms, newsletter subscriptions, event registrations). We also store minimal technical data generated through browsing (shortened IP address, device type, usage statistics) in order to keep the site secure and improve the user experience.",
                'it' => "Raccogliamo dati identificativi e di contatto forniti volontariamente (ad esempio moduli di ammissione, iscrizioni alle newsletter, registrazioni a eventi). Conserviamo inoltre dati tecnici minimi generati dalla navigazione (indirizzo IP abbreviato, tipo di dispositivo, statistiche d\'uso) per garantire la sicurezza e migliorare l\'esperienza dell\'utente.",
            ],
        ],
        [
            'heading' => [
                'es' => 'Cómo utilizamos los datos',
                'en' => 'How we use the data',
                'it' => 'Come utilizziamo i dati',
            ],
            'body' => [
                'es' => "Utilizamos la información recabada para gestionar solicitudes académicas, enviar comunicaciones institucionales relevantes, organizar actividades pedagógicas y cumplir con obligaciones legales vigentes. Nunca comercializamos datos personales y solo los compartimos con proveedores que prestan servicios esenciales para la Scuola, bajo acuerdos de confidencialidad.",
                'en' => "We use the collected information to manage academic requests, send relevant institutional communications, organise educational activities, and comply with applicable legal obligations. We never sell personal data and only share it with service providers that support the Scuola under signed confidentiality agreements.",
                'it' => "Utilizziamo le informazioni raccolte per gestire le richieste accademiche, inviare comunicazioni istituzionali pertinenti, organizzare attività educative e rispettare gli obblighi legali applicabili. Non vendiamo mai i dati personali e li condividiamo solo con fornitori di servizi essenziali per la Scuola, nell\'ambito di accordi di riservatezza.",
            ],
        ],
        [
            'heading' => [
                'es' => 'Protección y conservación',
                'en' => 'Protection and retention',
                'it' => 'Protezione e conservazione',
            ],
            'body' => [
                'es' => "Implementamos controles de seguridad físicos, administrativos y tecnológicos para resguardar los datos frente a accesos no autorizados, pérdida o uso indebido. Conservamos la información únicamente durante el tiempo necesario para los fines institucionales o hasta que la normativa aplicable lo exija.",
                'en' => "We implement physical, administrative, and technological security controls to protect data from unauthorised access, loss, or misuse. We retain information only for as long as it is necessary for institutional purposes or as required by applicable regulations.",
                'it' => "Applichiamo controlli di sicurezza fisici, amministrativi e tecnologici per proteggere i dati da accessi non autorizzati, perdite o usi impropri. Conserviamo le informazioni solo per il tempo necessario ai fini istituzionali o come richiesto dalla normativa vigente.",
            ],
        ],
        [
            'heading' => [
                'es' => 'Derechos y consultas',
                'en' => 'Rights and enquiries',
                'it' => 'Diritti e richieste',
            ],
            'body' => [
                'es' => "Es posible solicitar acceso, actualización o eliminación de los datos personales, así como oponerse a determinados tratamientos. Para ejercer estos derechos o realizar preguntas sobre esta política, contáctenos a través de info@scuolaitaliana.edu.uy.",
                'en' => "You may request access, rectification, or deletion of your personal data, as well as object to certain types of processing. To exercise these rights or to ask questions about this policy, please contact us at info@scuolaitaliana.edu.uy.",
                'it' => "È possibile richiedere l\'accesso, la rettifica o l\'eliminazione dei dati personali, nonché opporsi a determinati trattamenti. Per esercitare tali diritti o per domande su questa informativa, contattateci all\'indirizzo info@scuolaitaliana.edu.uy.",
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
            background: linear-gradient(135deg, #0a2452 0%, #193c7b 100%);
            color: #ffffff;
            padding: 60px 24px 40px;
            text-align: center;
        }
        .legal-hero h1 {
            margin: 0;
            font-size: 2.2rem;
            letter-spacing: 0.5px;
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
            color: #0a2452;
        }
        .legal-block p {
            margin: 12px 0 0;
            line-height: 1.7;
            font-size: 1rem;
            color: #324d7b;
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
                <p><?php echo nl2br(htmlspecialchars(lp_tr($section['body'], $cl))); ?></p>
            </section>
        <?php endforeach; ?>

        <div class="legal-back">
            <a href="index.php"><?php echo htmlspecialchars(lp_tr($pageStrings['back_home'], $cl)); ?></a>
        </div>
    </main>
</body>
</html>

