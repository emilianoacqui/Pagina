-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2025 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigie`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('tarea','examen','otro') NOT NULL DEFAULT 'otro',
  `descripcion` text DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendario`
--

INSERT INTO `calendario` (`id`, `id_clase`, `fecha`, `tipo`, `descripcion`, `creado_por`, `creado_en`) VALUES
(2, 15, '2025-12-11', 'examen', 'sisop', 17, '2025-09-09 16:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `calendarios`
--

CREATE TABLE `calendarios` (
  `id_calendario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('entrega','examen') NOT NULL,
  `id_clase` int(11) NOT NULL,
  `creado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clases`
--

CREATE TABLE `clases` (
  `id_clase` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clases`
--

INSERT INTO `clases` (`id_clase`, `nombre`, `año`) VALUES
(16, 'artistico', 2),
(15, 'bt', 1),
(10, 'Bt', 3),
(17, 'informatica', 2),
(13, 'linguistco', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` varchar(255) NOT NULL,
  `url` varchar(512) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `template` varchar(100) DEFAULT 'existing_page',
  `last_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_cms_pages_url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `url`, `name`, `content`, `template`, `last_modified`, `created_at`) VALUES
('1759333602291', 'custom_1759333602291', 'Plantilla Centrada', '\n  <div style=\"width: 100%; margin: 0; padding: 0; zoom: 1; transform: scale(1);\">\n    <style>\nhtml, body {\n  width: 100% !important;\n  max-width: 100% !important;\n  overflow-x: hidden !important;\n  font-size: 16px !important;\n  margin: 0 !important;\n  padding: 0 !important;\n  zoom: 1 !important;\n  transform: scale(1) !important;\n}\n\n* {\n  max-width: 100% !important;\n  box-sizing: border-box !important;\n}\n\n        \n          * { margin: 0; padding: 0; box-sizing: border-box; }\n          body { font-family: \'Merriweather Sans\', sans-serif; line-height: 1.6; color: #333; }\n          .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }\n \n          .navbar { position: relative; background: rgba(10, 36, 82, 0.5); z-index: 1000; height: 80px; }\n          .nav-container { display: flex; justify-content: space-between; align-items: center; padding: 15px 5%; max-width: 1200px; margin: 0 auto;  height: 100%; }\n          .nav-logo img { height: 50px; width: auto; }\n          .nav-menu-button { display: flex; flex-direction: column; cursor: pointer; padding: 8px; }\n          .nav-menu-button span { width: 25px; height: 3px; background: white; margin: 3px 0; border-radius: 2px; }\n\n            /* Navigation */\n          .hero-centered { \n    position: relative;\n    top: -80px;\n    height: calc(70vh + 80px); \n    display: flex; \n    align-items: center; \n    justify-content: center; \n    margin-bottom: -80px;\n}         \n\n          .hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(27, 47, 111, 0.3); }\n          .hero-content-center { text-align: center; color: white; z-index: 2; position: relative; max-width: 800px; padding: 0 20px; }\n          .hero-title-center { font-size: 3.5rem; font-weight: 700; margin-bottom: 20px; }\n          .hero-subtitle-center { font-size: 1.3rem; opacity: 0.95; }\n\n          /* Main Content Centered */\n          .main-centered { padding: 80px 0; }\n          \n          .full-text, .final-text { margin: 60px 0; }\n          .text-container { max-width: 800px; margin: 0 auto; text-align: center; }\n          .centered-title { font-size: 2.2rem; color: #1B2F6F; margin-bottom: 30px; }\n          .centered-text { font-size: 1.1rem; color: #555; line-height: 1.8; }\n\n          /* Quote Section */\n          .quote-section { background: #f8f9fa; padding: 60px 0; margin: 60px 0; }\n          .quote-container { max-width: 700px; margin: 0 auto; text-align: center; }\n          .main-quote { font-size: 1.5rem; font-style: italic; color: #1B2F6F; line-height: 1.6; border: none; margin-bottom: 20px; }\n          .quote-author { font-size: 1rem; color: #DC343C; font-weight: 600; }\n\n          /* Two Columns */\n          .two-columns { margin: 60px 0; }\n          .columns-container { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; max-width: 900px; margin: 0 auto; }\n          .column-title { font-size: 1.4rem; color: #1B2F6F; margin-bottom: 20px; }\n          .column-text { color: #555; line-height: 1.7; }\n\n          /* Footer */\n          .footer { background: #1B2F6F; color: white; padding: 40px 0; text-align: center; }\n          .footer-logo { height: 60px; margin-bottom: 15px; }\n\n          @media (max-width: 768px) {\n              .columns-container { grid-template-columns: 1fr; gap: 40px; }\n              .hero-title-center { font-size: 2.5rem; }\n          }\n        \n.footer-bottom-new {\n    background: #1B4F72;\n    color: white;\n    padding: 0;\n    margin: 0;\n}\n\n.footer-container {\n    display: flex;\n    align-items: center;\n    justify-content: space-between;\n    padding: 30px 5%;\n    max-width: 1200px;\n    margin: 0 auto;\n}\n\n.footer-left {\n    flex: 1;\n    display: flex;\n    align-items: center;\n    gap: 20px;\n}\n\n.footer-logo img {\n    height: 60px;\n    width: auto;\n}\n\n.footer-subtitle p {\n    margin: 0;\n    font-size: 14px;\n    color: #E8E8E8;\n}\n\n.footer-center,\n.footer-right {\n    flex: 1;\n    padding: 0 20px;\n}\n\n.footer-section h4 {\n    color: white;\n    font-size: 16px;\n    font-weight: 600;\n    margin-bottom: 10px;\n    border-bottom: 1px solid rgba(255,255,255,0.2);\n    padding-bottom: 5px;\n}\n\n.footer-section p {\n    margin: 8px 0;\n    font-size: 14px;\n    color: #E8E8E8;\n    line-height: 1.4;\n}\n\n.footer-info-bar {\n    background: #154360;\n    text-align: center;\n    padding: 15px 5%;\n    border-top: 1px solid rgba(255,255,255,0.1);\n}\n\n.footer-info-bar p {\n    margin: 0;\n    font-size: 12px;\n    color: #BDC3C7;\n}\n\n@media (max-width: 768px) {\n    .footer-container {\n        flex-direction: column;\n        gap: 30px;\n        text-align: center;\n    }\n    \n    .footer-left {\n        flex-direction: column;\n        gap: 10px;\n    }\n    \n    .footer-center,\n    .footer-right {\n        padding: 0;\n        width: 100%;\n    }\n    \n    .footer-section {\n        margin-bottom: 20px;\n    }\n}</style>\n    \n          <!-- Navigation -->\n          <nav class=\"navbar\">\n              <div class=\"nav-container\">\n                  <div class=\"nav-logo\">\n                      <img src=\"fotosPrincipales/logo2.png\" alt=\"Scuola Italiana di Montevideo\" style=\"height: 120px;\">\n                  </div>\n                  <div class=\"nav-menu-button\" onclick=\"window.location.href=\'menuScuola.php\'\">\n                      <span></span>\n                      <span></span>\n                      <span></span>\n                  </div>\n              </div>\n          </nav>\n\n          <!-- Hero Section -->\n          <section class=\"hero-centered editable-image\" style=\"background-image: url(\'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80\'); background-size: cover; background-position: center;\">\n              <div class=\"hero-overlay\"></div>\n              <div class=\"hero-content-center\">\n                  <h1 class=\"hero-title-center editable-text\">Título Centrado</h1>\n                  <p class=\"hero-subtitle-center editable-text\">Descripción centrada del contenido principal</p>\n              </div>\n          </section>\n\n          <!-- Main Content -->\n          <main class=\"main-centered\">\n              <div class=\"container\">\n                  <!-- Full Width Text -->\n                  <section class=\"full-text\">\n                      <div class=\"text-container\">\n                          <h2 class=\"centered-title editable-text\">Encabezado Principal</h2>\n                          <p class=\"centered-text editable-text\">Este es un párrafo centrado con contenido principal. Aquí puedes escribir información extensa sobre el tema que deseas presentar. El diseño centrado ayuda a enfocar la atención del lector en el contenido más importante.</p>\n                      </div>\n                  </section>\n\n                  <!-- Quote Section -->\n                  <section class=\"quote-section\">\n                      <div class=\"quote-container\">\n                          <blockquote class=\"main-quote editable-text\">\"Una cita o frase destacada que resuma la esencia del contenido que estás presentando en tu página web.\"</blockquote>\n                          <cite class=\"quote-author editable-text\">- Autor de la cita</cite>\n                      </div>\n                  </section>\n\n                  <!-- Two Column Text -->\n                  <section class=\"two-columns\">\n                      <div class=\"columns-container\">\n                          <div class=\"column\">\n                              <h3 class=\"column-title editable-text\">Primera columna</h3>\n                              <p class=\"column-text editable-text\">Contenido de la primera columna. Puedes usar este espacio para desarrollar un aspecto específico del tema principal.</p>\n                          </div>\n                          <div class=\"column\">\n                              <h3 class=\"column-title editable-text\">Segunda columna</h3>\n                              <p class=\"column-text editable-text\">Contenido de la segunda columna. Este espacio es ideal para información complementaria o contrastante.</p>\n                          </div>\n                      </div>\n                  </section>\n\n                  <!-- Final Text Section -->\n                  <section class=\"final-text\">\n                      <div class=\"text-container\">\n                          <h2 class=\"centered-title editable-text\">Sección de cierre</h2>\n                          <p class=\"centered-text editable-text\">Párrafo final donde puedes resumir los puntos clave o hacer un llamado a la acción para tus lectores.</p>\n                      </div>\n                  </section>\n              </div>\n          </main>\n        \n<!-- Footer -->\n<footer class=\"footer-bottom-new\">\n    <div class=\"footer-container\">\n        <div class=\"footer-left\">\n            <div class=\"footer-logo\">\n                <img src=\"fotosPrincipales/logo2.png\" alt=\"Scuola Italiana di Montevideo\" style=\"height: 120px;\">\n            </div>\n            <div class=\"footer-subtitle\">\n                <p>AMC Scuola Italiana di Montevideo</p>\n            </div>\n        </div>\n        \n        <div class=\"footer-center\">\n            <div class=\"footer-section\">\n                <h4>Contacto</h4>\n                <p>Av. Brasil 3149, Montevideo</p>\n                <p>(+598) 2621 4822 / 2622 1422</p>\n                <p>info@scuolaitaliana.edu.uy</p>\n            </div>\n        </div>\n        \n        <div class=\"footer-right\">\n            <div class=\"footer-section\">\n                <h4>Enlaces útiles</h4>\n                <p>Política de privacidad</p>\n                <p>Requisitos técnicos</p>\n                <p>Accesibilidad</p>\n            </div>\n        </div>\n    </div>\n    \n    <div class=\"footer-info-bar\">\n        <p>Desarrollado por el equipo SGE | Proyecto de apoyo 2002 - EE Informática</p>\n    </div>\n</footer>\n  </div>', 'intercambio', '2025-10-01 12:46:42', '2025-10-01 12:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('general','clase') NOT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id_evento`, `titulo`, `fecha`, `tipo`, `id_clase`, `creado_por`, `imagen`) VALUES
(2, 'footbal', '2025-10-11', 'general', NULL, 9, '1755693142_paris-2024-olympics-soccer.jpg'),
(3, 'the flash', '2025-01-02', 'general', NULL, 9, '1755694096_aleksandra-svyripa-sWRzvuCFp8E-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `cv_path` varchar(512) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `nombre`, `email`, `celular`, `mensaje`, `cv_path`, `created_at`) VALUES
(1, 'Emiliano Acquistapace', 'emilianoacqui@gmail.com', '098680865', 'Soy un pro gamer', 'uploads/20251001_174517_sis_op_primer_entrega__1_.pdf', '2025-10-01 12:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('alumno','profesor','coordinador','admin','gestor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `rol`) VALUES
(9, 'Coordinador General', 'coordinador@scuolaitaliana.edu.uy', '$2y$10$31JSKkBqNAlchkzBwRUSK.uJBkcODYpIDOUY/MOrTBGZJhrvTdM5G', 'coordinador'),
(10, 'Marcos Méndez', 'mmendez@scuolaitaliana.edu.uy', '$2y$10$F4fFmhVnFpG7D6GniY8iJeMnWc8vy9L4V4Qj4rpTtRHAMuRTzfpHy', 'profesor'),
(16, 'Emilio', 'emilio@scuolaitaliana.edu.uy', '$2y$10$ZcQ/LGpoHO3/H8LnSHGkxeiC237HgMxYBWEFGAnom7o7I/R1CDUl2', 'alumno'),
(17, '', 'gfarias@scuolaitaliana.edu.uy', '$2y$10$pHPUdPtiz/45QFrmnONAGuwn7D9TN98ytla09DTqR.BvXGdlrUXcq', 'profesor'),
(18, 'mapache', 'mapache@scuolaitaliana.edu.uy', '$2y$10$EqMke4dZ/y1bA9F.vBIkNefWLsedodOPRQmraq.bliGmVCQb7U9k2', 'alumno'),
(19, '', 'pancho@scuolaitaliana.edu.uy', '$2y$10$wM5tdvatt2fDcbYauha1q.TMQIn1yrAzqUe3DMllQo5ugzRO3d6..', 'alumno');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_clases`
--

CREATE TABLE `usuarios_clases` (
  `id_usuario` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `rol_en_clase` enum('profesor','alumno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios_clases`
--

INSERT INTO `usuarios_clases` (`id_usuario`, `id_clase`, `rol_en_clase`) VALUES
(10, 10, 'profesor'),
(16, 13, 'alumno'),
(16, 15, 'alumno'),
(17, 15, 'profesor'),
(19, 15, 'alumno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`),
  ADD KEY `idx_calendario_clase_fecha` (`id_clase`,`fecha`);

--
-- Indexes for table `calendarios`
--
ALTER TABLE `calendarios`
  ADD PRIMARY KEY (`id_calendario`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `creado_por` (`creado_por`);

--
-- Indexes for table `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clase`),
  ADD UNIQUE KEY `uniq_clase_nombre_anio` (`nombre`,`año`);


--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `creado_por` (`creado_por`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuarios_clases`
--
ALTER TABLE `usuarios_clases`
  ADD PRIMARY KEY (`id_usuario`,`id_clase`),
  ADD UNIQUE KEY `uniq_usuario_clase` (`id_usuario`,`id_clase`),
  ADD KEY `id_clase` (`id_clase`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calendarios`
--
ALTER TABLE `calendarios`
  MODIFY `id_calendario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `calendario_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `calendario_ibfk_2` FOREIGN KEY (`creado_por`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `calendarios`
--
ALTER TABLE `calendarios`
  ADD CONSTRAINT `calendarios_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`) ON DELETE CASCADE,
  ADD CONSTRAINT `calendarios_ibfk_2` FOREIGN KEY (`creado_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`) ON DELETE SET NULL,
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`creado_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Constraints for table `usuarios_clases`
--
ALTER TABLE `usuarios_clases`
  ADD CONSTRAINT `usuarios_clases_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_clases_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
