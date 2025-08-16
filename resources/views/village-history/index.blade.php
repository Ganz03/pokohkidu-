@extends('layouts.app')

@section('title', $villageHistory->title ?? 'Sejarah Desa Pokoh Kidul')

@push('styles')
<style>
/* Enhanced typography for better readability */
.history-content {
    text-align: justify;
    line-height: 1.8;
    color: #374151;
}

.history-content .prose {
    max-width: none;
}

.history-content .prose p {
    margin-bottom: 1.5rem;
    text-align: justify;
    line-height: 1.8;
}

.history-content .prose h1,
.history-content .prose h2,
.history-content .prose h3,
.history-content .prose h4,
.history-content .prose h5,
.history-content .prose h6 {
    color: #1e40af;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.history-content .prose strong {
    color: #1e40af;
    font-weight: 600;
}

.history-content .prose em {
    color: #059669;
    font-style: italic;
}

.history-content .prose ol,
.history-content .prose ul {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.history-content .prose li {
    margin: 0.75rem 0;
    text-align: justify;
    line-height: 1.7;
}

.timeline-section {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #f59e0b;
    box-shadow: 0 4px 20px rgba(245, 158, 11, 0.1);
    position: relative;
    overflow: hidden;
}

.timeline-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(245, 158, 11, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.timeline-section h3 {
    color: #92400e;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.timeline-section h3::before {
    content: '📜';
    font-size: 1.5rem;
}

.origin-section {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #3b82f6;
    box-shadow: 0 4px 20px rgba(59, 130, 246, 0.1);
    position: relative;
    overflow: hidden;
}

.origin-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(59, 130, 246, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.origin-section h3 {
    color: #1e40af;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.origin-section h3::before {
    content: '🏛️';
    font-size: 1.5rem;
}

.historical-event {
    background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #ef4444;
    box-shadow: 0 4px 20px rgba(239, 68, 68, 0.1);
    position: relative;
    overflow: hidden;
}

.historical-event::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(239, 68, 68, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.historical-event h3 {
    color: #dc2626;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.historical-event h3::before {
    content: '⚡';
    font-size: 1.5rem;
}

.development-section {
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #0ea5e9;
    box-shadow: 0 4px 20px rgba(14, 165, 233, 0.1);
    position: relative;
    overflow: hidden;
}

.development-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(14, 165, 233, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.development-section h3 {
    color: #0369a1;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.development-section h3::before {
    content: '🏗️';
    font-size: 1.5rem;
}

.government-section {
    background: linear-gradient(135deg, #f7fee7 0%, #ecfccb 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #65a30d;
    box-shadow: 0 4px 20px rgba(101, 163, 13, 0.1);
    position: relative;
    overflow: hidden;
}

.government-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(101, 163, 13, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.government-section h3 {
    color: #365314;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.government-section h3::before {
    content: '👑';
    font-size: 1.5rem;
}

.cultural-section {
    background: linear-gradient(135deg, #fdf4ff 0%, #fae8ff 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #a855f7;
    box-shadow: 0 4px 20px rgba(168, 85, 247, 0.1);
    position: relative;
    overflow: hidden;
}

.cultural-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(168, 85, 247, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.cultural-section h3 {
    color: #7c2d12;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.cultural-section h3::before {
    content: '🎭';
    font-size: 1.5rem;
}

.leaders-timeline {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    border: 2px solid #ecfccb;
    box-shadow: 0 2px 10px rgba(101, 163, 13, 0.1);
}

.leaders-timeline .prose ol {
    counter-reset: leader-counter;
    list-style: none;
    padding-left: 0;
}

.leaders-timeline .prose ol li {
    counter-increment: leader-counter;
    margin: 1rem 0;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 8px;
    border-left: 4px solid #65a30d;
    position: relative;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.leaders-timeline .prose ol li::before {
    content: counter(leader-counter);
    position: absolute;
    left: -20px;
    top: 50%;
    transform: translateY(-50%);
    background: #65a30d;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    box-shadow: 0 2px 8px rgba(101, 163, 13, 0.3);
}

.introduction-section {
    background: #f8fafc;
    padding: 2rem;
    border-radius: 12px;
    margin: 2rem 0;
    border: 1px solid #e2e8f0;
    text-align: center;
}

.introduction-section p {
    font-size: 1.125rem;
    color: #4b5563;
    font-weight: 500;
    margin: 0;
}

.author-section {
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    padding: 1.5rem;
    border-radius: 12px;
    margin: 2rem 0;
    border: 1px solid #d1d5db;
    text-align: center;
}

.author-section p {
    margin: 0;
    color: #6b7280;
    font-style: italic;
}

.author-section strong {
    color: #374151;
    font-weight: 600;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .timeline-section,
    .origin-section,
    .historical-event,
    .development-section,
    .government-section,
    .cultural-section {
        padding: 1.5rem;
        margin: 1.5rem 0;
    }
    
    .timeline-section h3,
    .origin-section h3,
    .historical-event h3,
    .development-section h3,
    .government-section h3,
    .cultural-section h3 {
        font-size: 1.25rem;
    }
    
    .leaders-timeline .prose ol li::before {
        left: -15px;
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .introduction-section,
    .author-section {
        padding: 1.5rem;
    }
    
    .leaders-timeline .prose ol li {
        padding: 0.75rem;
        margin: 0.75rem 0;
    }
}
</style>
@endpush

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                {{ $villageHistory->title ?? 'Sejarah Desa Pokoh Kidul' }}
            </h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        {{-- Main Content --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8 md:p-12">
                
                {{-- Introduction --}}
                @if($villageHistory && !empty($villageHistory->introduction))
                <div class="introduction-section">
                    <div class="prose prose-lg max-w-none history-content">
                        {!! $villageHistory->introduction !!}
                    </div>
                </div>
                @endif

                {{-- Origin Story --}}
                @if($villageHistory && !empty($villageHistory->origin_story))
                <div class="origin-section">
                    <h3>Asal Usul Nama</h3>
                    <div class="prose prose-lg max-w-none history-content">
                        {!! $villageHistory->origin_story !!}
                    </div>
                </div>
                @endif

                {{-- PKI Rebellion --}}
                @if($villageHistory && !empty($villageHistory->pki_rebellion))
                <div class="historical-event">
                    <h3>Peristiwa Pemberontakan PKI 1965</h3>
                    <div class="prose prose-lg max-w-none history-content">
                        {!! $villageHistory->pki_rebellion !!}
                    </div>
                </div>
                @endif

                {{-- Reservoir Impact --}}
                @if($villageHistory && !empty($villageHistory->reservoir_impact))
                <div class="development-section">
                    <h3>Dampak Pembangunan Waduk Gajah Mungkur</h3>
                    <div class="prose prose-lg max-w-none history-content">
                        {!! $villageHistory->reservoir_impact !!}
                    </div>
                </div>
                @endif

                {{-- Government History --}}
                @if($villageHistory && !empty($villageHistory->government_history))
                <div class="government-section">
                    <h3>Sejarah Pemerintahan</h3>
                    <div class="prose prose-lg max-w-none history-content">
                        {!! $villageHistory->government_history !!}
                    </div>
                </div>
                @endif

                {{-- Cultural Heritage --}}
                @if($villageHistory && !empty($villageHistory->cultural_heritage))
                <div class="cultural-section">
                    <h3>Warisan Budaya - Gejog Lesung</h3>
                    <div class="prose prose-lg max-w-none history-content">
                        {!! $villageHistory->cultural_heritage !!}
                    </div>
                </div>
                @endif

                {{-- Author --}}
                @if($villageHistory && !empty($villageHistory->author))
                <div class="author-section">
                    <p><strong>Penulis:</strong> {{ $villageHistory->author }}</p>
                </div>
                @endif

                {{-- Timeline Summary --}}
                <div class="timeline-section mt-12">
                    <h3>Kronologi Sejarah</h3>
                    <div class="bg-white rounded-lg p-6">
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-4 h-4 bg-blue-500 rounded-full flex-shrink-0"></div>
                                <div>
                                    <span class="font-bold text-blue-600">1930an-1965:</span>
                                    <span class="text-gray-700">Era Raden Ngabehi Ponco Sucitro</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-4 h-4 bg-red-500 rounded-full flex-shrink-0"></div>
                                <div>
                                    <span class="font-bold text-red-600">22 Oktober 1965:</span>
                                    <span class="text-gray-700">Peristiwa Pemberantasan PKI</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-4 h-4 bg-cyan-500 rounded-full flex-shrink-0"></div>
                                <div>
                                    <span class="font-bold text-cyan-600">1974-1981:</span>
                                    <span class="text-gray-700">Pembangunan Waduk Gajah Mungkur</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-4 h-4 bg-purple-500 rounded-full flex-shrink-0"></div>
                                <div>
                                    <span class="font-bold text-purple-600">2015:</span>
                                    <span class="text-gray-700">Pelestarian kembali Gejog Lesung</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection