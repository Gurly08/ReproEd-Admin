<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder for soal
        // \App\Models\Soal::factory(120)->create();

        $soalKesehatanReproduksi = [
            'Apakah menjaga kebersihan organ reproduksi penting untuk mencegah infeksi?',
            'Apakah penting bagi remaja untuk belajar tentang kesehatan reproduksi?',
            'Apakah alat kontrasepsi membantu mencegah kehamilan yang tidak diinginkan?',
            'Apakah kebersihan organ reproduksi yang buruk bisa menyebabkan infeksi?',
            'Apakah gizi yang cukup penting selama masa pubertas untuk pertumbuhan yang optimal?',
            'Apakah produk kebersihan yang tidak cocok dapat menyebabkan iritasi pada organ reproduksi?',
            'Apakah pola hidup sehat penting selama masa pubertas?',
            'Apakah mengenali tanda-tanda pubertas membantu remaja mempersiapkan diri untuk perubahan tersebut?',
            'Apakah penting membicarakan kesehatan reproduksi dengan orang tua atau guru?',
            'Apakah olahraga teratur membantu menjaga kesehatan organ reproduksi?',
            'Apakah menjaga asupan air penting untuk kesehatan reproduksi?',
            'Apakah penting menghindari produk kimia berbahaya untuk kesehatan reproduksi?',
            'Apakah tidur yang cukup berpengaruh pada kesehatan reproduksi?',
            'Apakah penting untuk menjalani pemeriksaan kesehatan reproduksi secara rutin?',
            'Apakah infeksi saluran kemih bisa mempengaruhi kesehatan reproduksi?',
            'Apakah penting untuk mengetahui informasi tentang penyakit menular seksual?',
            'Apakah stres dapat mempengaruhi siklus menstruasi?',
            'Apakah penggunaan pakaian dalam yang bersih penting untuk kesehatan reproduksi?',
            'Apakah merokok dapat mempengaruhi kesehatan reproduksi?',
            'Apakah mengkonsumsi alkohol dapat mempengaruhi kesehatan reproduksi?',
        ];

        $soalPenyebabKehamilan = [
            'Apakah kehamilan terjadi karena pertemuan antara sel sperma dan sel telur?',
            'Apakah penting mengetahui tanda-tanda awal kehamilan?',
            'Apakah kehamilan di usia remaja dapat membawa risiko kesehatan?',
            'Apakah penting untuk berkonsultasi dengan dokter selama kehamilan?',
            'Apakah kehamilan yang tidak direncanakan dapat mempengaruhi kesehatan mental?',
            'Apakah kurangnya gizi selama kehamilan dapat mempengaruhi perkembangan janin?',
            'Apakah penting bagi ibu hamil untuk menjaga pola makan yang sehat?',
            'Apakah konsumsi alkohol selama kehamilan berbahaya bagi janin?',
            'Apakah merokok selama kehamilan dapat membahayakan perkembangan janin?',
            'Apakah penting untuk mengetahui metode kontrasepsi untuk mencegah kehamilan yang tidak diinginkan?',
            'Apakah kehamilan dapat menyebabkan perubahan hormon yang signifikan?',
            'Apakah kehamilan dapat menyebabkan perubahan fisik yang signifikan?',
            'Apakah penting bagi ibu hamil untuk menghindari stres berlebih?',
            'Apakah olahraga ringan dapat membantu menjaga kesehatan selama kehamilan?',
            'Apakah penting bagi ibu hamil untuk mendapatkan dukungan emosional dari keluarga?',
            'Apakah penting mengetahui tanda-tanda kehamilan ektopik?',
            'Apakah kehamilan dapat menyebabkan perubahan pola tidur?',
            'Apakah penting bagi ibu hamil untuk menghindari makanan mentah atau setengah matang?',
            'Apakah infeksi selama kehamilan dapat mempengaruhi kesehatan janin?',
            'Apakah penting bagi ibu hamil untuk rutin memeriksakan kandungannya?'
        ];

        $soalPerubahanEmosi = [
            'Apakah pubertas dapat menyebabkan perubahan emosi pada remaja?',
            'Apakah penting untuk membicarakan perasaan dengan orang tua atau teman selama masa pubertas?',
            'Apakah perubahan hormon selama pubertas dapat mempengaruhi suasana hati?',
            'Apakah stres dapat mempengaruhi kesehatan emosional selama pubertas?',
            'Apakah penting bagi remaja untuk memiliki kegiatan yang menyenangkan untuk mengelola stres?',
            'Apakah perubahan fisik selama pubertas dapat mempengaruhi rasa percaya diri?',
            'Apakah penting bagi remaja untuk mengenali tanda-tanda stres?',
            'Apakah tidur yang cukup penting untuk kesehatan emosional?',
            'Apakah olahraga dapat membantu mengurangi stres pada remaja?',
            'Apakah remaja bisa mengalami perubahan suasana hati yang drastis selama pubertas?',
            'Apakah penting bagi remaja untuk belajar teknik relaksasi?',
            'Apakah diet yang seimbang dapat mempengaruhi suasana hati?',
            'Apakah perubahan emosi bisa membuat remaja merasa bingung?',
            'Apakah penting untuk berbicara dengan konselor jika mengalami masalah emosional?',
            'Apakah remaja perlu memahami bahwa perubahan emosi selama pubertas adalah normal?',
            'Apakah dukungan teman dapat membantu mengatasi perubahan emosi?',
            'Apakah meditasi dapat membantu menenangkan pikiran?',
            'Apakah penting untuk mengetahui cara mengelola kemarahan?',
            'Apakah masalah emosional dapat mempengaruhi performa akademik?',
            'Apakah berbagi cerita dengan teman bisa membantu mengurangi stres?',
        ];

        foreach ($soalKesehatanReproduksi as $pertanyaan) {
            \App\Models\Soal::create([
                'pertanyaan' => $pertanyaan,
                'kategori' => 'kesehatan_reproduksi',
                'jawaban_a' => 'iya',
                'jawaban_b' => 'tidak',
                'kunci' => 'a',
            ]);
        }

        foreach ($soalPenyebabKehamilan as $pertanyaan) {
            \App\Models\Soal::create([
                'pertanyaan' => $pertanyaan,
                'kategori' => 'penyebab_kehamilan',
                'jawaban_a' => 'iya',
                'jawaban_b' => 'tidak',
                'kunci' => 'a',
            ]);
        }

        foreach ($soalPerubahanEmosi as $pertanyaan) {
            \App\Models\Soal::create([
                'pertanyaan' => $pertanyaan,
                'kategori' => 'perubahan_emosi',
                'jawaban_a' => 'iya',
                'jawaban_b' => 'tidak',
                'kunci' => 'a',
            ]);
        }
    }
}
