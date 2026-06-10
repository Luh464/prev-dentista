<?php
// BASE_URL e sessão já estão disponíveis via Front Controller (public/index.php)
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prev Dentistas | Seu Sorriso, Nossa Prioridade</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* --- VARIÁVEIS E RESET --- */
        :root {
            --primary-color: #005b96; 
            --primary-light: #0370b5;
            --secondary-color: #00b894; 
            --accent-color: #fab1a0; 
            --text-dark: #2d3436;
            --text-light: #636e72;
            --white: #ffffff;
            --bg-light: #f4f7f6;
            --shadow: 0 10px 30px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--text-dark);
            background-color: var(--white);
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        a { text-decoration: none; color: inherit; transition: var(--transition); }
        ul { list-style: none; }
        img { max-width: 100%; display: block; }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            cursor: pointer;
            border: none;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }
        .btn-primary:hover {
            background-color: var(--primary-light);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,91,150,0.3);
        }

        .btn-success {
            background-color: var(--secondary-color);
            color: var(--white);
        }
        .btn-success:hover {
            background-color: #019e7f;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,184,148,0.4);
        }

        .section-padding { padding: 80px 0; }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
            width: 100%;
        }
        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--secondary-color);
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* =====================================================
           NAVBAR REDESENHADA
           Logo à esquerda | Links centralizados | Botão à direita
        ===================================================== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            padding: 0;
            transition: var(--transition);
        }

        .nav-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            position: relative;
        }

        /* Logo — esquerda */
        .logo a {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Poppins', sans-serif;
            white-space: nowrap;
        }

        /* Links — centro absoluto */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 36px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-links a {
            font-weight: 600;
            font-size: 0.95rem;
            color: #4a5568;
            position: relative;
            white-space: nowrap;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--secondary-color);
            transition: var(--transition);
        }

        .nav-links a:hover { color: var(--primary-color); }
        .nav-links a:hover::after { width: 100%; }

        /* Botão Entrar — direita */
        .btn-entrar {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-color);
            color: #fff !important;
            border: none;
            border-radius: 50px;
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: 'Open Sans', sans-serif;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 14px rgba(0,91,150,0.25);
            white-space: nowrap;
            flex-shrink: 0;
        }

        .btn-entrar:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0,184,148,0.35);
        }

        /* Mobile toggle */
        .mobile-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        /* =====================================================
           HERO SLIDER — mantido idêntico ao original
        ===================================================== */
        .hero-slider {
            position: relative;
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
            background: #000;
        }

        .slide {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .slide.active { opacity: 1; }

        .slide::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to right, rgba(0,91,150,0.82), rgba(0,0,0,0.28));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 600px;
            color: var(--white);
            margin-left: 10%;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            line-height: 1.2;
            color: var(--white);
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.8s forwards 0.5s;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.8s forwards 0.7s;
        }

        .hero-features {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
            opacity: 0;
            animation: slideIn 0.8s forwards 0.9s;
        }

        .hero-tag {
            background: rgba(255,255,255,0.18);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .hero-btn-group {
            opacity: 0;
            animation: fadeIn 1s forwards 1.2s;
        }

        @keyframes slideUp { to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeIn  { to { opacity: 1; } }

        /* =====================================================
           SEÇÕES — mantidas idênticas ao original
        ===================================================== */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .team-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            padding-bottom: 20px;
            border: 1px solid #eee;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,91,150,0.15);
        }

        .img-wrapper { height: 250px; overflow: hidden; margin-bottom: 20px; }
        .img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .team-card:hover .img-wrapper img { transform: scale(1.1); }
        .team-card h3 { font-size: 1.3rem; margin-bottom: 5px; }
        .team-card p { color: var(--text-light); padding: 0 15px; font-size: 0.9rem; }

        .role-tag {
            background: var(--bg-light);
            color: var(--primary-color);
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }

        .location-section { background-color: var(--bg-light); }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .contact-info-box {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .info-item { display: flex; align-items: flex-start; gap: 15px; margin-bottom: 20px; }
        .info-item i { color: var(--secondary-color); font-size: 1.2rem; margin-top: 5px; }

        .map-frame { border-radius: 20px; overflow: hidden; box-shadow: var(--shadow); height: 400px; }

        footer {
            background: var(--primary-color);
            color: var(--white);
            text-align: center;
            padding: 30px 0;
            font-size: 0.9rem;
        }

        .fab-whatsapp {
            position: fixed;
            bottom: 30px; right: 30px;
            background-color: #25D366;
            color: white;
            width: 60px; height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 0 4px 15px rgba(37,211,102,0.4);
            z-index: 2000;
            transition: var(--transition);
            animation: pulse 2s infinite;
        }

        .fab-whatsapp:hover { transform: scale(1.1); background-color: #1ebc57; }

        @keyframes pulse {
            0%   { box-shadow: 0 0 0 0 rgba(37,211,102,0.7); }
            70%  { box-shadow: 0 0 0 15px rgba(37,211,102,0); }
            100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
        }

        /* =====================================================
           MODAL DE LOGIN
        ===================================================== */
        .modal-login-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(10, 25, 50, 0.58);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .modal-login-overlay.open {
            display: flex;
        }

        .modal-login-box {
            background: #fff;
            border-radius: 22px;
            padding: 42px 38px 38px;
            width: 100%;
            max-width: 390px;
            position: relative;
            box-shadow: 0 24px 70px rgba(0,0,0,0.22);
            animation: modalEntrar 0.28s ease;
        }

        @keyframes modalEntrar {
            from { opacity: 0; transform: translateY(18px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modal-login-fechar {
            position: absolute;
            top: 16px; right: 18px;
            background: none;
            border: none;
            font-size: 22px;
            color: #9ca3af;
            cursor: pointer;
            line-height: 1;
            transition: color 0.15s;
            padding: 4px;
        }

        .modal-login-fechar:hover { color: #374151; }

        .modal-login-icone {
            width: 58px; height: 58px;
            background: #eef4fb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
            color: var(--primary-color);
        }

        .modal-login-box h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
            letter-spacing: -0.3px;
            font-family: 'Poppins', sans-serif;
        }

        .modal-login-sub {
            text-align: center;
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 26px;
            line-height: 1.5;
        }

        .modal-campo { margin-bottom: 16px; }

        .modal-campo label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.82rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
        }

        .modal-campo label a {
            font-size: 0.78rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.15s;
        }

        .modal-campo label a:hover { color: var(--secondary-color); }

        .modal-input-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f9fafb;
            border: 1.5px solid #e5e7eb;
            border-radius: 11px;
            padding: 11px 14px;
            transition: border-color 0.2s, background 0.2s;
        }

        .modal-input-wrap:focus-within {
            border-color: var(--primary-color);
            background: #fff;
        }

        .modal-input-wrap i { font-size: 15px; color: #9ca3af; width: 16px; text-align: center; }

        .modal-input-wrap input {
            flex: 1;
            border: none;
            background: none;
            font-size: 0.9rem;
            color: #111827;
            outline: none;
            font-family: 'Open Sans', sans-serif;
        }

        .modal-input-wrap input::placeholder { color: #9ca3af; }

        .modal-lembrar {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 16px 0 22px;
            cursor: pointer;
        }

        .modal-lembrar input {
            accent-color: var(--primary-color);
            width: 15px; height: 15px;
            cursor: pointer;
        }

        .modal-lembrar span { font-size: 0.83rem; color: #6b7280; }

        .modal-btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--primary-color);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.2px;
            transition: background 0.2s, transform 0.15s;
        }

        .modal-btn-submit:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
        }

        /* =====================================================
           NOTIFICAÇÃO DE ERRO DE LOGIN
        ===================================================== */
        .login-erro {
            position: fixed;
            top: 82px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10000;
            background: #e74c3c;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: fadeIn 0.3s ease;
        }

        /* =====================================================
           RESPONSIVO
        ===================================================== */
        @media (max-width: 992px) {
            .contact-grid { grid-template-columns: 1fr; }
            .hero-content h1 { font-size: 2.5rem; }
        }

        @media (max-width: 768px) {
            .mobile-toggle { display: block; }

            .nav-links {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background: #fff;
                flex-direction: column;
                align-items: stretch;
                padding: 16px 0;
                border-bottom: 1px solid #e2e8f0;
                box-shadow: 0 4px 16px rgba(0,0,0,0.08);
                transform: none;
                gap: 0;
            }

            .nav-links.active { display: flex; }

            .nav-links a {
                padding: 12px 24px;
                border-bottom: 1px solid #f1f5f9;
            }

            .nav-links a::after { display: none; }

            .hero-content { margin-left: 20px; margin-right: 20px; }
            .section-title { font-size: 2rem; }

            .modal-login-box { margin: 20px; padding: 32px 24px 28px; }
        }
    </style>
</head>
<body>

    <!-- ====================================================
         HEADER / NAVBAR
    ==================================================== -->
    <header id="site-header">
        <div class="container nav-flex">

            <!-- Logo — esquerda -->
            <div class="logo">
                <a href="#inicio">
                    <i class="fas fa-tooth"></i> Prev Dentistas
                </a>
            </div>

            <!-- Toggle mobile -->
            <div class="mobile-toggle" id="mobile-toggle">
                <i class="fas fa-bars"></i>
            </div>

            <!-- Links — centro -->
            <nav class="nav-links" id="nav-links">
                <a href="#inicio">Início</a>
                <a href="#especialistas">Especialistas</a>
                <a href="#localizacao">Localização</a>
            </nav>

            <!-- Botão Entrar — direita -->
            <button class="btn-entrar" id="btn-abrir-modal">
                <i class="fas fa-sign-in-alt"></i> Entrar
            </button>

        </div>
    </header>

    <!-- ====================================================
         NOTIFICAÇÃO DE ERRO (se login falhou)
    ==================================================== -->
    <?php if (isset($_GET['erro'])): ?>
        <div class="login-erro">
            <i class="fas fa-exclamation-circle"></i> Usuário ou senha inválidos.
        </div>
    <?php endif; ?>

    <!-- ====================================================
         HERO SLIDER
    ==================================================== -->
    <section id="inicio" class="hero-slider">
        <div class="slide active" style="background-image: url('<?= BASE_URL ?>assets/img/dentista-5.jpeg');"></div>
        <div class="slide" style="background-image: url('<?= BASE_URL ?>assets/img/cadeira.jpeg');"></div>
        <div class="slide" style="background-image: url('<?= BASE_URL ?>assets/img/card1.jpg'); background-position: center;"></div>

        <div class="container hero-content">
            <div class="hero-text-wrap">
                <h1>Transforme seu sorriso<br>com especialistas!</h1>
                <p>Na <strong>Prev Dentistas</strong>, unimos tecnologia de ponta e atendimento humanizado para devolver sua confiança.</p>

                <div class="hero-features">
                    <span class="hero-tag"><i class="fas fa-check-circle"></i> Estrutura Moderna</span>
                    <span class="hero-tag"><i class="fas fa-wifi"></i> Espaço VIP</span>
                    <span class="hero-tag"><i class="far fa-credit-card"></i> Até 10x sem juros</span>
                </div>

                <div class="hero-btn-group">
                    <a href="https://wa.me/5591983067459" target="_blank" class="btn btn-success">
                        <i class="fab fa-whatsapp"></i> Agendar Consulta
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================================================
         ESPECIALISTAS
    ==================================================== -->
    <section id="especialistas" class="section-padding">
        <div class="container">
            <h2 class="section-title">Corpo Clínico</h2>
            <p style="text-align: center; color: var(--text-light); max-width: 600px; margin: 0 auto;">
                Nossa equipe é formada por especialistas dedicados a proporcionar o melhor tratamento para você e sua família.
            </p>

            <div class="team-grid">
                <div class="team-card">
                    <div class="img-wrapper">
                        <img src="<?= BASE_URL ?>assets/img/dentista-8.jpg" alt="Dra. Luciana Farias">
                    </div>
                    <span class="role-tag">Ortodontia</span>
                    <h3>Dra. Luciana Farias</h3>
                    <p>Especialista em criar sorrisos alinhados e saúde bucal integral. Cuidado e precisão em cada detalhe.</p>
                </div>

                <div class="team-card">
                    <div class="img-wrapper">
                        <img src="<?= BASE_URL ?>assets/img/dentista-2.jpeg" alt="Dra. Vitória Lobato">
                    </div>
                    <span class="role-tag">Saúde Coletiva</span>
                    <h3>Dra. Vitória Lobato</h3>
                    <p>Experiência e humanização no tratamento de pacientes de todas as idades.</p>
                </div>

                <div class="team-card">
                    <div class="img-wrapper">
                        <img src="<?= BASE_URL ?>assets/img/dentista-7.jpeg" alt="Dra. Ana Lopes">
                    </div>
                    <span class="role-tag">Especialização em endodontia</span>
                    <h3>Dra. Ana Lopes</h3>
                    <p>Excelência no tratamento de canal e recuperação da saúde dental, preservando a vitalidade e função dos seus dentes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================================================
         LOCALIZAÇÃO
    ==================================================== -->
    <section id="localizacao" class="section-padding location-section">
        <div class="container">
            <h2 class="section-title">Onde Estamos</h2>

            <div class="contact-grid">
                <div class="contact-info-box">
                    <h3>Visite a Clínica</h3>
                    <p style="margin-bottom: 20px; color: var(--text-light);">Localização privilegiada em Ananindeua com estacionamento fácil.</p>

                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Endereço:</strong><br>
                            Rua União 1, Esquina com Rua D<br>
                            Atalaia, Ananindeua - PA, 67013-350
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <strong>Telefone / WhatsApp:</strong><br>
                            (91) 98306-7459
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="far fa-clock"></i>
                        <div>
                            <strong>Horário de Atendimento:</strong><br>
                            Seg - Sex: 08h às 12h e 15h às 18h<br>
                            Sábado: 08h às 12h
                        </div>
                    </div>

                    <a href="https://www.google.com/maps/dir/?api=1&destination=Prev+Dentistas+Ananindeua"
                       target="_blank" class="btn btn-primary"
                       style="margin-top: 20px; width: 100%; text-align: center;">
                        <i class="fas fa-directions"></i> Ver no Google Maps
                    </a>
                </div>

                <div class="map-frame">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.645365860427!2d-48.42899942535724!3d-1.3893519985975165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92a48b002f32a7cf%3A0x353ede76a35e88fa!2sPrev%20Dentistas!5e0!3m2!1sen!2sbr!4v1771775822488!5m2!1sen!2sbr"
                        width="600" height="450"
                        style="border:0; width:100%; height:100%;"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================================================
         FOOTER
    ==================================================== -->
    <footer>
        <div class="container">
            <p>© <?= date('Y') ?> Prev Dentistas. Feito com <i class="fas fa-heart" style="color: #fab1a0;"></i> para o seu sorriso.</p>
            <div style="margin-top: 10px; font-size: 0.8rem; opacity: 0.7;">
                Responsável Técnico: Dra. Luciana Farias
            </div>
        </div>
    </footer>

    <!-- WhatsApp flutuante -->
    <a href="https://wa.me/5591983067459" class="fab-whatsapp" target="_blank" title="Fale conosco no WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- ====================================================
         MODAL DE LOGIN
    ==================================================== -->
    <div class="modal-login-overlay" id="modal-login">
        <div class="modal-login-box">

            <button class="modal-login-fechar" id="btn-fechar-modal" aria-label="Fechar">
                <i class="fas fa-times"></i>
            </button>

            <!-- TELA 1: LOGIN -->
            <div id="tela-login">
                <div class="modal-login-icone">
                    <i class="fas fa-shield-alt"></i>
                </div>

                <h2>Acesso ao Sistema</h2>
                <p class="modal-login-sub">Insira suas credenciais para entrar na plataforma</p>

                <form method="POST" action="<?= BASE_URL ?>?rota=login">

                    <div class="modal-campo">
                        <label for="ml-usuario">Usuário</label>
                        <div class="modal-input-wrap">
                            <i class="fas fa-user"></i>
                            <input
                                type="text"
                                id="ml-usuario"
                                name="login"
                                placeholder="Digite seu usuário"
                                required
                                autocomplete="username"
                            >
                        </div>
                    </div>

                    <div class="modal-campo">
                        <label for="ml-senha">
                            Senha
                            <a href="javascript:void(0)" id="link-esqueci">Esqueceu a senha?</a>
                        </label>
                        <div class="modal-input-wrap">
                            <i class="fas fa-lock"></i>
                            <input
                                type="password"
                                id="ml-senha"
                                name="senha"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password"
                            >
                        </div>
                    </div>

                    <label class="modal-lembrar">
                        <input type="checkbox" name="lembrar" value="1">
                        <span>Manter conectado neste dispositivo</span>
                    </label>

                    <button type="submit" class="modal-btn-submit">
                        <i class="fas fa-sign-in-alt"></i> Entrar no Sistema
                    </button>

                </form>
            </div>

            <!-- TELA 2: RECUPERAR SENHA -->
            <div id="tela-recuperar" style="display:none;">
                <div class="modal-login-icone" style="background:#fff4e5; color:#e67e22;">
                    <i class="fas fa-key"></i>
                </div>

                <h2>Recuperar Senha</h2>
                <p class="modal-login-sub">Não se preocupe! Entre em contato com o administrador do sistema para redefinir sua senha.</p>

                <div style="background:#f0f7ff; border:1px solid #bee3f8; border-radius:12px; padding:16px; margin-bottom:20px;">
                    <div style="display:flex; align-items:flex-start; gap:10px;">
                        <i class="fas fa-info-circle" style="color:#005b96; margin-top:3px; flex-shrink:0;"></i>
                        <div style="font-size:0.85rem; color:#374151; line-height:1.6;">
                            O administrador poderá redefinir sua senha pelo painel de <strong>Gestão de Usuários</strong>. Basta entrar em contato.
                        </div>
                    </div>
                </div>

                <a href="https://wa.me/5591983067459?text=Olá,%20preciso%20redefinir%20minha%20senha%20do%20sistema%20Prev%20Dentistas."
                   target="_blank"
                   class="modal-btn-submit"
                   style="display:flex; align-items:center; justify-content:center; gap:8px; text-decoration:none; background:#25d366; margin-bottom:12px;">
                    <i class="fab fa-whatsapp"></i> Falar com o Administrador
                </a>

                <button id="btn-voltar-login"
                    style="width:100%; padding:11px; background:transparent; border:1.5px solid #e2e8f0; border-radius:12px; font-size:0.9rem; font-weight:600; color:#64748b; cursor:pointer; font-family:inherit; transition:all 0.2s;">
                    <i class="fas fa-arrow-left"></i> Voltar ao Login
                </button>
            </div>

        </div>
    </div>

    <!-- ====================================================
         SCRIPTS
    ==================================================== -->
    <script>
        // ── Mobile menu ──────────────────────────────────
        const mobileToggle = document.getElementById('mobile-toggle');
        const navLinks      = document.getElementById('nav-links');
        const toggleIcon    = mobileToggle.querySelector('i');

        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            toggleIcon.classList.toggle('fa-bars');
            toggleIcon.classList.toggle('fa-times');
        });

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                toggleIcon.classList.add('fa-bars');
                toggleIcon.classList.remove('fa-times');
            });
        });

        // ── Modal de login ───────────────────────────────
        const overlay      = document.getElementById('modal-login');
        const btnAbrir     = document.getElementById('btn-abrir-modal');
        const btnFechar    = document.getElementById('btn-fechar-modal');
        const telaLogin    = document.getElementById('tela-login');
        const telaRecuperar = document.getElementById('tela-recuperar');
        const linkEsqueci  = document.getElementById('link-esqueci');
        const btnVoltar    = document.getElementById('btn-voltar-login');

        btnAbrir.addEventListener('click', () => {
            telaLogin.style.display    = 'block';
            telaRecuperar.style.display = 'none';
            overlay.classList.add('open');
        });

        btnFechar.addEventListener('click', () => overlay.classList.remove('open'));

        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) overlay.classList.remove('open');
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') overlay.classList.remove('open');
        });

        // Alterna para tela de recuperação
        linkEsqueci.addEventListener('click', () => {
            telaLogin.style.display     = 'none';
            telaRecuperar.style.display = 'block';
        });

        // Volta para tela de login
        btnVoltar.addEventListener('click', () => {
            telaRecuperar.style.display = 'none';
            telaLogin.style.display     = 'block';
        });

        // Abre o modal automaticamente se houve erro de login
        <?php if (isset($_GET['erro'])): ?>
            window.addEventListener('DOMContentLoaded', () => {
                overlay.classList.add('open');
            });
        <?php endif; ?>

        // ── Hero Slider ──────────────────────────────────
        let currentSlide = 0;
        const slides     = document.querySelectorAll('.slide');

        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        setInterval(nextSlide, 5000);

        // ── Header compacto ao rolar ──────────────────────
        window.addEventListener('scroll', () => {
            const header = document.getElementById('site-header');
            if (window.scrollY > 50) {
                header.style.boxShadow = '0 5px 20px rgba(0,0,0,0.1)';
                header.style.padding   = '0';
            } else {
                header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.05)';
                header.style.padding   = '0';
            }
        });
    </script>

</body>
</html>