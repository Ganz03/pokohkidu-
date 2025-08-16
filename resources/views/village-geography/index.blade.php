@extends('layouts.app')

@section('title', $villageGeography->title ?? 'Geografis Desa Pokoh Kidul')

@push('styles')
<style>
/* Enhanced typography for better readability */
.geography-content {
    text-align: justify;
    line-height: 1.8;
    color: #374151;
}

.geography-content .prose {
    max-width: none;
}

.geography-content .prose p {
    margin-bottom: 1.5rem;
    text-align: justify;
    line-height: 1.8;
}

.geography-content .prose h1,
.geography-content .prose h2,
.geography-content .prose h3,
.geography-content .prose h4,
.geography-content .prose h5,
.geography-content .prose h6 {
    color: #1e40af;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
    padding-left: 1rem;
    border-left: 4px solid #3b82f6;
    background: #f8fafc;
    padding: 1rem;
    border-radius: 8px;
}

.geography-content .prose strong {
    color: #1e40af;
    font-weight: 600;
}

.geography-content .prose ul,
.geography-content .prose ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.geography-content .prose li {
    margin: 0.75rem 0;
    text-align: justify;
    line-height: 1.7;
}

.geography-content .prose table {
    width: 100%;
    border-collapse: collapse;
    margin: 2rem 0;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.geography-content .prose table th {
    background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    color: white;
    padding: 1rem;
    text-align: center;
    font-weight: 600;
    border: 1px solid #dbeafe;
}

.geography-content .prose table td {
    padding: 0.875rem;
    text-align: center;
    border: 1px solid #f1f5f9;
    vertical-align: middle;
}

.geography-content .prose table tbody tr:nth-child(even) {
    background: #f8fafc;
}

.geography-content .prose table tbody tr:hover {
    background: #e0f2fe;
    transform: scale(1.01);
    transition: all 0.2s ease;
}

.geography-content .prose table td:first-child {
    background: #eff6ff;
    font-weight: 600;
    color: #1e40af;
}

.coordinates-info {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 1.5rem;
    border-radius: 12px;
    margin: 2rem 0;
    text-align: center;
    border-left: 6px solid #f59e0b;
}

.coordinates-info p {
    margin: 1rem 0;
    color: #92400e;
    font-weight: 500;
}

.map-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #3b82f6;
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    margin-top: 1rem;
}

.map-link:hover {
    background: #2563eb;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    color: white;
    text-decoration: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .geography-content .prose h3 {
        font-size: 1.25rem;
        padding: 0.75rem;
    }
    
    .geography-content .prose table th,
    .geography-content .prose table td {
        padding: 0.5rem;
        font-size: 0.875rem;
    }
    
    .coordinates-info {
        padding: 1rem;
    }
}

@media (max-width: 480px) {
    .geography-content .prose table {
        font-size: 0.75rem;
    }
    
    .geography-content .prose table th,
    .geography-content .prose table td {
        padding: 0.25rem;
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
                {{ $villageGeography->title ?? 'Geografis Desa Pokoh Kidul' }}
            </h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        {{-- Main Content --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8 md:p-12">
                
                {{-- Content --}}
                @if($villageGeography && !empty($villageGeography->content))
                <div class="geography-content mb-12">
                    <div class="prose prose-lg max-w-none">
                        {!! $villageGeography->content !!}
                    </div>
                </div>
                @endif  
            </div>
        </div>

    </div>
</div>
@endsection