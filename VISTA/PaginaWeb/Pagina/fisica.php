<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio de Física - Leyes de Newton</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body { height: 100%; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
            color: #2c3e50;
            display: flex;
            flex-direction: column;
        }

        /* Navbar (from index.php minimal) */
        .navbar { position: fixed; top: 0; left: 0; right: 0; height: 80px; background: rgba(10, 36, 82, 0.5); z-index: 1000; transition: all 0.3s ease; }
        .nav-container { display: flex; justify-content: space-between; align-items: center; padding: 0 5%; max-width: 1200px; margin: 0 auto; height: 100%; }
        .nav-logo { position: relative; height: 100%; overflow: visible; }
        .nav-logo img { height: 120px; width: auto; position: absolute; top: 50%; transform: translateY(-50%); }
        .nav-menu-button { display: flex; flex-direction: column; cursor: pointer; padding: 8px; transition: all 0.3s ease; }
        .nav-menu-button span { width: 25px; height: 3px; background-color: white; margin: 3px 0; transition: 0.3s; border-radius: 2px; }
        .nav-menu-button:hover span { background-color: #F39C12; }

        /* Footer (from index.php minimal) */
        .footer-bottom-new { background: #1B4F72; color: white; padding: 0; margin-top: auto; }
        .footer-container { display: flex; align-items: center; justify-content: space-between; padding: 30px 5%; max-width: 1200px; margin: 0 auto; }
        .footer-left { flex: 1; display: flex; align-items: center; gap: 20px; }
        .footer-logo img { height: 60px; width: auto; }
        .footer-subtitle p { margin: 0; font-size: 14px; color: #E8E8E8; }
        .footer-center, .footer-right { flex: 1; padding: 0 20px; }
        .footer-section h4 { color: white; font-size: 16px; font-weight: 600; margin-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 5px; }
        .footer-section p { margin: 8px 0; font-size: 14px; color: #E8E8E8; line-height: 1.4; }
        .footer-info-bar { background: #154360; text-align: center; padding: 15px 5%; border-top: 1px solid rgba(255,255,255,0.1); }
        .footer-info-bar p { margin: 0; font-size: 12px; color: #BDC3C7; }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        header {
            margin-bottom: 50px;
        }

        h1 {
            font-size: 2.5em;
            font-weight: 600;
            color: #1a202c;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            font-size: 1.1em;
            color: #64748b;
            font-weight: 400;
        }

        .experiments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(520px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .experiment-card {
            background: #ffffff;
            border-radius: 8px;
            padding: 32px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
        }

        .experiment-title {
            font-size: 1.5em;
            color: #1a202c;
            margin-bottom: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .law-badge {
            background: #2d3748;
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 0.5em;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .experiment-description {
            margin-bottom: 24px;
            line-height: 1.6;
            color: #4a5568;
            font-size: 0.95em;
        }

        .canvas-container {
            background: #f8fafc;
            border-radius: 6px;
            padding: 20px;
            margin: 24px 0;
            border: 1px solid #e2e8f0;
        }

        canvas {
            display: block;
            margin: 0 auto;
            border-radius: 4px;
        }

        .controls {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 24px;
            align-items: flex-end;
        }

        .control-group {
            flex: 1;
            min-width: 180px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2d3748;
            font-size: 0.9em;
        }

        input[type="range"] {
            width: 100%;
            height: 6px;
            border-radius: 3px;
            background: #e2e8f0;
            outline: none;
            -webkit-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #2d3748;
            cursor: pointer;
            transition: all 0.15s;
        }

        input[type="range"]::-webkit-slider-thumb:hover {
            background: #1a202c;
            transform: scale(1.1);
        }

        input[type="range"]::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #2d3748;
            cursor: pointer;
            border: none;
            transition: all 0.15s;
        }

        input[type="range"]::-moz-range-thumb:hover {
            background: #1a202c;
            transform: scale(1.1);
        }

        button {
            background: #2d3748;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 0.9em;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid transparent;
        }

        button:hover {
            background: #1a202c;
        }

        button:active {
            transform: translateY(1px);
        }

        button:nth-of-type(2) {
            background: #ffffff;
            color: #2d3748;
            border: 1px solid #cbd5e0;
        }

        button:nth-of-type(2):hover {
            background: #f7fafc;
            border-color: #a0aec0;
        }

        .value-display {
            display: inline-block;
            background: #edf2f7;
            padding: 3px 10px;
            border-radius: 3px;
            font-weight: 600;
            color: #2d3748;
            margin-left: 8px;
            font-size: 0.9em;
        }

        .info-box {
            background: #edf2f7;
            color: #2d3748;
            padding: 14px 16px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 0.9em;
            line-height: 1.5;
            border-left: 3px solid #4a5568;
        }

        .formula {
            background: #f8fafc;
            padding: 12px 16px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            margin: 16px 0;
            border: 1px solid #e2e8f0;
            font-size: 0.95em;
            color: #2d3748;
        }

        @media (max-width: 768px) {
            .experiments-grid {
                grid-template-columns: 1fr;
            }
            h1 {
                font-size: 2em;
            }
            .experiment-card {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
    <?php include __DIR__.'/includes/navbar.php'; ?>

    <div class="container" style="margin-top:120px; flex: 1 0 auto; padding: 40px 20px;">
        <header>
            <h1>Laboratorio de Física</h1>
            <p class="subtitle">Simulaciones interactivas de las Leyes de Newton y Gravedad</p>
        </header>

        <div class="experiments-grid">
            <!-- Experimento 1: Primera Ley de Newton -->
            <div class="experiment-card">
                <h2 class="experiment-title">
                    <span>Inercia y Fricción</span>
                    <span class="law-badge">1ª LEY</span>
                </h2>
                <p class="experiment-description">
                    Un objeto en movimiento permanece en movimiento a velocidad constante a menos que actúe una fuerza externa sobre él. La fricción es la fuerza que gradualmente detiene la pelota.
                </p>
                
                <div class="canvas-container">
                    <canvas id="canvas1" width="500" height="250"></canvas>
                </div>

                <div class="controls">
                    <div class="control-group">
                        <label>Velocidad Inicial<span class="value-display" id="speed1-value">5</span> m/s</label>
                        <input type="range" id="speed1" min="1" max="15" value="5" step="0.5">
                    </div>
                    <div class="control-group">
                        <label>Coeficiente de Fricción<span class="value-display" id="friction1-value">0.02</span></label>
                        <input type="range" id="friction1" min="0" max="0.1" value="0.02" step="0.01">
                    </div>
                    <button onclick="startExp1()">Iniciar</button>
                    <button onclick="resetExp1()">Reiniciar</button>
                </div>

                <div class="formula">F = ma (Fuerza = masa × aceleración)</div>
                <div class="info-box">
                    <strong>Observación:</strong> Con mayor fricción, la pelota se detiene más rápidamente. Sin fricción, el objeto continuaría indefinidamente a velocidad constante.
                </div>
            </div>

            <!-- Experimento 2: Segunda Ley de Newton -->
            <div class="experiment-card">
                <h2 class="experiment-title">
                    <span>Fuerza y Aceleración</span>
                    <span class="law-badge">2ª LEY</span>
                </h2>
                <p class="experiment-description">
                    La aceleración de un objeto es directamente proporcional a la fuerza neta aplicada sobre él e inversamente proporcional a su masa.
                </p>
                
                <div class="canvas-container">
                    <canvas id="canvas2" width="500" height="250"></canvas>
                </div>

                <div class="controls">
                    <div class="control-group">
                        <label>Fuerza Aplicada<span class="value-display" id="force2-value">50</span> N</label>
                        <input type="range" id="force2" min="10" max="150" value="50" step="5">
                    </div>
                    <div class="control-group">
                        <label>Masa del Objeto<span class="value-display" id="mass2-value">10</span> kg</label>
                        <input type="range" id="mass2" min="5" max="30" value="10" step="1">
                    </div>
                    <button onclick="startExp2()">Aplicar Fuerza</button>
                    <button onclick="resetExp2()">Reiniciar</button>
                </div>

                <div class="formula">a = F/m | Aceleración resultante: <span id="accel-display">5</span> m/s²</div>
                <div class="info-box">
                    <strong>Relación:</strong> Mayor fuerza produce mayor aceleración. Mayor masa produce menor aceleración para la misma fuerza aplicada.
                </div>
            </div>

            <!-- Experimento 3: Tercera Ley de Newton -->
            <div class="experiment-card">
                <h2 class="experiment-title">
                    <span>Acción y Reacción</span>
                    <span class="law-badge">3ª LEY</span>
                </h2>
                <p class="experiment-description">
                    Para cada acción existe una reacción igual en magnitud pero opuesta en dirección. El cohete expulsa gases hacia abajo (acción), generando un empuje hacia arriba (reacción).
                </p>
                
                <div class="canvas-container">
                    <canvas id="canvas3" width="500" height="300"></canvas>
                </div>

                <div class="controls">
                    <div class="control-group">
                        <label>Potencia del Motor<span class="value-display" id="thrust3-value">5</span></label>
                        <input type="range" id="thrust3" min="1" max="10" value="5" step="0.5">
                    </div>
                    <button onclick="startExp3()">Lanzar</button>
                    <button onclick="resetExp3()">Reiniciar</button>
                </div>

                <div class="formula">F₁ = -F₂ (Fuerza de acción = -Fuerza de reacción)</div>
                <div class="info-box">
                    <strong>Principio:</strong> El cohete empuja gases hacia abajo con cierta fuerza, y los gases empujan el cohete hacia arriba con la misma fuerza en sentido contrario.
                </div>
            </div>

            <!-- Experimento 4: Gravedad y Caída Libre -->
            <div class="experiment-card">
                <h2 class="experiment-title">
                    <span>Caída Libre</span>
                    <span class="law-badge">GRAVEDAD</span>
                </h2>
                <p class="experiment-description">
                    En ausencia de resistencia del aire, todos los objetos caen con la misma aceleración gravitacional (9.8 m/s²) independientemente de su masa.
                </p>
                
                <div class="canvas-container">
                    <canvas id="canvas4" width="500" height="350"></canvas>
                </div>

                <div class="controls">
                    <div class="control-group">
                        <label>Aceleración Gravitacional<span class="value-display" id="gravity4-value">9.8</span> m/s²</label>
                        <input type="range" id="gravity4" min="1" max="20" value="9.8" step="0.1">
                    </div>
                    <div class="control-group">
                        <label>Resistencia del Aire<span class="value-display" id="air4-value">0</span></label>
                        <input type="range" id="air4" min="0" max="0.05" value="0" step="0.005">
                    </div>
                    <button onclick="startExp4()">Soltar</button>
                    <button onclick="resetExp4()">Reiniciar</button>
                </div>

                <div class="formula">h = ½gt² | v = gt</div>
                <div class="info-box">
                    <strong>Experimento de Galileo:</strong> Sin resistencia del aire, ambos objetos caen simultáneamente. Con resistencia, el más ligero experimenta mayor desaceleración.
                </div>
            </div>

            <!-- Experimento 5: Péndulo -->
            <div class="experiment-card">
                <h2 class="experiment-title">
                    <span>Péndulo Simple</span>
                    <span class="law-badge">GRAVEDAD</span>
                </h2>
                <p class="experiment-description">
                    El período de oscilación de un péndulo depende únicamente de su longitud y la aceleración gravitacional, siendo independiente de su masa y amplitud (para ángulos pequeños).
                </p>
                
                <div class="canvas-container">
                    <canvas id="canvas5" width="500" height="350"></canvas>
                </div>

                <div class="controls">
                    <div class="control-group">
                        <label>Longitud del Péndulo<span class="value-display" id="length5-value">150</span> px</label>
                        <input type="range" id="length5" min="80" max="250" value="150" step="5">
                    </div>
                    <div class="control-group">
                        <label>Ángulo Inicial<span class="value-display" id="angle5-value">45</span>°</label>
                        <input type="range" id="angle5" min="10" max="80" value="45" step="5">
                    </div>
                    <button onclick="startExp5()">Iniciar</button>
                    <button onclick="stopExp5()">Detener</button>
                </div>

                <div class="formula">T = 2π√(L/g) | Período medido: <span id="period-display">0</span> s</div>
                <div class="info-box">
                    <strong>Comportamiento:</strong> El período aumenta con la longitud del péndulo. El ángulo inicial afecta levemente solo en oscilaciones de gran amplitud.
                </div>
            </div>

            <!-- Experimento 6: Tiro Parabólico -->
            <div class="experiment-card">
                <h2 class="experiment-title">
                    <span>Tiro Parabólico</span>
                    <span class="law-badge">GRAVEDAD</span>
                </h2>
                <p class="experiment-description">
                    El movimiento parabólico combina un movimiento horizontal uniforme con un movimiento vertical uniformemente acelerado por la gravedad.
                </p>
                
                <div class="canvas-container">
                    <canvas id="canvas6" width="500" height="300"></canvas>
                </div>

                <div class="controls">
                    <div class="control-group">
                        <label>Velocidad Inicial<span class="value-display" id="velocity6-value">15</span> m/s</label>
                        <input type="range" id="velocity6" min="5" max="25" value="15" step="1">
                    </div>
                    <div class="control-group">
                        <label>Ángulo de Lanzamiento<span class="value-display" id="angle6-value">45</span>°</label>
                        <input type="range" id="angle6" min="15" max="85" value="45" step="5">
                    </div>
                    <button onclick="startExp6()">Disparar</button>
                    <button onclick="resetExp6()">Reiniciar</button>
                </div>

                <div class="formula">
                    x = v₀cos(θ)t | y = v₀sin(θ)t - ½gt²
                    <br>Alcance teórico: <span id="range-display">0</span> m | Altura máxima: <span id="height-display">0</span> m
                </div>
                <div class="info-box">
                    <strong>Ángulo óptimo:</strong> 45° proporciona el máximo alcance horizontal en condiciones ideales sin resistencia del aire.
                </div>
            </div>
        </div>
    </div>

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
                    <h4>Contacto</h4>
                    <p>Gral. French 2380</p>
                    <p>CP 11500 - Montevideo, Uruguay</p>
                    <p>(+598) 2600 1527</p>
                    <p>info@scuolaitaliana.edu.uy</p>
                </div>
            </div>
            <div class="footer-right">
                <div class="footer-section">
                    <h4>Enlaces útiles</h4>
                    <p>Política de privacidad</p>
                    <p>Requisitos técnicos</p>
                    <p>Accesibilidad</p>
                </div>
            </div>
        </div>
        <div class="footer-info-bar">
            <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>
        </div>
    </footer>

    <script>
        // Experimento 1: Inercia y Fricción
        let canvas1 = document.getElementById('canvas1');
        let ctx1 = canvas1.getContext('2d');
        let ball1 = {x: 50, y: 125, radius: 20, vx: 0, color: '#2d3748'};
        let anim1;

        document.getElementById('speed1').oninput = function() {
            document.getElementById('speed1-value').textContent = this.value;
        };
        document.getElementById('friction1').oninput = function() {
            document.getElementById('friction1-value').textContent = this.value;
        };

        function drawBall1() {
            ctx1.clearRect(0, 0, canvas1.width, canvas1.height);
            
            ctx1.fillStyle = '#cbd5e0';
            ctx1.fillRect(0, 145, canvas1.width, 105);
            
            ctx1.beginPath();
            ctx1.arc(ball1.x, ball1.y, ball1.radius, 0, Math.PI * 2);
            ctx1.fillStyle = ball1.color;
            ctx1.fill();
            ctx1.strokeStyle = '#1a202c';
            ctx1.lineWidth = 2;
            ctx1.stroke();
            
            ctx1.beginPath();
            ctx1.ellipse(ball1.x, 155, ball1.radius * 0.8, ball1.radius * 0.3, 0, 0, Math.PI * 2);
            ctx1.fillStyle = 'rgba(0,0,0,0.15)';
            ctx1.fill();
        }

        function startExp1() {
            cancelAnimationFrame(anim1);
            ball1.vx = parseFloat(document.getElementById('speed1').value);
            animateExp1();
        }

        function animateExp1() {
            let friction = parseFloat(document.getElementById('friction1').value);
            ball1.vx *= (1 - friction);
            ball1.x += ball1.vx;

            if (ball1.x > canvas1.width - ball1.radius) {
                ball1.x = canvas1.width - ball1.radius;
                ball1.vx = 0;
            }

            drawBall1();

            if (Math.abs(ball1.vx) > 0.01) {
                anim1 = requestAnimationFrame(animateExp1);
            }
        }

        function resetExp1() {
            cancelAnimationFrame(anim1);
            ball1.x = 50;
            ball1.vx = 0;
            drawBall1();
        }

        resetExp1();

        // Experimento 2: Fuerza y Aceleración
        let canvas2 = document.getElementById('canvas2');
        let ctx2 = canvas2.getContext('2d');
        let box2 = {x: 50, y: 100, width: 40, height: 40, vx: 0, color: '#2d3748'};
        let anim2;

        document.getElementById('force2').oninput = function() {
            document.getElementById('force2-value').textContent = this.value;
            updateAccel();
        };
        document.getElementById('mass2').oninput = function() {
            document.getElementById('mass2-value').textContent = this.value;
            updateAccel();
            box2.width = 30 + parseInt(this.value);
            box2.height = 30 + parseInt(this.value);
        };

        function updateAccel() {
            let force = parseFloat(document.getElementById('force2').value);
            let mass = parseFloat(document.getElementById('mass2').value);
            let accel = (force / mass).toFixed(2);
            document.getElementById('accel-display').textContent = accel;
        }

        function drawBox2() {
            ctx2.clearRect(0, 0, canvas2.width, canvas2.height);
            
            ctx2.fillStyle = '#cbd5e0';
            ctx2.fillRect(0, 140, canvas2.width, 110);
            
            ctx2.fillStyle = box2.color;
            ctx2.fillRect(box2.x, box2.y, box2.width, box2.height);
            ctx2.strokeStyle = '#1a202c';
            ctx2.lineWidth = 2;
            ctx2.strokeRect(box2.x, box2.y, box2.width, box2.height);
            
            if (box2.vx > 0) {
                ctx2.strokeStyle = '#718096';
                ctx2.lineWidth = 3;
                ctx2.beginPath();
                ctx2.moveTo(box2.x + box2.width + 10, box2.y + box2.height/2);
                ctx2.lineTo(box2.x + box2.width + 40, box2.y + box2.height/2);
                ctx2.stroke();
                ctx2.beginPath();
                ctx2.moveTo(box2.x + box2.width + 40, box2.y + box2.height/2);
                ctx2.lineTo(box2.x + box2.width + 30, box2.y + box2.height/2 - 8);
                ctx2.lineTo(box2.x + box2.width + 30, box2.y + box2.height/2 + 8);
                ctx2.closePath();
                ctx2.fillStyle = '#718096';
                ctx2.fill();
            }
        }

        function startExp2() {
            cancelAnimationFrame(anim2);
            let force = parseFloat(document.getElementById('force2').value);
            let mass = parseFloat(document.getElementById('mass2').value);
            box2.vx = force / mass / 10;
            animateExp2();
        }

        function animateExp2() {
            box2.x += box2.vx;

            if (box2.x > canvas2.width - box2.width - 10) {
                box2.x = canvas2.width - box2.width - 10;
                box2.vx = 0;
            }

            drawBox2();

            if (box2.vx > 0) {
                anim2 = requestAnimationFrame(animateExp2);
            }
        }

        function resetExp2() {
            cancelAnimationFrame(anim2);
            box2.x = 50;
            box2.y = 100;
            box2.vx = 0;
            drawBox2();
        }

        updateAccel();
        resetExp2();

        // Experimento 3: Acción y Reacción
        let canvas3 = document.getElementById('canvas3');
        let ctx3 = canvas3.getContext('2d');
        let rocket3 = {x: 250, y: 250, vy: 0, thrust: 0, active: false};
        let particles3 = [];
        let anim3;

        document.getElementById('thrust3').oninput = function() {
            document.getElementById('thrust3-value').textContent = this.value;
        };

        function drawRocket3() {
            ctx3.clearRect(0, 0, canvas3.width, canvas3.height);
            
            particles3.forEach((p, index) => {
                p.y += p.vy;
                p.x += (Math.random() - 0.5) * 2;
                p.life--;
                p.size *= 0.95;
                
                if (p.life <= 0) {
                    particles3.splice(index, 1);
                } else {
                    ctx3.beginPath();
                    ctx3.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                    ctx3.fillStyle = `rgba(113, 128, 150, ${p.life / 30})`;
                    ctx3.fill();
                }
            });
            
            ctx3.fillStyle = '#2d3748';
            ctx3.beginPath();
            ctx3.moveTo(rocket3.x, rocket3.y - 30);
            ctx3.lineTo(rocket3.x - 15, rocket3.y + 10);
            ctx3.lineTo(rocket3.x + 15, rocket3.y + 10);
            ctx3.closePath();
            ctx3.fill();
            ctx3.strokeStyle = '#1a202c';
            ctx3.lineWidth = 2;
            ctx3.stroke();
            
            ctx3.fillStyle = '#cbd5e0';
            ctx3.fillRect(rocket3.x - 5, rocket3.y - 10, 10, 8);
            
            if (rocket3.active) {
                for (let i = 0; i < 3; i++) {
                    particles3.push({
                        x: rocket3.x + (Math.random() - 0.5) * 15,
                        y: rocket3.y + 10,
                        vy: 3 + Math.random() * 2,
                        life: 30,
                        size: 5 + Math.random() * 3
                    });
                }
            }
        }

        function startExp3() {
            cancelAnimationFrame(anim3);
            rocket3.active = true;
            rocket3.thrust = parseFloat(document.getElementById('thrust3').value);
            animateExp3();
        }

        function animateExp3() {
            if (rocket3.active) {
                rocket3.vy -= rocket3.thrust * 0.05;
            }
            
            rocket3.vy += 0.2;
            rocket3.y += rocket3.vy;

            if (rocket3.y > 250) {
                rocket3.y = 250;
                rocket3.vy = 0;
                rocket3.active = false;
            }

            if (rocket3.y < 30) {
                rocket3.y = 30;
                rocket3.vy = 0;
            }

            drawRocket3();
            anim3 = requestAnimationFrame(animateExp3);
        }

        function resetExp3() {
            cancelAnimationFrame(anim3);
            rocket3 = {x: 250, y: 250, vy: 0, thrust: 0, active: false};
            particles3 = [];
            drawRocket3();
        }

        resetExp3();

        // Experimento 4: Caída Libre
        let canvas4 = document.getElementById('canvas4');
        let ctx4 = canvas4.getContext('2d');
        let objects4 = [
            {x: 150, y: 50, vy: 0, mass: 1, color: '#4a5568', radius: 15, name: 'Ligero'},
            {x: 350, y: 50, vy: 0, mass: 3, color: '#2d3748', radius: 25, name: 'Pesado'}
        ];
        let anim4;

        document.getElementById('gravity4').oninput = function() {
            document.getElementById('gravity4-value').textContent = this.value;
        };
        document.getElementById('air4').oninput = function() {
            document.getElementById('air4-value').textContent = this.value;
        };

        function drawObjects4() {
            ctx4.clearRect(0, 0, canvas4.width, canvas4.height);
            
            ctx4.fillStyle = '#cbd5e0';
            ctx4.fillRect(0, 300, canvas4.width, 50);
            
            objects4.forEach(obj => {
                ctx4.beginPath();
                ctx4.arc(obj.x, obj.y, obj.radius, 0, Math.PI * 2);
                ctx4.fillStyle = obj.color;
                ctx4.fill();
                ctx4.strokeStyle = '#1a202c';
                ctx4.lineWidth = 2;
                ctx4.stroke();
                
                ctx4.fillStyle = '#2d3748';
                ctx4.font = '13px sans-serif';
                ctx4.textAlign = 'center';
                ctx4.fillText(obj.name, obj.x, obj.y - obj.radius - 8);
            });
        }

        function startExp4() {
            cancelAnimationFrame(anim4);
            objects4.forEach(obj => {
                obj.y = 50;
                obj.vy = 0;
            });
            animateExp4();
        }

        function animateExp4() {
            let gravity = parseFloat(document.getElementById('gravity4').value);
            let airResistance = parseFloat(document.getElementById('air4').value);
            
            objects4.forEach(obj => {
                obj.vy += gravity * 0.1;
                obj.vy *= (1 - airResistance * (1 / obj.mass));
                obj.y += obj.vy;

                if (obj.y + obj.radius > 300) {
                    obj.y = 300 - obj.radius;
                    obj.vy *= -0.7;
                    if (Math.abs(obj.vy) < 0.5) obj.vy = 0;
                }
            });

            drawObjects4();

            if (objects4.some(obj => obj.vy !== 0 || obj.y + obj.radius < 300)) {
                anim4 = requestAnimationFrame(animateExp4);
            }
        }

        function resetExp4() {
            cancelAnimationFrame(anim4);
            objects4[0] = {x: 150, y: 50, vy: 0, mass: 1, color: '#4a5568', radius: 15, name: 'Ligero'};
            objects4[1] = {x: 350, y: 50, vy: 0, mass: 3, color: '#2d3748', radius: 25, name: 'Pesado'};
            drawObjects4();
        }

        resetExp4();

        // Experimento 5: Péndulo
        let canvas5 = document.getElementById('canvas5');
        let ctx5 = canvas5.getContext('2d');
        let pendulum5 = {
            originX: 250,
            originY: 50,
            length: 150,
            angle: Math.PI / 4,
            angularVelocity: 0,
            angularAcceleration: 0,
            damping: 0.995,
            gravity: 0.5,
            running: false
        };
        let anim5;
        let startTime5 = 0;
        let swings5 = 0;
        let lastAngle5 = 0;

        document.getElementById('length5').oninput = function() {
            document.getElementById('length5-value').textContent = this.value;
            if (!pendulum5.running) {
                pendulum5.length = parseFloat(this.value);
                drawPendulum5();
            }
        };
        
        document.getElementById('angle5').oninput = function() {
            document.getElementById('angle5-value').textContent = this.value;
            if (!pendulum5.running) {
                pendulum5.angle = parseFloat(this.value) * Math.PI / 180;
                drawPendulum5();
            }
        };

        function drawPendulum5() {
            ctx5.clearRect(0, 0, canvas5.width, canvas5.height);
            
            let bobX = pendulum5.originX + pendulum5.length * Math.sin(pendulum5.angle);
            let bobY = pendulum5.originY + pendulum5.length * Math.cos(pendulum5.angle);
            
            ctx5.fillStyle = '#2d3748';
            ctx5.fillRect(pendulum5.originX - 30, pendulum5.originY - 10, 60, 10);
            
            ctx5.strokeStyle = '#718096';
            ctx5.lineWidth = 2;
            ctx5.beginPath();
            ctx5.moveTo(pendulum5.originX, pendulum5.originY);
            ctx5.lineTo(bobX, bobY);
            ctx5.stroke();
            
            ctx5.beginPath();
            ctx5.arc(bobX, bobY, 20, 0, Math.PI * 2);
            ctx5.fillStyle = '#2d3748';
            ctx5.fill();
            ctx5.strokeStyle = '#1a202c';
            ctx5.lineWidth = 2;
            ctx5.stroke();
            
            ctx5.beginPath();
            ctx5.ellipse(bobX, 320, 15, 5, 0, 0, Math.PI * 2);
            ctx5.fillStyle = 'rgba(0,0,0,0.15)';
            ctx5.fill();
        }

        function startExp5() {
            pendulum5.running = true;
            pendulum5.length = parseFloat(document.getElementById('length5').value);
            pendulum5.angle = parseFloat(document.getElementById('angle5').value) * Math.PI / 180;
            pendulum5.angularVelocity = 0;
            startTime5 = Date.now();
            swings5 = 0;
            lastAngle5 = pendulum5.angle;
            animateExp5();
        }

        function stopExp5() {
            pendulum5.running = false;
            cancelAnimationFrame(anim5);
        }

        function animateExp5() {
            if (!pendulum5.running) return;

            pendulum5.angularAcceleration = (-pendulum5.gravity / pendulum5.length) * Math.sin(pendulum5.angle);
            pendulum5.angularVelocity += pendulum5.angularAcceleration;
            pendulum5.angularVelocity *= pendulum5.damping;
            pendulum5.angle += pendulum5.angularVelocity;

            if (lastAngle5 < 0 && pendulum5.angle >= 0) {
                swings5++;
                if (swings5 === 1) {
                    let elapsed = (Date.now() - startTime5) / 1000;
                    document.getElementById('period-display').textContent = elapsed.toFixed(2);
                }
            }
            lastAngle5 = pendulum5.angle;

            drawPendulum5();
            anim5 = requestAnimationFrame(animateExp5);
        }

        drawPendulum5();

        // Experimento 6: Tiro Parabólico
        let canvas6 = document.getElementById('canvas6');
        let ctx6 = canvas6.getContext('2d');
        let projectile6 = {x: 50, y: 250, vx: 0, vy: 0, active: false};
        let trail6 = [];
        let anim6;

        document.getElementById('velocity6').oninput = function() {
            document.getElementById('velocity6-value').textContent = this.value;
        };
        
        document.getElementById('angle6').oninput = function() {
            document.getElementById('angle6-value').textContent = this.value;
        };

        function drawProjectile6() {
            ctx6.clearRect(0, 0, canvas6.width, canvas6.height);
            
            ctx6.fillStyle = '#cbd5e0';
            ctx6.fillRect(0, 250, canvas6.width, 50);
            
            ctx6.save();
            ctx6.translate(50, 250);
            let angle = parseFloat(document.getElementById('angle6').value) * Math.PI / 180;
            ctx6.rotate(-angle);
            ctx6.fillStyle = '#2d3748';
            ctx6.fillRect(0, -8, 40, 16);
            ctx6.restore();
            
            ctx6.beginPath();
            ctx6.arc(50, 250, 15, 0, Math.PI * 2);
            ctx6.fillStyle = '#1a202c';
            ctx6.fill();
            
            ctx6.strokeStyle = 'rgba(74, 85, 104, 0.4)';
            ctx6.lineWidth = 2;
            if (trail6.length > 1) {
                ctx6.beginPath();
                ctx6.moveTo(trail6[0].x, trail6[0].y);
                for (let i = 1; i < trail6.length; i++) {
                    ctx6.lineTo(trail6[i].x, trail6[i].y);
                }
                ctx6.stroke();
            }
            
            if (projectile6.active) {
                ctx6.beginPath();
                ctx6.arc(projectile6.x, projectile6.y, 8, 0, Math.PI * 2);
                ctx6.fillStyle = '#2d3748';
                ctx6.fill();
                ctx6.strokeStyle = '#1a202c';
                ctx6.lineWidth = 2;
                ctx6.stroke();
            }
        }

        function startExp6() {
            cancelAnimationFrame(anim6);
            trail6 = [];
            
            let velocity = parseFloat(document.getElementById('velocity6').value);
            let angle = parseFloat(document.getElementById('angle6').value) * Math.PI / 180;
            
            projectile6 = {
                x: 50,
                y: 250,
                vx: velocity * Math.cos(angle),
                vy: -velocity * Math.sin(angle),
                active: true
            };
            
            let g = 9.8;
            let range = (velocity * velocity * Math.sin(2 * angle)) / g;
            let maxHeight = (velocity * velocity * Math.sin(angle) * Math.sin(angle)) / (2 * g);
            
            document.getElementById('range-display').textContent = range.toFixed(1);
            document.getElementById('height-display').textContent = maxHeight.toFixed(1);
            
            animateExp6();
        }

        function animateExp6() {
            projectile6.vy += 0.3;
            projectile6.x += projectile6.vx;
            projectile6.y += projectile6.vy;
            
            trail6.push({x: projectile6.x, y: projectile6.y});
            if (trail6.length > 100) trail6.shift();

            if (projectile6.y >= 250) {
                projectile6.y = 250;
                projectile6.active = false;
            }

            if (projectile6.x > canvas6.width) {
                projectile6.active = false;
            }

            drawProjectile6();

            if (projectile6.active) {
                anim6 = requestAnimationFrame(animateExp6);
            }
        }

        function resetExp6() {
            cancelAnimationFrame(anim6);
            projectile6 = {x: 50, y: 250, vx: 0, vy: 0, active: false};
            trail6 = [];
            document.getElementById('range-display').textContent = '0';
            document.getElementById('height-display').textContent = '0';
            drawProjectile6();
        }

        resetExp6();
    </script>
</body>
</html>