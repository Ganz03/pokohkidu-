@extends('layouts.app')

@section('title', $aboutPage->title ?? 'Tentang Kami')

@push('styles')
<style>
.prose table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
}

.prose table td {
    padding: 0.75rem;
    vertical-align: top;
    border-bottom: 1px solid #e5e7eb;
}

.prose table td:first-child {
    width: 140px;
    font-weight: 600;
    color: #374151;
}

.prose table td:nth-child(2) {
    width: 20px;
    text-align: center;
    color: #6b7280;
}

.prose table td:nth-child(3) {
    color: #4b5563;
}

.prose ul {
    margin: 1.5rem 0;
    padding-left: 1.5rem;
}

.prose ul li {
    margin: 0.75rem 0;
    line-height: 1.7;
}

/* Enhanced typography for better readability */
.about-content {
    text-align: justify;
    line-height: 1.8;
    color: #374151;
}

.about-content .prose {
    max-width: none;
}

.about-content .prose p {
    margin-bottom: 1.5rem;
    text-indent: 2rem;
    text-align: justify;
    line-height: 1.8;
}

.about-content .prose p:first-child {
    text-indent: 0;
    font-weight: 500;
    color: #1f2937;
}

.about-content .prose h1,
.about-content .prose h2,
.about-content .prose h3,
.about-content .prose h4,
.about-content .prose h5,
.about-content .prose h6 {
    color: #1e40af;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.about-content .prose h3 {
    font-size: 1.25rem;
    border-left: 4px solid #3b82f6;
    padding-left: 1rem;
    background: #f8fafc;
    padding: 1rem;
    border-radius: 8px;
}

.about-content .prose strong {
    color: #1e40af;
    font-weight: 600;
}

.about-content .prose ul,
.about-content .prose ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.about-content .prose li {
    margin: 0.5rem 0;
    text-align: justify;
    line-height: 1.7;
}

.geographic-section {
    background: #f8fafc;
    padding: 2rem;
    border-radius: 12px;
    margin: 2rem 0;
    border-left: 4px solid #3b82f6;
}

.geographic-section h3 {
    color: #1e40af;
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.border-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin: 1.5rem 0;
}

.border-item {
    background: white;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.border-item strong {
    color: #1e40af;
    display: block;
    margin-bottom: 0.5rem;
}

.coordinates-info {
    background: #eff6ff;
    padding: 1.5rem;
    border-radius: 10px;
    margin: 1.5rem 0;
    border: 1px solid #dbeafe;
}

.climate-info {
    background: #f0fdf4;
    padding: 1.5rem;
    border-radius: 10px;
    margin: 1.5rem 0;
    border: 1px solid #dcfce7;
}

.agriculture-info {
    background: #fefdf8;
    padding: 1.5rem;
    border-radius: 10px;
    margin: 1.5rem 0;
    border: 1px solid #fde68a;
}

/* Debug styles */
.debug-info {
    background: #fef2f2;
    border: 1px solid #fecaca;
    border-radius: 8px;
    padding: 1rem;
    margin: 1rem 0;
    font-family: monospace;
    font-size: 12px;
}
</style>
@endpush

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                {{ $aboutPage->title ?? 'Tentang Kami' }}
            </h1>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        {{-- Main Content --}}
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-8 md:p-12">
                
                {{-- About Content --}}
                <div class="about-content mb-12">
                    @if(isset($aboutPage) && !empty($aboutPage->content))
                        <div class="prose prose-lg max-w-none">
                            {!! $aboutPage->content !!}
                        </div>
                    @else
                        {{-- Fallback content if database is empty --}}
                        <div class="prose prose-lg max-w-none">
                            <p class="text-lg font-medium text-gray-800 mb-6">
                                Secara administratif Desa Pokoh Kidul Kecamatan Wonogiri merupakan salah satu Desa dari 251 Desa di Kabupaten Wonogiri, yang mempunyai jarak 4 km dari kota kabupaten, memiliki luas 1.346,1850 ha.
                            </p>
                            
                            <div class="geographic-section">
                                <h3>Batas Wilayah Desa</h3>
                                <p class="mb-4">Secara geografis Desa Pokoh Kidul sendiri terletak di perbatasan dengan:</p>
                                
                                <div class="border-info">
                                    <div class="border-item">
                                        <strong>Sebelah Utara:</strong>
                                        <span>Desa Purworejo, Wonogiri</span>
                                    </div>
                                    <div class="border-item">
                                        <strong>Sebelah Timur:</strong>
                                        <span>Desa Pondok, Ngadirojo</span>
                                    </div>
                                    <div class="border-item">
                                        <strong>Sebelah Selatan:</strong>
                                        <span>Desa Pondok Sari, Nguntoronadi</span>
                                    </div>
                                    <div class="border-item">
                                        <strong>Sebelah Barat:</strong>
                                        <span>Kelurahan Giritirto, Wonogiri</span>
                                    </div>
                                </div>
                            </div>

                            <div class="coordinates-info">
                                <h4 class="font-semibold text-blue-800 mb-3">Koordinat dan Topografi</h4>
                                <p>
                                    Secara astronomis Desa Pokoh Kidul terletak antara -7.831476 Lintang Selatan (LS) dan antara 110.9399 Bujur Timur (BT) dan secara Topografis Desa Pokoh Kidul mempunyai ketinggian 158 m dari permukaan laut. Sebagian besar topografi tidak rata dengan kemiringan rata-rata 30°, sehingga terdapat perbedaan antara kawasan yang satu dengan kawasan lainnya yang membuat kondisi sumber daya alam saling berbeda.
                                </p>
                            </div>

                            <div class="climate-info">
                                <h4 class="font-semibold text-green-800 mb-3">Kondisi Iklim</h4>
                                <p>
                                    Sesuai dengan letak geografis, dipengaruhi iklim daerah tropis yang dipengaruhi oleh angin muson dengan 2 musim, yaitu musim kemarau pada bulan April – September dan musim penghujan antara bulan Oktober – Maret.
                                </p>
                            </div>

                            <div class="agriculture-info">
                                <h4 class="font-semibold text-yellow-800 mb-3">Penggunaan Lahan</h4>
                                <p>
                                    Pengolahan lahan untuk persawahan kebanyakan di daerah dataran yang sering terkena banjir dan daerah dataran kaki perbukitan. Sedangkan penggunaan lahan untuk permukiman perumahan penduduk sebagian besar di daerah tegalan. Selain untuk perumahan warga penggunaan lahan tegalan ditanami dengan tanaman keras seperti jati, mahoni, dan sonokeling. Selain itu juga ditanami dengan tanaman musiman seperti jagung, kacang tanah, ubi kayu, dan kedelai.
                                </p>
                            </div>
                        </div>
                        
                        @if(config('app.debug'))
                        <div class="debug-info">
                            <strong>NOTICE:</strong> Content from database is empty. Showing fallback content.
                        </div>
                        @endif
                    @endif
                </div>

                {{-- Office Info --}}
                @if(isset($aboutPage) && !empty($aboutPage->office_info))
                <div class="border-t border-gray-200 pt-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kantor Desa</h3>
                    <div class="prose prose-lg max-w-none">
                        {!! $aboutPage->office_info !!}
                    </div>
                </div>
                @endif

                {{-- Map Section --}}
                <div class="border-t border-gray-200 pt-8 mt-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Lokasi Desa</h3>
                    <div class="bg-gray-100 rounded-lg p-6 text-center">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                        </div>
                        <p class="text-gray-600">
                            Koordinat: -7.831476, 110.9399<br>
                            Karangtalun RT.001/003, Pokoh Kidul, Wonogiri
                        </p>
                        <a href="https://maps.google.com/?q=-7.831476,110.9399" target="_blank" 
                           class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Lihat di Google Maps
                        </a>
                    </div>
                </div>

                {{-- Contact Info Cards --}}
                <div class="grid md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-blue-50 rounded-lg p-6 text-center">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Telepon</h4>
                        <p class="text-gray-600">082324257542</p>
                    </div>
                    
                    <div class="bg-green-50 rounded-lg p-6 text-center">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Email</h4>
                        <p class="text-gray-600">pokohkidulwonogiri@gmail.com</p>
                    </div>
                    
                    <div class="bg-purple-50 rounded-lg p-6 text-center">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-globe text-white"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Website</h4>
                        <p class="text-gray-600">pokohkidul.desa.id</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection