<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Pokohkidul Wonogiri')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Base Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
        }

        /* Top Contact Bar */
        .top-bar {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }

        .top-bar .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-info {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .contact-info span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .contact-info i {
            font-size: 12px;
        }

        .location {
            font-weight: 500;
        }

        /* Main Header */
        .main-header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 80px;
            gap: 20px;
        }

        /* Logo Section */
        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-shrink: 0;
            min-width: 280px;
        }

        .logo img {
            width: 50px;
            height: auto;
            max-width: 100%;
            object-fit: contain;
        }

        .logo i {
            font-size: 28px;
            color: white;
        }

        .logo-text {
            flex: 1;
        }

        .logo-text h1 {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            line-height: 1.2;
            margin: 0;
        }

        .logo-text p {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
            margin: 0;
        }

        /* Desktop Navigation */
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0;
            align-items: center;
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            border-radius: 50px;
            padding: 6px;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            flex-wrap: nowrap;
            overflow: visible;
        }

        .nav-item {
            position: relative;
            flex-shrink: 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 12px 16px;
            text-decoration: none;
            color: white;
            font-weight: 500;
            font-size: 13px;
            border-radius: 25px;
            transition: all 0.3s ease;
            white-space: nowrap;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            border-radius: 25px;
        }

        .nav-link:hover::before {
            transform: scaleX(1);
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-link i {
            font-size: 9px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover i {
            transform: rotate(180deg);
        }

        /* Dropdown Styles */
        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 220px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            border: 1px solid #e5e7eb;
            margin-top: 8px;
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: block;
            padding: 12px 20px;
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            border-bottom: 1px solid #f3f4f6;
            position: relative;
        }

        .dropdown-item:last-child {
            border-bottom: none;
            border-radius: 0 0 12px 12px;
        }

        .dropdown-item:first-child {
            border-radius: 12px 12px 0 0;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            color: white;
            transform: translateX(5px);
        }

        .dropdown-item i {
            width: 16px;
            margin-right: 10px;
            color: #3b82f6;
            transition: color 0.3s ease;
        }

        .dropdown-item:hover i {
            color: white;
        }

        /* Mobile Navigation */
        .mobile-nav-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            flex-direction: column;
            gap: 0;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.3s ease;
            border-radius: 0 0 12px 12px;
        }

        .mobile-nav-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mobile-nav-menu .nav-item {
            width: 100%;
        }

        .mobile-nav-menu .nav-link {
            width: 100%;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
            color: #4b5563;
            background: transparent;
        }

        .mobile-nav-menu .nav-link::before {
            display: none;
        }

        .mobile-nav-menu .nav-link:hover {
            color: #3b82f6;
            background: #f8fafc;
            transform: none;
            box-shadow: none;
        }

        .mobile-nav-menu .nav-link:last-child {
            border-bottom: none;
        }

        /* Mobile Dropdown */
        .mobile-dropdown {
            max-height: 0;
            overflow: hidden;
            background: #f8fafc;
            transition: max-height 0.3s ease;
            border-radius: 8px;
            margin-top: 10px;
        }

        .mobile-dropdown.active {
            max-height: 400px;
        }

        .mobile-dropdown .dropdown-item {
            padding: 10px 15px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 13px;
        }

        .mobile-dropdown .dropdown-item:last-child {
            border-bottom: none;
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #4b5563;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .mobile-toggle:hover {
            background: #f3f4f6;
            color: #3b82f6;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 200px);
        }

        /* Footer Styles */
        .main-footer {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 50%, #1e40af 100%);
            color: white;
            margin-top: 0;
        }

        .footer-content {
            padding: 60px 0 40px;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
            max-width: 1400px;
            display: flex;
            justify-content: center;
        }

        .footer-section h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #ffffff;
            position: relative;
            padding-bottom: 12px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #fbbf24, #f59e0b);
            border-radius: 2px;
        }

        /* Profile Section */
        .profile-content h4 {
            font-size: 18px;
            font-weight: 600;
            color: #fbbf24;
            margin-bottom: 8px;
        }

        .profile-content h5 {
            font-size: 16px;
            font-weight: 500;
            color: #e2e8f0;
            margin-bottom: 20px;
        }

        .profile-content p {
            line-height: 1.7;
            max-width: 700px;
            word-wrap: break-word; 
            color: #cbd5e1;
            margin-bottom: 20px;
            font-size: 14px;
            margin-right: 40px; 
        }

        .read-more {
            color: #fbbf24;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .read-more:hover {
            color: #f59e0b;
            transform: translateX(5px);
        }

        .read-more i {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .read-more:hover i {
            transform: translateX(3px);
        }

        /* Contact Section */
        .contact-info {
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: center;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            color: #cbd5e1;
            margin-bottom: 20px;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-item i {
            color: #fbbf24;
            font-size: 18px;
            width: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .contact-item div p {
            margin: 0 0 5px 0;
            line-height: 1.5;
            font-size: 14px;
        }

        .contact-item span {
            font-size: 14px;
            line-height: 1.5;
        }

        /* Footer Bottom */
        .footer-bottom {
            background: rgba(0, 0, 0, 0.2);
            padding: 25px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-bottom-content {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
        }

        .copyright {
            color: #cbd5e1;
        }

        /* Mobile Styles */
        @media (max-width: 1200px) {
            .nav-link {
                padding: 10px 12px;
                font-size: 12px;
            }
        }

        @media (max-width: 1024px) {
            .header-container {
                max-width: 100%;
            }
            
            .logo-section {
                min-width: 250px;
            }
            
            .nav-link {
                padding: 8px 10px;
                font-size: 11px;
                gap: 4px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        @media (max-width: 768px) {
            .top-bar {
                font-size: 12px;
                padding: 6px 0;
            }

            .contact-info {
                gap: 15px;
            }

            .contact-info span {
                gap: 3px;
            }

            .header-container {
                min-height: 70px;
                gap: 15px;
            }

            .logo-section {
                min-width: auto;
            }

            .logo {
                width: 50px;
                height: 50px;
            }
            
            .logo i {
                font-size: 24px;
            }

            .logo-text h1 {
                font-size: 16px;
            }

            .logo-text p {
                font-size: 12px;
            }

            .mobile-toggle {
                display: block;
            }

            /* Hide desktop navigation on mobile */
            .nav-menu {
                display: none;
            }

            /* Show mobile navigation */
            .mobile-nav-menu {
                display: flex;
            }

            .footer-content {
                padding: 40px 0 30px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-section h3 {
                font-size: 20px;
                margin-bottom: 20px;
            }

            .footer-bottom-content {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .top-bar .container {
                flex-direction: column;
                gap: 5px;
                text-align: center;
            }

            .contact-info {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            .logo-text h1 {
                font-size: 14px;
            }

            .logo-text p {
                font-size: 11px;
            }

            .footer-content {
                padding: 30px 0 20px;
            }

            .footer-container {
                padding: 0 15px;
            }

            .profile-content h4 {
                font-size: 16px;
            }

            .profile-content h5 {
                font-size: 14px;
            }

            .profile-content p {
                font-size: 13px;
            }

            .contact-item {
                gap: 10px;
            }

            .contact-item i {
                font-size: 16px;
            }
        }
    </style>

    {{-- Additional Styles from pages --}}
    @stack('styles')
</head>
<body>
    {{-- Top Contact Bar --}}
    <div class="top-bar">
        <div class="container">
            <div class="contact-info">
                <span><i class="fas fa-phone"></i> 082324257542</span>
                <span><i class="fas fa-envelope"></i> pokohkidulwonogiri@gmail.com</span>
            </div>
            <div class="location">
                <i class="fas fa-map-marker-alt"></i> WONOGIRI
            </div>
        </div>
    </div>

    {{-- Main Header --}}
    <header class="main-header">
        <div class="header-container">
            {{-- Logo Section --}}
            <div class="logo-section">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/wonogiri.png') }}" alt="logo">
                    </a>
                </div>
                <div class="logo-text">
                    <h1>DESA POKOHKIDUL</h1>
                    <p>WONOGIRI - WONOGIRI</p>
                </div>
            </div>

            {{-- Navigation Menu --}}
            <nav>
                {{-- Desktop Navigation --}}
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            PROFIL DESA <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="{{ route('about.index') }}" class="dropdown-item">
                                <i class="fas fa-users"></i> Tentang Kami
                            </a>
                            <a href="{{ route('vision-mission.index') }}" class="dropdown-item">
                                <i class="fas fa-eye"></i> Visi & Misi
                            </a>
                            <a href="{{ route('village-history.index') }}" class="dropdown-item">
                                <i class="fas fa-history"></i> Sejarah Desa
                            </a>
                            <a href="{{ route('village-geography.index') }}" class="dropdown-item">
                                <i class="fas fa-map"></i> Geografis Desa
                            </a>
                            <a href="{{ route('village-demographics.index') }}" class="dropdown-item">
                                <i class="fas fa-chart-bar"></i> Demografis Desa
                            </a>
                            <a href="{{ route('maps.index') }}" class="dropdown-item">
                                <i class="fas fa-map"></i> Peta Infografis Desa
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            DESA CERDAS <i class="fas fa-chevron-down"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            PEMERINTAHAN <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="{{ route('organization.index') }}" class="dropdown-item">
                                <i class="fas fa-sitemap"></i> Struktur Organisasi
                            </a>
                            <a href="{{ route('perangkat-desa.index') }}" class="dropdown-item">
                                <i class="fas fa-users-cog"></i> Perangkat Desa
                            </a>
                            <a href="{{ route('lembaga-desa.index') }}"  class="dropdown-item">
                                <i class="fas fa-building mr-2"></i>Lembaga Desa
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            LAYANAN <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="{{ route('services.kk.index') }}" class="dropdown-item">
                                <i class="fas fa-id-card"></i> KK
                            </a>
                            <a href="{{ route('services.ktp.index') }}" class="dropdown-item">
                                <i class="fas fa-address-card"></i> KTP
                            </a>
                            <a href="{{ route('services.pindah-datang.index') }}" class="dropdown-item">
                                <i class="fas fa-plane"></i> Pindah Datang Tercecer
                            </a>
                            <a href="{{ route('services.kia.index') }}" class="dropdown-item">
                                <i class="fas fa-file-alt"></i> KIA
                            </a>
                            <a href="{{ route('services.peristiwa-penting.index') }}" class="dropdown-item">
                                <i class="fas fa-certificate"></i> Peristiwa Penting/Akta
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            INFORMASI <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="{{ route('news.index') }}" class="dropdown-item">
                                <i class="fas fa-newspaper"></i> Berita
                            </a>
                            <a href="{{ route('announcements.index') }}" class="dropdown-item">
                                <i class="fas fa-bullhorn"></i> Pengumuman
                            </a>
                            <a href="{{ route('events.index') }}" class="dropdown-item">
                                <i class="fas fa-calendar"></i> Agenda Kegiatan
                            </a>
                            <a href="{{ route('gallery.index') }}" class="dropdown-item">
                                <i class="fas fa-images"></i> Galeri
                            </a>
                            <a href="{{ route('apbdesa.index') }}" class="dropdown-item">
                                <i class="fas fa-chart-line"></i> APBDesa
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            POTENSI DESA <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="{{ route('potensi-desa.index') }}" class="dropdown-item">
                                <i class="fas fa-seedling"></i> Potensi Penduduk
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            PRODUK HUKUM <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-tie"></i> SK Kepala Desa
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-gavel"></i> Perkades
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-balance-scale"></i> Perdes
                            </a>
                        </div>
                    </li>
                </ul>

                {{-- Mobile Menu Toggle --}}
                <button class="mobile-toggle" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </button>
                
                {{-- Mobile Navigation --}}
                <ul class="mobile-nav-menu" id="mobileNavMenu">
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="toggleMobileDropdown(event, 'profilDropdown')">
                            PROFIL DESA <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="mobile-dropdown" id="profilDropdown">
                            <a href="{{ route('about.index') }}" class="dropdown-item">
                                <i class="fas fa-users"></i> Tentang Kami
                            </a>
                            <a href="{{ route('vision-mission.index') }}" class="dropdown-item">
                                <i class="fas fa-eye"></i> Visi & Misi
                            </a>
                            <a href="{{ route('village-history.index') }}" class="dropdown-item">
                                <i class="fas fa-history"></i> Sejarah Desa
                            </a>
                            <a href="{{ route('village-geography.index') }}" class="dropdown-item">
                                <i class="fas fa-map"></i> Geografis Desa
                            </a>
                            <a href="{{ route('village-demographics.index') }}" class="dropdown-item">
                                <i class="fas fa-chart-bar"></i> Demografis Desa
                            </a>
                            <a href="{{ route('maps.index') }}" class="dropdown-item">
                                <i class="fas fa-map"></i> Peta Infografis Desa
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            DESA CERDAS <i class="fas fa-chevron-down"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="toggleMobileDropdown(event, 'pemerintahanDropdown')">
                            PEMERINTAHAN <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="mobile-dropdown" id="pemerintahanDropdown">
                            <a href="{{ route('organization.index') }}" class="dropdown-item">
                                <i class="fas fa-sitemap"></i> Struktur Organisasi
                            </a>
                            <a href="{{ route('perangkat-desa.index') }}" class="dropdown-item">
                                <i class="fas fa-users-cog"></i> Perangkat Desa
                            </a>
                            <a href="{{ route('lembaga-desa.index') }}"  class="dropdown-item">
                                <i class="fas fa-building mr-2"></i>Lembaga Desa
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="toggleMobileDropdown(event, 'layananDropdown')">
                            LAYANAN <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="mobile-dropdown" id="layananDropdown">
                           <a href="{{ route('services.kk.index') }}" class="dropdown-item">
                                <i class="fas fa-id-card"></i> KK
                            </a>
                            <a href="{{ route('services.ktp.index') }}" class="dropdown-item">
                                <i class="fas fa-address-card"></i> KTP
                            </a>
                            <a href="{{ route('services.pindah-datang.index') }}" class="dropdown-item">
                                <i class="fas fa-plane"></i> Pindah Datang Tercecer
                            </a>
                            <a href="{{ route('services.kia.index') }}" class="dropdown-item">
                                <i class="fas fa-file-alt"></i> KIA
                            </a>
                            <a href="{{ route('services.peristiwa-penting.index') }}" class="dropdown-item">
                                <i class="fas fa-certificate"></i> Peristiwa Penting/Akta
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="toggleMobileDropdown(event, 'informasiDropdown')">
                            INFORMASI <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="mobile-dropdown" id="informasiDropdown">
                            <a href="{{ route('news.index') }}" class="dropdown-item">
                                <i class="fas fa-newspaper"></i> Berita
                            </a>
                            <a href="{{ route('announcements.index') }}" class="dropdown-item">
                                <i class="fas fa-bullhorn"></i> Pengumuman
                            </a>
                            <a href="{{ route('events.index') }}" class="dropdown-item">
                                <i class="fas fa-calendar"></i> Agenda Kegiatan
                            </a>
                            <a href="{{ route('gallery.index') }}" class="dropdown-item">
                                <i class="fas fa-images"></i> Galeri
                            </a>
                            <a href="{{ route('apbdesa.index') }}" class="dropdown-item">
                                <i class="fas fa-chart-line"></i> APBDesa
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            POTENSI DESA <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="{{ route('potensi-desa.index') }}" class="dropdown-item">
                                <i class="fas fa-seedling"></i> Potensi Penduduk
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            PRODUK HUKUM <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-tie"></i> SK Kepala Desa
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-gavel"></i> Perkades
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-balance-scale"></i> Perdes
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('content')

    {{-- Footer --}}
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-container">
                {{-- Profile Section --}}
                <div class="footer-section profile-section">
                    <h3>Profil</h3>
                    <div class="profile-content">
                        <h4>DESA POKOHKIDUL - WONOGIRI</h4>
                        <h5>WONOGIRI - JAWA TENGAH</h5>
                        <p>Website desa dibangun dengan tujuan sebagai media pelayanan publik resmi desa, yang dibangun dan dikelola oleh tim sistem informasi desa. Dengan memanfaatkan website penyelenggaraan pelayanan publik dapat dilakukan secara cepat dan mudah</p>
                        <a href="#" class="read-more">
                            selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Contact Section --}}
                <div class="footer-section kontak">
                    <h3>Kontak Kami</h3>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Karangtulun RT.001/003, Pokoh Kidul, Kec. Wonogiri, Kab. Wonogiri, Jawa Tengah. Kode Pos 57615</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>082324257542</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>pokohkidulwonogiri@gmail.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-instagram"></i>
                        <span>@pokohkidulwonogiri</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer Bottom --}}
        <div class="footer-bottom">
            <div class="footer-container">
                <div class="footer-bottom-content">
                    <span class="copyright">2025 © Made with ❤️ by Tim KKN-T IDBU 03 Universitas Diponegoro</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- Base Scripts --}}
    <script>
        function toggleMobileMenu() {
            const mobileNavMenu = document.getElementById('mobileNavMenu');
            const toggleBtn = document.querySelector('.mobile-toggle i');
            
            mobileNavMenu.classList.toggle('active');
            
            if (mobileNavMenu.classList.contains('active')) {
                toggleBtn.classList.remove('fa-bars');
                toggleBtn.classList.add('fa-times');
            } else {
                toggleBtn.classList.remove('fa-times');
                toggleBtn.classList.add('fa-bars');
            }
        }

        function toggleMobileDropdown(event, dropdownId) {
            event.preventDefault();
            const dropdown = document.getElementById(dropdownId);
            const chevron = event.target.querySelector('i.fa-chevron-down');
            
            dropdown.classList.toggle('active');
            
            if (dropdown.classList.contains('active')) {
                chevron.style.transform = 'rotate(180deg)';
            } else {
                chevron.style.transform = 'rotate(0deg)';
            }
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileNavMenu = document.getElementById('mobileNavMenu');
            const toggleBtn = document.querySelector('.mobile-toggle');
            
            if (!mobileNavMenu.contains(event.target) && !toggleBtn.contains(event.target)) {
                mobileNavMenu.classList.remove('active');
                const icon = toggleBtn.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            const mobileNavMenu = document.getElementById('mobileNavMenu');
            if (window.innerWidth > 768) {
                mobileNavMenu.classList.remove('active');
                const icon = document.querySelector('.mobile-toggle i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>

    {{-- Additional Scripts from pages --}}
    @stack('scripts')
</body>
</html>