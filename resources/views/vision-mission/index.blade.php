@extends('layouts.app')

@section('title', $visionMission->title ?? 'Visi Misi Desa')

@push('styles')
<style>
/* Enhanced typography for better readability */
.vision-mission-content {
    text-align: justify;
    line-height: 1.8;
    color: #374151;
}

.vision-mission-content .prose {
    max-width: none;
}

.vision-mission-content .prose p {
    margin-bottom: 1.5rem;
    text-align: justify;
    line-height: 1.8;
}

.vision-mission-content .prose h1,
.vision-mission-content .prose h2,
.vision-mission-content .prose h3,
.vision-mission-content .prose h4,
.vision-mission-content .prose h5,
.vision-mission-content .prose h6 {
    color: #1e40af;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.vision-mission-content .prose strong {
    color: #1e40af;
    font-weight: 600;
}

.vision-mission-content .prose ol,
.vision-mission-content .prose ul {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.vision-mission-content .prose li {
    margin: 0.75rem 0;
    text-align: justify;
    line-height: 1.7;
}

.vision-section {
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #3b82f6;
    box-shadow: 0 4px 20px rgba(59, 130, 246, 0.1);
    position: relative;
    overflow: hidden;
}

.vision-section::before {
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

.vision-section h3 {
    color: #1e40af;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.vision-section h3::before {
    content: '👁️';
    font-size: 1.5rem;
}

.vision-content {
    font-size: 1.125rem;
    font-weight: 500;
    color: #1e40af;
    font-style: italic;
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    border: 2px solid #dbeafe;
    position: relative;
    box-shadow: 0 2px 10px rgba(59, 130, 246, 0.1);
}

.vision-content::before {
    content: '"';
    position: absolute;
    top: -10px;
    left: 15px;
    font-size: 3rem;
    color: #3b82f6;
    background: white;
    padding: 0 10px;
}

.vision-content::after {
    content: '"';
    position: absolute;
    bottom: -20px;
    right: 15px;
    font-size: 3rem;
    color: #3b82f6;
    background: white;
    padding: 0 10px;
}

.mission-section {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    padding: 2.5rem;
    border-radius: 16px;
    margin: 2rem 0;
    border-left: 6px solid #22c55e;
    box-shadow: 0 4px 20px rgba(34, 197, 94, 0.1);
    position: relative;
    overflow: hidden;
}

.mission-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100px;
    height: 100px;
    background: rgba(34, 197, 94, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.mission-section h3 {
    color: #15803d;
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.mission-section h3::before {
    content: '🎯';
    font-size: 1.5rem;
}

.mission-content {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    border: 2px solid #dcfce7;
    box-shadow: 0 2px 10px rgba(34, 197, 94, 0.1);
}

.mission-content .prose ol {
    counter-reset: mission-counter;
    list-style: none;
    padding-left: 0;
}

.mission-content .prose ol li {
    counter-increment: mission-counter;
    margin: 1.5rem 0;
    padding: 1.25rem;
    background: #f8fafc;
    border-radius: 12px;
    border-left: 4px solid #22c55e;
    position: relative;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.mission-content .prose ol li::before {
    content: counter(mission-counter);
    position: absolute;
    left: -20px;
    top: 50%;
    transform: translateY(-50%);
    background: #22c55e;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    box-shadow: 0 2px 8px rgba(34, 197, 94, 0.3);
}

.description-section {
    background: #f8fafc;
    padding: 2rem;
    border-radius: 12px;
    margin: 2rem 0;
    border: 1px solid #e2e8f0;
}

.description-section .prose p {
    margin-bottom: 1.25rem;
    color: #4b5563;
}

.description-section .prose em {
    color: #1e40af;
    font-weight: 600;
    font-style: normal;
    background: linear-gradient(120deg, rgba(59, 130, 246, 0.1) 0%, rgba(147, 197, 253, 0.1) 100%);
    padding: 2px 6px;
    border-radius: 4px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .vision-section,
    .mission-section {
        padding: 1.5rem;
        margin: 1.5rem 0;
    }
    
    .vision-section h3,
    .mission-section h3 {
        font-size: 1.25rem;
    }
    
    .vision-content,
    .mission-content {
        padding: 1rem;
    }
    
    .mission-content .prose ol li::before {
        left: -15px;
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
    
    .vision-content::before,
    .vision-content::after {
        font-size: 2rem;
    }
}

@media (max-width: 480px) {
    .description-section {
        padding: 1.5rem;
    }
    
    .mission-content .prose ol li {
        padding: 1rem;
        margin: 1rem 0;
    }
}
</style>
@endpush

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center ">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                {{ $visionMission->title ?? 'Visi Misi Desa' }}
            </h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        {{-- Main Content --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8 md:p-12">
                
                {{-- Description Section --}}
                @if($visionMission && !empty($visionMission->description))
                <div class="description-section">
                    <div class="prose prose-lg max-w-none vision-mission-content">
                        {!! $visionMission->description !!}
                    </div>
                </div>
                @endif

                {{-- Vision Section --}}
                @if($visionMission && !empty($visionMission->vision_content))
                <div class="vision-section">
                    <h3>
                        {{ $visionMission->vision_title ?? 'Visi' }}
                    </h3>
                    <div class="vision-content">
                        <div class="prose prose-lg max-w-none vision-mission-content">
                            {!! $visionMission->vision_content !!}
                        </div>
                    </div>
                </div>
                @endif

                {{-- Mission Section --}}
                @if($visionMission && !empty($visionMission->mission_content))
                <div class="mission-section">
                    <h3>
                        {{ $visionMission->mission_title ?? 'Misi' }}
                    </h3>
                    <div class="mission-content">
                        <div class="prose prose-lg max-w-none vision-mission-content">
                            {!! $visionMission->mission_content !!}
                        </div>
                    </div>
                </div>
                @endif

                {{-- Commitment Section --}}
                <div class="mt-12 text-center">
                    <div class="bg-gradient-to-r from-blue-600 to-green-600 rounded-lg p-8 text-white">
                        <h3 class="text-xl font-bold mb-4">Komitmen Kami</h3>
                        <p class="text-lg">
                            Bersama-sama mewujudkan visi dan misi Desa Pokoh Kidul untuk kemajuan dan kesejahteraan masyarakat yang berkelanjutan.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection