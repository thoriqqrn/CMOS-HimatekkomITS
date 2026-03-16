<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi HIMATEKKOM ITS 2026 | Kabinet Sentra Sinergi</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/images/logokabinet.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --purple-deep: #4A148C;
            --purple: #6A1B9A;
            --purple-light: #9C27B0;
            --purple-glow: #BA68C8;
            --gold: #FFD700;
            --gold-dark: #F5B041;
            --gold-light: #FFEB3B;
            --orange: #FF9800;

            --gradient-main: linear-gradient(135deg, #4A148C 0%, #6A1B9A 30%, #FFD700 70%, #F5B041 100%);
            --gradient-purple: linear-gradient(135deg, #4A148C 0%, #9C27B0 100%);
            --gradient-gold: linear-gradient(135deg, #FFD700 0%, #F5B041 100%);
            --gradient-mixed: linear-gradient(135deg, #6A1B9A 0%, #FFD700 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #0A0A14;
            color: #fff;
            overflow-x: hidden;
        }

        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 0.75rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10, 10, 20, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            text-decoration: none;
            color: #fff;
        }

        .navbar-brand img { height: 50px; }

        .navbar-brand .brand-wrap {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .navbar-brand .brand-main {
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .navbar-brand .brand-sub {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.75);
            font-weight: 500;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .nav-links a:hover {
            color: var(--gold);
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
        }

        .btn-login {
            background: var(--gradient-gold);
            color: var(--purple-deep) !important;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(255, 215, 0, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 215, 0, 0.5);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 6rem 2rem 4rem;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at top left, rgba(74, 20, 140, 0.6) 0%, transparent 50%),
                radial-gradient(ellipse at bottom right, rgba(255, 215, 0, 0.3) 0%, transparent 50%),
                radial-gradient(ellipse at center, rgba(106, 27, 154, 0.2) 0%, transparent 60%);
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .shape-1 {
            top: 10%; left: 5%;
            width: 200px; height: 200px;
            background: var(--gradient-purple);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation-delay: 0s;
        }

        .shape-2 {
            top: 60%; right: 5%;
            width: 150px; height: 150px;
            background: var(--gradient-gold);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation-delay: 2s;
        }

        .shape-3 {
            bottom: 10%; left: 20%;
            width: 100px; height: 100px;
            background: var(--gradient-mixed);
            border-radius: 50%;
            animation-delay: 4s;
        }

        .shape-4 {
            top: 30%; right: 15%;
            width: 80px; height: 80px;
            border: 3px solid var(--gold);
            border-radius: 50%;
            animation-delay: 1s;
        }

        .puzzle {
            position: absolute;
            opacity: 0.08;
            font-size: 80px;
            animation: floatRotate 10s ease-in-out infinite;
        }

        .puzzle-1 { top: 15%; left: 8%; color: var(--purple-light); animation-delay: 0s; }
        .puzzle-2 { top: 25%; right: 12%; color: var(--gold); font-size: 50px; animation-delay: 2s; }
        .puzzle-3 { bottom: 30%; left: 5%; color: var(--gold-dark); font-size: 60px; animation-delay: 4s; }
        .puzzle-4 { bottom: 15%; right: 8%; color: var(--purple-glow); font-size: 40px; animation-delay: 1s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.05); }
        }

        @keyframes floatRotate {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(15deg); }
        }

        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.2) 0%, rgba(74, 20, 140, 0.2) 100%);
            border: 1px solid rgba(255, 215, 0, 0.4);
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            color: var(--gold);
            font-weight: 600;
        }

        .hero-title {
            font-size: clamp(2.2rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.3rem;
        }

        .hero-title .line1 {
            display: block;
            color: #fff;
            font-size: 0.52em;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.9;
        }

        .hero-title .highlight {
            display: block;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            min-height: 1.25em;
        }
        
        #typingText {
        display: inline-block;
        position: relative;
        vertical-align: baseline;
        white-space: nowrap;
        }
    
        #typingText::after {
            content: '|';
            display: inline-block;
            margin-left: 6px;
            color: var(--gold);
            animation: blink 0.8s infinite;
            transform: translateY(-2px);
        }
    
        @keyframes blink {
            0%, 49% { opacity: 1; }
            50%, 100% { opacity: 0; }
        }

        
        /*.typing-cursor {*/
        /*    display: inline-block;*/
        /*    margin-left: 3px;*/
        /*    color: var(--gold);*/
        /*    animation: blink 0.8s infinite;*/
        /*}*/

        /*@keyframes blink {*/
        /*    0%, 49% { opacity: 1; }*/
        /*    50%, 100% { opacity: 0; }*/
        /*}*/

        .hero-subtitle {
            font-size: 1.08rem;
            color: rgba(255,255,255,0.8);
            margin-bottom: 2rem;
            line-height: 1.9;
            max-width: 620px;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--gradient-gold);
            color: var(--purple-deep);
            padding: 16px 36px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 25px rgba(255, 215, 0, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 40px rgba(255, 215, 0, 0.6);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--gold);
            color: var(--gold);
            padding: 14px 34px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .btn-outline:hover {
            background: rgba(255, 215, 0, 0.1);
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.2);
        }

        .hero-photo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .candidate-card {
            position: relative;
            background: linear-gradient(145deg, rgba(74, 20, 140, 0.4) 0%, rgba(255, 215, 0, 0.1) 100%);
            border: 2px solid rgba(255, 215, 0, 0.3);
            border-radius: 30px;
            padding: 2rem;
            text-align: center;
            backdrop-filter: blur(15px);
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.5),
                inset 0 0 60px rgba(255, 215, 0, 0.05);
        }

        .candidate-card::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px; right: -2px; bottom: -2px;
            background: var(--gradient-main);
            border-radius: 32px;
            z-index: -1;
            opacity: 0.5;
            filter: blur(20px);
        }

        .candidate-photo {
            width: 280px;
            height: 320px;
            border-radius: 20px;
            background: var(--gradient-purple);
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 6rem;
            overflow: hidden;
            border: 4px solid var(--gold);
            box-shadow: 0 10px 40px rgba(255, 215, 0, 0.3);
        }

        .candidate-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .candidate-name {
            font-size: 1.4rem;
            font-weight: 800;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .candidate-title {
            color: rgba(255,255,255,0.86);
            font-size: 0.97rem;
            font-weight: 500;
            line-height: 1.6;
        }

        section { padding: 6rem 2rem; }

        .section-header { text-align: center; margin-bottom: 4rem; }

        .section-badge {
            display: inline-block;
            background: var(--gradient-gold);
            color: var(--purple-deep);
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .section-title .highlight {
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-desc {
            color: rgba(255,255,255,0.6);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .visi-misi {
            background: linear-gradient(180deg, #0A0A14 0%, #12121F 50%, #0A0A14 100%);
            position: relative;
        }

        .visi-card {
            background: linear-gradient(145deg, rgba(74, 20, 140, 0.3) 0%, rgba(255, 215, 0, 0.1) 100%);
            border: 1px solid rgba(255, 215, 0, 0.3);
            border-radius: 30px;
            padding: 3rem;
            max-width: 900px;
            margin: 0 auto 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .visi-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: var(--gradient-gold);
        }

        .visi-card h3 {
            font-size: 1.75rem;
            margin-bottom: 1.25rem;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .visi-card p {
            color: rgba(255,255,255,0.85);
            line-height: 1.9;
            font-size: 1.1rem;
        }

        .misi-title {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.75rem;
            color: var(--gold);
        }

        .misi-grid {
            max-width: 1000px;
            margin: 0 auto;
        }

        .misi-item {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            align-items: flex-start;
            background: linear-gradient(135deg, rgba(74, 20, 140, 0.2) 0%, rgba(255, 215, 0, 0.05) 100%);
            padding: 1.75rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 215, 0, 0.15);
            transition: all 0.3s;
        }

        .misi-item:hover {
            border-color: var(--gold);
            transform: translateX(10px);
            box-shadow: 0 10px 40px rgba(255, 215, 0, 0.1);
        }

        .misi-number {
            width: 55px;
            height: 55px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--purple-deep);
            flex-shrink: 0;
            box-shadow: 0 5px 20px rgba(255, 215, 0, 0.3);
        }

        .misi-item p {
            color: rgba(255,255,255,0.85);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .programs { background: #0A0A14; }

        .program-category { margin-bottom: 5rem; }

        .category-header {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            margin-bottom: 2rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(255, 215, 0, 0.2);
        }

        .category-icon {
            width: 65px;
            height: 65px;
            background: var(--gradient-purple);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: var(--gold);
            box-shadow: 0 10px 30px rgba(74, 20, 140, 0.4);
        }

        .category-title { font-size: 1.6rem; font-weight: 700; color: var(--gold); }

        .category-desc { color: rgba(255,255,255,0.6); font-size: 0.95rem; }

        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .program-card {
            background: linear-gradient(145deg, rgba(74, 20, 140, 0.15) 0%, rgba(10, 10, 20, 0.8) 100%);
            border: 1px solid rgba(255, 215, 0, 0.15);
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .program-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: var(--gradient-gold);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .program-card:hover::before { transform: scaleX(1); }

        .program-card:hover {
            border-color: var(--gold);
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(255, 215, 0, 0.15);
        }

        .program-card h4 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--gold);
            font-weight: 700;
        }

        .program-card .dept-tag {
            font-size: 0.75rem;
            color: var(--purple-glow);
            margin-bottom: 1rem;
            display: inline-block;
            background: rgba(156, 39, 176, 0.2);
            padding: 4px 12px;
            border-radius: 20px;
        }

        .program-card p {
            color: rgba(255,255,255,0.7);
            font-size: 0.95rem;
            line-height: 1.8;
        }

        .cmos {
            background: linear-gradient(180deg, #12121F 0%, #0A0A14 100%);
            position: relative;
            overflow: hidden;
        }

        .cmos::before {
            content: '';
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            width: 800px; height: 800px;
            background: radial-gradient(circle, rgba(74, 20, 140, 0.2) 0%, transparent 70%);
        }

        .cmos-container {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .cmos-content h3 {
            font-size: 2.25rem;
            margin-bottom: 1.25rem;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .cmos-content > p {
            color: rgba(255,255,255,0.75);
            line-height: 1.9;
            margin-bottom: 2rem;
            font-size: 1.05rem;
        }

        .cmos-features {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .cmos-feature {
            display: flex;
            align-items: center;
            gap: 14px;
            color: rgba(255,255,255,0.9);
            font-size: 1rem;
        }

        .cmos-feature i { color: var(--gold); font-size: 1.3rem; }

        .cmos-visual {
            background: var(--gradient-purple);
            border-radius: 30px;
            padding: 3rem;
            text-align: center;
            border: 2px solid rgba(255, 215, 0, 0.3);
            box-shadow: 0 30px 60px rgba(74, 20, 140, 0.4);
        }

        .cmos-visual i {
            font-size: 5rem;
            margin-bottom: 1.25rem;
            color: var(--gold);
        }

        .cmos-visual h4 {
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            color: var(--gold);
        }

        .cmos-visual p {
            color: rgba(255,255,255,0.7);
            font-size: 1rem;
        }

        footer {
            background: #050508;
            padding: 4rem 2rem 2rem;
            border-top: 2px solid rgba(255, 215, 0, 0.2);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-brand h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-brand p {
            color: rgba(255,255,255,0.6);
            line-height: 1.8;
        }

        .footer-links h4 { margin-bottom: 1.5rem; color: var(--gold); font-weight: 700; }

        .footer-links a {
            display: block;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            margin-bottom: 0.75rem;
            transition: all 0.3s;
        }

        .footer-links a:hover { color: var(--gold); padding-left: 5px; }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            width: 45px; height: 45px;
            background: rgba(255, 215, 0, 0.1);
            border: 1px solid rgba(255, 215, 0, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--gradient-gold);
            color: var(--purple-deep);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.3);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 215, 0, 0.1);
            color: rgba(255,255,255,0.4);
            font-size: 0.9rem;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--gold);
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .hero-container, .cmos-container { grid-template-columns: 1fr; text-align: center; }
            .hero-subtitle { margin-left: auto; margin-right: auto; }
            .hero-buttons { justify-content: center; }
        }

        @media (max-width: 768px) {
            .navbar { padding: 0.75rem 1rem; }
            .navbar-brand img { height: 40px; }

            .navbar-brand .brand-sub { display: none; }

            .nav-links {
                display: none;
                position: absolute;
                top: 100%; left: 0; right: 0;
                background: rgba(10, 10, 20, 0.98);
                flex-direction: column;
                padding: 2rem;
                gap: 1.5rem;
                border-bottom: 2px solid rgba(255, 215, 0, 0.2);
            }

            .nav-links.active { display: flex; }
            .mobile-menu-btn { display: block; }

            .hero { padding: 5rem 1rem 3rem; }
            .candidate-photo { width: 220px; height: 260px; }
            .shape, .puzzle { opacity: 0.05; }
            section { padding: 4rem 1rem; }
            .program-grid { grid-template-columns: 1fr; }
            .misi-item { flex-direction: column; text-align: center; }
            .misi-number { margin: 0 auto; }
            .category-header { flex-direction: column; text-align: center; }
            .footer-content { text-align: center; }
            .social-links { justify-content: center; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="navbar-brand">
            <img src="/images/logokabinet.png" alt="Logo HIMATEKKOM ITS 2026">
            <div class="brand-wrap">
                <span class="brand-main">HIMATEKKOM ITS 2026</span>
                <span class="brand-sub">Kabinet Sentra Sinergi</span>
            </div>
        </a>
        <button class="mobile-menu-btn" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </button>
        <div class="nav-links" id="navLinks">
            <a href="#experience">Informasi</a>
            <a href="#visi-misi">Profil Organisasi</a>
            <a href="#programs">Program Kerja</a>
            <a href="#cmos">CMOS</a>
            <a href="<?php echo e(route('login')); ?>" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-bg"></div>

        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <i class="fas fa-puzzle-piece puzzle puzzle-1"></i>
        <i class="fas fa-puzzle-piece puzzle puzzle-2"></i>
        <i class="fas fa-puzzle-piece puzzle puzzle-3"></i>
        <i class="fas fa-puzzle-piece puzzle puzzle-4"></i>

        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-circle-check"></i> Website Resmi HIMATEKKOM ITS 2026
                </div>
                <h1 class="hero-title">
                    <span class="line1">Kabinet</span>
                    <span class="highlight" id="typingText"></span>
                </h1>
                <p class="hero-subtitle">
                    Selamat datang di pusat informasi <strong>HIMATEKKOM ITS 2026</strong>. Website ini dikembangkan untuk mendukung transparansi, dokumentasi, dan kolaborasi seluruh elemen organisasi melalui semangat <strong>Kabinet Sentra Sinergi</strong>.
                </p>
                <div class="hero-buttons">
                    <a href="#experience" class="btn-primary">
                        <i class="fas fa-newspaper"></i> Lihat Informasi
                    </a>
                    <a href="#visi-misi" class="btn-outline">
                        <i class="fas fa-compass"></i> Profil HIMATEKKOM
                    </a>
                </div>
            </div>

            <div class="hero-photo">
                <div class="candidate-card">
                    <div class="candidate-photo">
                        <img src="/images/himatekkom.jpg" alt="Logo Kabinet Sentra Sinergi">
                    </div>
                    <h2 class="candidate-name">HIMATEKKOM ITS 2026</h2>
                    <p class="candidate-title">Kabinet Sentra Sinergi — Optimalisasi, Kolaborasi, dan Ekspansi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil Organisasi -->
    <section class="visi-misi" id="visi-misi">
        <div class="section-header">
            <div class="section-badge">Profil Organisasi</div>
            <h2 class="section-title">Tentang <span class="highlight">HIMATEKKOM ITS 2026</span></h2>
        </div>

        <div class="visi-card">
            <h3><i class="fas fa-eye"></i> VISI ORGANISASI</h3>
            <p>
                Menjadikan HIMATEKKOM ITS sebagai himpunan yang progresif, inklusif, dan berdampak, dengan tata kelola organisasi yang profesional serta budaya kolaborasi yang kuat dalam semangat Kabinet Sentra Sinergi.
            </p>
        </div>

        <h3 class="misi-title"><i class="fas fa-bullseye"></i> MISI STRATEGIS</h3>

        <div class="misi-grid">
            <div class="misi-item">
                <div class="misi-number">1</div>
                <p><strong>Menguatkan pelayanan internal</strong> melalui sistem kerja terstruktur, evaluasi berkala, dan pengembangan kapasitas pengurus yang berkelanjutan.</p>
            </div>
            <div class="misi-item">
                <div class="misi-number">2</div>
                <p><strong>Mendorong kolaborasi lintas pihak</strong> (mahasiswa, alumni, departemen, dan mitra) untuk memperluas dampak program kerja.</p>
            </div>
            <div class="misi-item">
                <div class="misi-number">3</div>
                <p><strong>Mewujudkan transparansi informasi</strong> melalui publikasi kegiatan, dokumentasi terpusat, dan akses informasi yang mudah bagi warga Teknik Komputer ITS.</p>
            </div>
        </div>
    </section>

    <!-- Information Board -->
    <section class="experience" id="experience" style="background: #0A0A14; padding: 6rem 2rem;">
        <div class="section-header">
            <div class="section-badge">Papan Informasi</div>
            <h2 class="section-title">Update <span class="highlight">Terbaru</span></h2>
            <p class="section-desc">Berita kegiatan, pengumuman, dan dokumentasi resmi HIMATEKKOM ITS 2026</p>
        </div>

        <?php ($latestInfo = $latestInfo ?? collect()); ?>
        <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem;">
            <?php $__empty_1 = true; $__currentLoopData = $latestInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article style="background: linear-gradient(145deg, rgba(74, 20, 140, 0.2) 0%, rgba(255, 215, 0, 0.05) 100%); border: 1px solid rgba(255, 215, 0, 0.2); border-radius: 24px; overflow: hidden;">
                <?php if($article->cover_image_url): ?>
                <img src="<?php echo e($article->cover_image_url); ?>" alt="<?php echo e($article->title); ?>" style="width: 100%; height: 190px; object-fit: cover;">
                <?php endif; ?>
                <div style="padding: 1.5rem;">
                    <div style="color: rgba(255,255,255,0.6); font-size: 0.85rem; margin-bottom: 0.65rem;">
                        <?php echo e(optional($article->published_at)->format('d M Y H:i') ?? '-'); ?>

                    </div>
                    <h4 style="color: var(--gold); font-size: 1.1rem; font-weight: 700; margin-bottom: 0.75rem;"><?php echo e($article->title); ?></h4>
                    <p style="color: rgba(255,255,255,0.8); line-height: 1.7; margin-bottom: 1rem;"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($article->excerpt ?: $article->content), 130)); ?></p>
                    <a href="<?php echo e(route('informasi.show', $article->slug)); ?>" class="btn-outline" style="font-size: 0.9rem; padding: 10px 18px;">
                        <i class="fas fa-book-open"></i> Baca Detail
                    </a>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="grid-column: 1/-1; text-align: center; color: rgba(255,255,255,0.75); padding: 1.5rem;">
                Belum ada artikel dipublikasikan. Silakan cek kembali dalam waktu dekat.
            </div>
            <?php endif; ?>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <a href="<?php echo e(route('informasi.index')); ?>" class="btn-primary">
                <i class="fas fa-newspaper"></i> Lihat Semua Informasi
            </a>
        </div>
    </section>

    <!-- Publication & Social -->
    <section style="background: linear-gradient(135deg, rgba(74, 20, 140, 0.3) 0%, rgba(255, 215, 0, 0.1) 100%); padding: 5rem 2rem;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="background: linear-gradient(145deg, rgba(10, 10, 20, 0.8) 0%, rgba(74, 20, 140, 0.2) 100%); border: 2px solid rgba(255, 215, 0, 0.3); border-radius: 30px; padding: 3rem; text-align: center; margin-bottom: 2rem; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🔎</div>
                <h3 style="font-size: 1.75rem; margin-bottom: 1rem; background: var(--gradient-gold); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 800;">
                    Butuh dokumen dan publikasi resmi?
                </h3>
                <p style="color: rgba(255,255,255,0.8); font-size: 1.1rem; margin-bottom: 2rem; line-height: 1.7;">
                    Seluruh referensi kegiatan dan materi organisasi bisa diakses melalui kanal berikut 👇
                </p>
                <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
                    <a href="https://its.id/m/RPOSentraSinergi" target="_blank" style="background: var(--gradient-gold); color: var(--purple-deep); padding: 16px 32px; border-radius: 50px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: all 0.3s; box-shadow: 0 4px 20px rgba(255, 215, 0, 0.4);">
                        <i class="fas fa-book"></i> Dokumen Organisasi
                    </a>
                    <a href="https://its.id/m/PPTRPOSentraSinergi" target="_blank" style="background: transparent; border: 2px solid var(--gold); color: var(--gold); padding: 14px 30px; border-radius: 50px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: all 0.3s;">
                        <i class="fas fa-file-powerpoint"></i> Materi Presentasi
                    </a>
                </div>
            </div>

            <div style="background: linear-gradient(145deg, rgba(10, 10, 20, 0.8) 0%, rgba(74, 20, 140, 0.2) 100%); border: 2px solid rgba(255, 215, 0, 0.3); border-radius: 30px; padding: 2.5rem; text-align: center; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📲</div>
                <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: var(--gold); font-weight: 700;">
                    Mau update kegiatan terbaru?
                </h3>
                <p style="color: rgba(255,255,255,0.8); font-size: 1rem; margin-bottom: 1.5rem;">
                    Follow akun resmi Kabinet Sentra Sinergi untuk konten dan publikasi terkini ✨
                </p>
                <a href="https://www.instagram.com/sentrasinergi/" target="_blank" style="background: linear-gradient(135deg, #E1306C 0%, #F77737 50%, #FCAF45 100%); color: white; padding: 14px 32px; border-radius: 50px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: all 0.3s; box-shadow: 0 4px 20px rgba(225, 48, 108, 0.4);">
                    <i class="fab fa-instagram"></i> @sentrasinergi
                </a>
            </div>
        </div>
    </section>

    <!-- Programs -->
    <section class="programs" id="programs">
        <div class="section-header">
            <div class="section-badge">Program Unggulan</div>
            <h2 class="section-title">Rangkaian <span class="highlight">Program Kerja</span></h2>
            <p class="section-desc">Tiga pilar utama: Optimalisasi, Kolaborasi, dan Ekspansi</p>
        </div>

        <div class="program-category">
            <div class="category-header">
                <div class="category-icon"><i class="fas fa-cogs"></i></div>
                <div>
                    <h3 class="category-title">Optimalisasi</h3>
                    <p class="category-desc">Penguatan sistem internal organisasi</p>
                </div>
            </div>
            <div class="program-grid">
                <div class="program-card">
                    <h4>CMOS (Computer Monitoring System)</h4>
                    <span class="dept-tag">Sistem Terintegrasi</span>
                    <p>Sistem monitoring dan pelaporan program kerja secara terintegrasi. Mendorong transparansi, akuntabilitas, dan efektivitas manajemen organisasi berbasis data.</p>
                </div>
                <div class="program-card">
                    <h4>Personalia</h4>
                    <span class="dept-tag">Sumber Daya Manusia</span>
                    <p>Pengelolaan SDM organisasi mulai dari rekrutmen, upgrading, rapor staf, hingga sistem apresiasi untuk membangun budaya kerja yang sehat dan bertumbuh.</p>
                </div>
            </div>
        </div>

        <div class="program-category">
            <div class="category-header">
                <div class="category-icon"><i class="fas fa-handshake"></i></div>
                <div>
                    <h3 class="category-title">Kolaborasi</h3>
                    <p class="category-desc">Penguatan relasi dan jejaring</p>
                </div>
            </div>
            <div class="program-grid">
                <div class="program-card">
                    <h4>Hi Alumni</h4>
                    <span class="dept-tag">Hublu</span>
                    <p>Penguatan relasi mahasiswa aktif dan alumni melalui database terstruktur serta publikasi pengalaman alumni dari kuliah hingga dunia kerja.</p>
                </div>
                <div class="program-card">
                    <h4>Sosmas</h4>
                    <span class="dept-tag">Hublu</span>
                    <p>Biro berfokus isu sosial kemasyarakatan seperti charity, bantuan sosial, dan kolaborasi eksternal sebagai wadah kepedulian sosial mahasiswa.</p>
                </div>
                <div class="program-card">
                    <h4>Advocation Corner</h4>
                    <span class="dept-tag">Kesma</span>
                    <p>Penguatan layanan advokasi kesejahteraan dengan pendampingan aktif pada isu UKT, FRS, beasiswa, dan kebutuhan kesejahteraan mahasiswa.</p>
                </div>
            </div>
        </div>

        <div class="program-category">
            <div class="category-header">
                <div class="category-icon"><i class="fas fa-expand-arrows-alt"></i></div>
                <div>
                    <h3 class="category-title">Ekspansi</h3>
                    <p class="category-desc">Pengembangan dan perluasan dampak</p>
                </div>
            </div>
            <div class="program-grid">
                <div class="program-card">
                    <h4>COD (Career Orientation & Development)</h4>
                    <span class="dept-tag">PSDM</span>
                    <p>Program pengembangan karier untuk mempersiapkan mahasiswa memasuki dunia profesional melalui pelatihan CV, interview, dan personal branding.</p>
                </div>
                <div class="program-card">
                    <h4>BIOS (Bicara, Isu, Opini, dan Solusi)</h4>
                    <span class="dept-tag">Risprof</span>
                    <p>Forum kajian isu keprofesian Teknik Komputer untuk mendorong gagasan kritis, diskusi konstruktif, dan solusi yang relevan.</p>
                </div>
                <div class="program-card">
                    <h4>TEKKOM Insight</h4>
                    <span class="dept-tag">Medfo</span>
                    <p>Media informasi dengan konten edukatif dan kreatif seputar Teknik Komputer untuk meningkatkan literasi teknologi mahasiswa.</p>
                </div>
                <div class="program-card">
                    <h4>Buku Panduan Kaderisasi</h4>
                    <span class="dept-tag">Kader</span>
                    <p>Standarisasi kaderisasi melalui pedoman nilai, alur, dan indikator yang sistematis demi kesinambungan regenerasi kepemimpinan.</p>
                </div>
                <div class="program-card">
                    <h4>Website HIMATEKKOM</h4>
                    <span class="dept-tag">Digital</span>
                    <p>Website resmi sebagai pusat informasi, dokumentasi, dan layanan digital himpunan yang terintegrasi dengan CMOS.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CMOS -->
    <section class="cmos" id="cmos">
        <div class="section-header">
            <div class="section-badge">Flagship Product</div>
            <h2 class="section-title">CMOS - <span class="highlight">Computer Monitoring System</span></h2>
        </div>

        <div class="cmos-container">
            <div class="cmos-content">
                <h3>Sistem Monitoring Terintegrasi</h3>
                <p>CMOS adalah sistem monitoring dan pelaporan program kerja yang dikembangkan untuk mendukung tata kelola organisasi HIMATEKKOM ITS 2026 secara akuntabel, transparan, dan berbasis data.</p>

                <div class="cmos-features">
                    <div class="cmos-feature"><i class="fas fa-check-circle"></i><span>Monitoring Program Kerja Real-time</span></div>
                    <div class="cmos-feature"><i class="fas fa-check-circle"></i><span>Evaluasi Kinerja Pengurus</span></div>
                    <div class="cmos-feature"><i class="fas fa-check-circle"></i><span>Dokumentasi Kegiatan Terpusat</span></div>
                    <div class="cmos-feature"><i class="fas fa-check-circle"></i><span>Pengambilan Keputusan Berbasis Data</span></div>
                </div>

                <a href="<?php echo e(route('login')); ?>" class="btn-primary" style="margin-top: 2rem;">
                    <i class="fas fa-sign-in-alt"></i> Akses CMOS
                </a>
            </div>

            <div class="cmos-visual">
                <i class="fas fa-desktop"></i>
                <h4>Dashboard Terintegrasi</h4>
                <p>Akses data organisasi kapan saja, di mana saja.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-brand">
                <h3>🔗 HIMATEKKOM ITS 2026</h3>
                <p>Kabinet Sentra Sinergi<br>Himpunan Mahasiswa Teknik Komputer<br>Institut Teknologi Sepuluh Nopember</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <a href="#visi-misi">Profil Organisasi</a>
                <a href="#experience">Papan Informasi</a>
                <a href="#programs">Program Kerja</a>
                <a href="#cmos">CMOS</a>
                <a href="<?php echo e(route('login')); ?>">Login Pengurus</a>
            </div>
            <div class="footer-links">
                <h4>Kontak</h4>
                <a href="#">himatekkom@its.ac.id</a>
                <a href="#">Gedung Teknik Komputer</a>
                <a href="#">Kampus ITS Sukolilo, Surabaya</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo e(date('Y')); ?> HIMATEKKOM ITS 2026 - Kabinet Sentra Sinergi. Semua hak dilindungi.</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            document.getElementById('navLinks').classList.toggle('active');
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                    document.getElementById('navLinks').classList.remove('active');
                }
            });
        });

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(10, 10, 20, 0.98)';
                navbar.style.boxShadow = '0 5px 30px rgba(0,0,0,0.3)';
            } else {
                navbar.style.background = 'rgba(10, 10, 20, 0.9)';
                navbar.style.boxShadow = 'none';
            }
        });

        // Typing effect on landing title
        const words = [
            "Sentra Sinergi",
            "HIMATEKKOM ITS",
        ];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        const typingEl = document.getElementById("typingText");

        function typeLoop() {
            const currentWord = words[wordIndex];
            if (!isDeleting) {
                typingEl.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
                if (charIndex === currentWord.length) {
                    isDeleting = true;
                    setTimeout(typeLoop, 1400);
                    return;
                }
            } else {
                typingEl.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
                if (charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                }
            }
            const speed = isDeleting ? 45 : 90;
            setTimeout(typeLoop, speed);
        }

        document.addEventListener("DOMContentLoaded", typeLoop);
    </script>
</body>
</html><?php /**PATH /home/sentrasi/public_html/resources/views/landing.blade.php ENDPATH**/ ?>