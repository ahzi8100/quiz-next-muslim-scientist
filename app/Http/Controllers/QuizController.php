<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $questions = [
            [
                'q' => 'Kalau kamu punya waktu luang, apa yang paling kamu suka lakukan?',
                'options' => [
                    ['text' => 'Memperbaiki barang rusak/merakit sesuatu', 'type' => 'Al-Jazari', 'img' => 'merakit.jpeg'],
                    ['text' => 'Membaca buku tentang cara kerja tubuh/alam', 'type' => 'Ibnu Sina', 'img' => 'readbook.webp'],
                    ['text' => 'Menghitung strategi game atau teka-teki', 'type' => 'Al-Khawarizmi', 'img' => 'game.jpg'],
                    ['text' => 'Bereksperimen dengan zat atau cairan', 'type' => 'Jabir Ibn Hayyan', 'img' => 'chemistry.jpg'],
                ]
            ],
            [
                'q' => 'Apa pelajaran sekolah yang menurutmu paling seru?',
                'options' => [
                    ['text' => 'Matematika atau TIK', 'type' => 'Al-Khawarizmi', 'img' => 'math.jpeg'],
                    ['text' => 'Biologi atau Kimia', 'type' => 'Al-Razi', 'img' => 'biology.jpg'],
                    ['text' => 'Fisika atau Astronomi', 'type' => 'Al-Battani', 'img' => 'fisika.jpg'],
                    ['text' => 'Sejarah atau Sosiologi', 'type' => 'Ibnu Khaldun', 'img' => 'history.jpg'],
                ]
            ],
            [
                'q' => 'Jika kamu menemukan masalah di lingkungan sekolah, apa reaksimu?',
                'options' => [
                    ['text' => 'Membuat alat otomatis untuk solusinya', 'type' => 'Al-Jazari', 'img' => 'engineer.jpg'],
                    ['text' => 'Meneliti penyebab mendalam secara ilmiah', 'type' => 'Ibnu Al-Haytham', 'img' => 'researcher.jpg'],
                    ['text' => 'Mengajak diskusi untuk solusi masyarakat', 'type' => 'Ibnu Khaldun', 'img' => 'negotiation.webp'],
                    ['text' => 'Menulis pemikiran filosofis tentang masalah itu', 'type' => 'Ibnu Rusyd', 'img' => 'filosof.jfif'],
                ]
            ],
            [
                'q' => 'Apa impian terbesarmu di masa depan?',
                'options' => [
                    ['text' => 'Menemukan obat untuk penyakit berbahaya', 'type' => 'Ibnu Sina', 'img' => 'farmasi.png'],
                    ['text' => 'Menciptakan teknologi transportasi masa depan', 'type' => 'Abbas Ibn Firnas', 'img' => 'dronecar.jpg'],
                    ['text' => 'Menjadi pemimpin/pemikir perdamaian dunia', 'type' => 'Ibnu Rusyd', 'img' => 'politician.jpg'],
                    ['text' => 'Menjadi ahli bedah legendaris', 'type' => 'Al-Zahrawi', 'img' => 'doctorbedah.jpg'],
                ]
            ],
            [
                'q' => 'Jika punya laboratorium, benda apa yang wajib ada?',
                'options' => [
                    ['text' => 'Alat bedah dan perlengkapan medis', 'type' => 'Al-Zahrawi', 'img' => 'alatbedah.jpg'],
                    ['text' => 'Tabung reaksi dan pembakar spiritus', 'type' => 'Jabir Ibn Hayyan', 'img' => 'tabungreaksi.jpg'],
                    ['text' => 'Lensa, cermin, dan alat ukur cahaya', 'type' => 'Ibnu Al-Haytham', 'img' => 'lensa.webp'],
                    ['text' => 'Teleskop untuk melihat bintang', 'type' => 'Al-Battani', 'img' => 'teleskop.webp'],
                ]
            ],
            [
                'q' => 'Bagaimana caramu melihat bintang di langit malam?',
                'options' => [
                    ['text' => 'Penasaran dengan koordinat posisinya', 'type' => 'Al-Biruni', 'img' => 'kompas.jpg'],
                    ['text' => 'Ingin terbang ke sana dengan alat buatan sendiri', 'type' => 'Abbas Ibn Firnas', 'img' => 'pesawat.webp'],
                    ['text' => 'Menghitung orbit dan waktu rotasinya', 'type' => 'Al-Battani', 'img' => 'orbit.jpg'],
                    ['text' => 'Mengagumi keagungan penciptaan-Nya', 'type' => 'Al-Razi', 'img' => 'mengagumi.jpg'],
                ]
            ],
            [
                'q' => 'Jenis buku apa yang paling cepat kamu habiskan?',
                'options' => [
                    ['text' => 'Tutorial robotik atau mesin', 'type' => 'Al-Jazari', 'img' => 'robotik.avif'],
                    ['text' => 'Biografi tokoh atau sejarah bangsa', 'type' => 'Ibnu Khaldun', 'img' => 'sejarahbangsa.jpg'],
                    ['text' => 'Ensiklopedia kesehatan atau obat', 'type' => 'Ibnu Sina', 'img' => 'kesehatan.jpeg'],
                    ['text' => 'Buku rumus cepat matematika', 'type' => 'Al-Khawarizmi', 'img' => 'bukumath.jpg'],
                ]
            ],
            [
                'q' => 'Saat temanmu sakit, apa yang pertama kamu lakukan?',
                'options' => [
                    ['text' => 'Memberikan saran obat atau perawatan', 'type' => 'Al-Razi', 'img' => 'perawatan.jpg'],
                    ['text' => 'Menganalisis pola makan dan lingkungannya', 'type' => 'Ibnu Sina', 'img' => 'analisis.jpg'],
                    ['text' => 'Menghiburnya dengan kata-kata bijak', 'type' => 'Ibnu Rusyd', 'img' => 'motivator.webp'],
                    ['text' => 'Membuatkan alat bantu untuk memudahkan geraknya', 'type' => 'Al-Jazari', 'img' => 'alatbantu.webp'],
                ]
            ],
            [
                'q' => 'Di museum, bagian mana yang paling ingin dikunjungi?',
                'options' => [
                    ['text' => 'Replika mesin otomatis dan jam kuno', 'type' => 'Al-Jazari', 'img' => 'mesin.jpeg'],
                    ['text' => 'Peta dunia kuno dan alat navigasi', 'type' => 'Al-Biruni', 'img' => 'peta.webp'],
                    ['text' => 'Naskah kedokteran dan anatomi', 'type' => 'Al-Zahrawi', 'img' => 'kedokteran.jpg'],
                    ['text' => 'Teori cahaya dan kamera obscura', 'type' => 'Ibnu Al-Haytham', 'img' => 'kameraobscura.jpg'],
                ]
            ],
            [
                'q' => 'Apa prinsip hidup yang paling kamu setujui?',
                'options' => [
                    ['text' => 'Ilmu pengetahuan harus dipraktikkan (alat)', 'type' => 'Al-Jazari', 'img' => 'dipraktikkan.jpeg'],
                    ['text' => 'Logika adalah bahasa semesta', 'type' => 'Al-Khawarizmi', 'img' => 'logika.jpg'],
                    ['text' => 'Kesehatan adalah mahkota manusia', 'type' => 'Ibnu Sina', 'img' => 'kesehatan.jfif'],
                    ['text' => 'Keberanian untuk mencoba hal mustahil', 'type' => 'Abbas Ibn Firnas', 'img' => 'berani.jpg'],
                ]
            ],
        ];

        return view('quiz', compact('questions'));
    }
}
