<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Workshop Batik Tulis Pemula',
                'slug' => 'workshop-batik-tulis-pemula',
                'status' => 'upcoming',
                'event_date' => Carbon::now()->addDays(7),
                'location' => 'Sentra Batik Kauman, Surabaya',
                'organizer' => 'Ikatan Putera Puteri Batik Jawa Timur',
                'max_participants' => 20,
                'description' => 'Workshop batik tulis untuk pemula yang ingin belajar seni membatik tradisional. Peserta akan diajarkan teknik dasar membatik mulai dari malam, canting, hingga pewarnaan.',
                'agenda' => '1. Pengenalan alat dan bahan batik
2. Teknik malam dan canting
3. Praktik membatik sederhana
4. Pewarnaan kain
5. Finishing dan perawatan',
                'contact_email' => 'workshop@batikjatim.org',
                'contact_phone' => '+6281234567890',
                'registration_link' => 'https://wa.me/6281234567890?text=Daftar%20Workshop%20Batik%20Tulis',
                'is_active' => true,
                'is_featured' => true,
                'allow_registration' => true,
                'additional_info' => [
                    'Durasi' => '2 hari (8 jam)',
                    'Biaya' => 'Rp 150.000',
                    'Fasilitas' => 'Alat lengkap, makan siang, sertifikat',
                    'Persyaratan' => 'Tidak ada pengalaman batik'
                ],
                'meta_title' => 'Workshop Batik Tulis Pemula - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Workshop batik tulis untuk pemula di Surabaya. Belajar seni membatik tradisional dengan instruktur berpengalaman.',
            ],
            [
                'title' => 'Pameran Batik Nusantara 2024',
                'slug' => 'pameran-batik-nusantara-2024',
                'status' => 'upcoming',
                'event_date' => Carbon::now()->addDays(14),
                'location' => 'Balai Pemuda Surabaya',
                'organizer' => 'Ikatan Putera Puteri Batik Jawa Timur',
                'max_participants' => 500,
                'description' => 'Pameran batik terbesar di Jawa Timur yang menampilkan koleksi batik dari berbagai daerah di Indonesia. Acara ini menjadi ajang silaturahmi para pengrajin batik.',
                'agenda' => '1. Pembukaan dan sambutan
2. Penampilan kesenian tradisional
3. Pameran koleksi batik
4. Workshop mini batik
5. Penutupan dan doorprize',
                'contact_email' => 'pameran@batikjatim.org',
                'contact_phone' => '+6281234567891',
                'registration_link' => 'https://pameran.batikjatim.org',
                'is_active' => true,
                'is_featured' => true,
                'allow_registration' => true,
                'additional_info' => [
                    'Durasi' => '3 hari',
                    'Biaya masuk' => 'Rp 10.000',
                    'Jam buka' => '09.00 - 17.00 WIB',
                    'Fasilitas' => 'Parkir, toilet, food court'
                ],
                'meta_title' => 'Pameran Batik Nusantara 2024 - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Pameran batik terbesar di Jawa Timur menampilkan koleksi batik dari seluruh Indonesia.',
            ],
            [
                'title' => 'Lomba Desain Batik Kontemporer',
                'slug' => 'lomba-desain-batik-kontemporer',
                'status' => 'upcoming',
                'event_date' => Carbon::now()->addDays(30),
                'location' => 'Universitas Negeri Surabaya',
                'organizer' => 'Ikatan Putera Puteri Batik Jawa Timur & UNESA',
                'max_participants' => 100,
                'description' => 'Lomba desain batik kontemporer untuk mahasiswa dan desainer muda. Tema: "Batik dan Teknologi Digital" dengan hadiah total Rp 25 juta.',
                'agenda' => '1. Registrasi peserta
2. Pengumpulan karya
3. Seleksi awal
4. Presentasi final
5. Pengumuman pemenang',
                'contact_email' => 'lomba@batikjatim.org',
                'contact_phone' => '+6281234567892',
                'registration_link' => 'https://lomba.batikjatim.org',
                'is_active' => true,
                'is_featured' => false,
                'allow_registration' => true,
                'additional_info' => [
                    'Kategori' => 'Mahasiswa & Umum',
                    'Hadiah' => 'Total Rp 25.000.000',
                    'Deadline' => Carbon::now()->addDays(20)->format('d/m/Y'),
                    'Tema' => 'Batik dan Teknologi Digital'
                ],
                'meta_title' => 'Lomba Desain Batik Kontemporer - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Lomba desain batik kontemporer dengan tema "Batik dan Teknologi Digital" hadiah total 25 juta.',
            ],
            [
                'title' => 'Pelatihan Batik untuk Guru',
                'slug' => 'pelatihan-batik-untuk-guru',
                'status' => 'completed',
                'event_date' => Carbon::now()->subDays(10),
                'location' => 'SMK Batik Surabaya',
                'organizer' => 'Ikatan Putera Puteri Batik Jawa Timur & Dinas Pendidikan',
                'max_participants' => 50,
                'description' => 'Pelatihan batik untuk guru-guru SD dan SMP se-Jawa Timur. Program ini bertujuan untuk meningkatkan kompetensi guru dalam mengajarkan budaya batik.',
                'agenda' => '1. Teori sejarah dan filosofi batik
2. Teknik dasar membatik
3. Metode pengajaran batik di sekolah
4. Praktik membuat media ajar
5. Evaluasi dan sertifikasi',
                'contact_email' => 'pelatihan@batikjatim.org',
                'contact_phone' => '+6281234567893',
                'registration_link' => null,
                'is_active' => false,
                'is_featured' => false,
                'allow_registration' => false,
                'additional_info' => [
                    'Durasi' => '5 hari',
                    'Peserta' => '50 guru',
                    'Sertifikat' => 'Dinas Pendidikan Jawa Timur',
                    'Status' => 'Selesai'
                ],
                'meta_title' => 'Pelatihan Batik untuk Guru - Ikatan Putera Puteri Batik Jawa Timur',
                'meta_description' => 'Pelatihan batik untuk guru-guru se-Jawa Timur dalam rangka meningkatkan kompetensi mengajar budaya batik.',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}