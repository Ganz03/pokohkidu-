@extends('layouts.app')

@section('title', $villageDemographic->title ?? 'Demografi Desa Pokoh Kidul')

@push('styles')
<style>
/* Enhanced typography for better readability */
.demographics-content {
    text-align: justify;
    line-height: 1.8;
    color: #374151;
}

.demographics-content .prose {
    max-width: none;
}

.demographics-content .prose p {
    margin-bottom: 1.5rem;
    text-align: justify;
    line-height: 1.8;
}

.demographics-content .prose h1,
.demographics-content .prose h2,
.demographics-content .prose h3,
.demographics-content .prose h4,
.demographics-content .prose h5,
.demographics-content .prose h6 {
    color: #1e40af;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
    padding-left: 1rem;
    border-left: 4px solid #3b82f6;
    background: #f8fafc;
    padding: 1rem;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.demographics-content .prose h3:nth-of-type(1)::before {
    content: '👥';
    font-size: 1.5rem;
}

.demographics-content .prose h3:nth-of-type(2)::before {
    content: '📊';
    font-size: 1.5rem;
}

.demographics-content .prose h3:nth-of-type(3)::before {
    content: '📈';
    font-size: 1.5rem;
}

.demographics-content .prose h3:nth-of-type(4)::before {
    content: '🏛️';
    font-size: 1.5rem;
}

.demographics-content .prose h3:nth-of-type(5)::before {
    content: '🗺️';
    font-size: 1.5rem;
}

.demographics-content .prose h3:nth-of-type(6)::before {
    content: '🤝';
    font-size: 1.5rem;
}

.demographics-content .prose strong {
    color: #1e40af;
    font-weight: 600;
}

.demographics-content .prose ul,
.demographics-content .prose ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.demographics-content .prose li {
    margin: 0.75rem 0;
    text-align: justify;
    line-height: 1.7;
}

.demographics-content .prose table {
    width: 100%;
    border-collapse: collapse;
    margin: 2rem 0;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.demographics-content .prose table th {
    background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    color: white;
    padding: 1rem;
    text-align: center;
    font-weight: 600;
    border: 1px solid #dbeafe;
    font-size: 0.875rem;
}

.demographics-content .prose table td {
    padding: 0.875rem;
    text-align: center;
    border: 1px solid #f1f5f9;
    vertical-align: middle;
    font-size: 0.875rem;
}

.demographics-content .prose table tbody tr:nth-child(even) {
    background: #f8fafc;
}

.demographics-content .prose table tbody tr:hover {
    background: #e0f2fe;
    transform: scale(1.01);
    transition: all 0.2s ease;
}

.demographics-content .prose table td:first-child {
    background: #eff6ff;
    font-weight: 600;
    color: #1e40af;
}

.demographics-content .prose table tr[style*="background-color"] {
    background: #e0f2fe !important;
    font-weight: 600;
}

.demographics-content .prose table tr[style*="background-color"]:hover {
    background: #bae6fd !important;
}

/* Stats Cards */
.stats-section {
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    padding: 2rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #0ea5e9;
}

.stats-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
}

.stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-top: 4px solid #3b82f6;
    transition: transform 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-card .icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.stat-card .value {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e40af;
    margin: 0.5rem 0;
}

.stat-card .label {
    color: #6b7280;
    font-size: 0.875rem;
    font-weight: 500;
}

.growth-indicator {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 500;
}

.growth-up {
    background: #dcfce7;
    color: #166534;
}

.growth-down {
    background: #fee2e2;
    color: #991b1b;
}

/* Summary Box */
.summary-box {
    background: linear-gradient(135deg, #fefbf8 0%, #fef3e2 100%);
    padding: 2rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #ea580c;
    text-align: center;
}

.summary-box h4 {
    color: #9a3412;
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.summary-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.summary-stat {
    background: white;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.summary-stat .number {
    font-size: 1.25rem;
    font-weight: 700;
    color: #ea580c;
}

.summary-stat .text {
    font-size: 0.75rem;
    color: #6b7280;
    margin-top: 0.25rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .demographics-content .prose h3 {
        font-size: 1.125rem;
        padding: 0.75rem;
        flex-direction: column;
        text-align: center;
        gap: 8px;
    }
    
    .demographics-content .prose table {
        font-size: 0.75rem;
        overflow-x: auto;
        display: block;
        white-space: nowrap;
    }
    
    .demographics-content .prose table th,
    .demographics-content .prose table td {
        padding: 0.5rem;
        font-size: 0.75rem;
    }
    
    .stats-cards {
        grid-template-columns: 1fr;
    }
    
    .summary-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .stats-section,
    .summary-box {
        padding: 1rem;
    }
    
    .stat-card {
        padding: 1rem;
    }
    
    .demographics-content .prose table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
}
</style>
@endpush

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                {{ $villageDemographic->title ?? 'Demografi Desa Pokoh Kidul' }}
            </h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        {{-- Stats Overview --}}
        <div class="stats-section">
            <h3 class="text-xl font-bold text-center mb-6 text-sky-800">📊 Ringkasan Data Kependudukan 2019</h3>
            <div class="stats-cards">
                <div class="stat-card">
                    <div class="icon">👥</div>
                    <div class="value">5.585</div>
                    <div class="label">Total Penduduk</div>
                    <div class="growth-indicator growth-down">
                        <i class="fas fa-arrow-down"></i> -4 jiwa
                    </div>
                </div>
                <div class="stat-card">
                    <div class="icon">👨</div>
                    <div class="value">2.856</div>
                    <div class="label">Laki-laki</div>
                    <div class="growth-indicator growth-down">
                        <i class="fas fa-arrow-down"></i> -2 jiwa
                    </div>
                </div>
                <div class="stat-card">
                    <div class="icon">👩</div>
                    <div class="value">2.729</div>
                    <div class="label">Perempuan</div>
                    <div class="growth-indicator growth-down">
                        <i class="fas fa-arrow-down"></i> -2 jiwa
                    </div>
                </div>
                <div class="stat-card">
                    <div class="icon">⚖️</div>
                    <div class="value">104.7</div>
                    <div class="label">Rasio Jenis Kelamin</div>
                    <small class="text-xs text-gray-500">per 100 perempuan</small>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8 md:p-12">
                
                {{-- Content --}}
                @if($villageDemographic && !empty($villageDemographic->content))
                <div class="demographics-content mb-12">
                    <div class="prose prose-lg max-w-none">
                        {!! $villageDemographic->content !!}
                    </div>
                </div>
                @endif

                {{-- Administrative Summary --}}
                <div class="summary-box">
                    <h4>🏛️ Ringkasan Struktur Administratif</h4>
                    <div class="summary-stats">
                        <div class="summary-stat">
                            <div class="number">11</div>
                            <div class="text">Dusun</div>
                        </div>
                        <div class="summary-stat">
                            <div class="number">13</div>
                            <div class="text">RW</div>
                        </div>
                        <div class="summary-stat">
                            <div class="number">31</div>
                            <div class="text">RT</div>
                        </div>
                        <div class="summary-stat">
                            <div class="number">9</div>
                            <div class="text">Anggota BPD</div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-amber-800">
                        Struktur pemerintahan yang lengkap untuk melayani 5.585 jiwa penduduk
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection