<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Next Muslim Scientist Quiz</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

    <div x-data="quizData()" class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full overflow-hidden">

        <div class="h-3 bg-emerald-500"></div>

        <div class="p-8">
            <div x-show="step === 'start'" class="text-center">
                <img src="/img/assets/hero-scientist.png" alt="Ilmuwan Muslim"
                    class="w-64 h-64 mx-auto mb-6 object-contain">
                <h1 class="text-3xl font-black text-slate-800 mb-2">The Next Muslim Scientist</h1>
                <p class="text-slate-500 mb-8 leading-relaxed">Temukan potensi hebat dalam dirimu yang tersembunyi di
                    balik jejak para ilmuwan besar dunia Islam.</p>
                <button @click="step = 'play'"
                    class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition-all">Mulai
                    Petualangan</button>
            </div>

            <div x-show="step === 'play'" x-cloak>
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex-1 h-3 bg-emerald-100 rounded-full">
                        <div class="h-3 bg-emerald-500 rounded-full transition-all duration-500"
                            :style="`width: ${((currentQ + 1) / questions.length) * 100}%`
                            text - align: left;">
                        </div>
                    </div>
                    <span class="text-sm font-bold text-emerald-600"
                        x-text="`${currentQ + 1}/${questions.length}`"></span>
                </div>

                <h2 class="text-2xl font-bold text-slate-800 mb-8" x-text="questions[currentQ].q"></h2>

                <div class="grid grid-cols-2 gap-4">
                    <template x-for="opt in questions[currentQ].options" :key="opt.text">
                        <button @click="answer(opt.type)"
                            class="group relative flex flex-col items-center bg-white border-2 border-slate-100 rounded-2xl p-3 hover:border-emerald-500 hover:bg-emerald-50 transition-all">
                            <img :src="'{{ asset('img/assets') }}/' + opt.img"
                                class="w-full h-48 object-cover rounded-xl mb-3 grayscale group-hover:grayscale-0 transition">
                            <span class="text-sm font-bold text-slate-600 group-hover:text-emerald-700"
                                x-text="opt.text"></span>
                        </button>
                    </template>
                </div>
            </div>

            <div x-show="step === 'result'" class="text-center" x-cloak>
                <div class="relative inline-block mb-6">
                    <div class="absolute inset-0 bg-emerald-200 rounded-full blur-2xl opacity-50"></div>
                    <img :src="`/img/scientists/${winner.toLowerCase().replace(/ /g, '-')}.jpg`" :alt="winner"
                        class="relative w-40 h-40 rounded-full border-4 border-emerald-500 object-cover mx-auto shadow-xl">
                </div>

                <p class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-1">Masa Depanmu Adalah</p>
                <h2 class="text-4xl font-black text-slate-800 mb-4" x-text="winner"></h2>

                <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl mb-8">
                    <p class="text-slate-600 italic leading-relaxed" x-text="descriptions[winner]"></p>
                </div>

                <div class="flex flex-col gap-3">
                    <button @click="reset()"
                        class="bg-emerald-600 text-white py-3 rounded-xl font-bold hover:bg-emerald-700 transition">Main
                        Lagi</button>
                    <button onclick="window.print()" class="text-slate-400 text-sm hover:text-slate-600">Simpan
                        Hasil
                        (PDF)</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script>
        function quizData() {
            return {
                step: 'start',
                currentQ: 0,
                questions: @json($questions),
                scores: {},
                winner: '',
                // Deskripsi tetap sama seperti sebelumnya...
                descriptions: {
                    'Ibnu Sina': 'Bapak Kedokteran Modern. Kamu memiliki jiwa penyembuh dan kecerdasan analisis yang luar biasa tajam.',
                    'Al-Khawarizmi': 'Bapak Aljabar & Algoritma. Kamu adalah pemikir logis yang bisa menyelesaikan masalah kompleks dengan angka.',
                    'Ibnu Al-Haytham': 'Bapak Optik. Kamu skeptis dengan hal yang belum terbukti dan sangat suka melakukan eksperimen ilmiah.',
                    'Al-Zahrawi': 'Bapak Bedah. Ketelitian tanganmu dan inovasimu adalah kunci untuk membantu banyak orang di dunia medis.',
                    'Jabir Ibn Hayyan': 'Bapak Kimia. Kamu suka bereksperimen, mencampur ide-ide baru, dan menemukan keajaiban dari reaksi kimia.',
                    'Abbas Ibn Firnas': 'Sang Pionir Penerbangan. Kamu punya impian setinggi langit dan keberanian untuk mencoba hal yang dianggap mustahil.',
                    'Al-Razi': 'Dokter Klinis Terhebat. Kamu sangat teliti dalam observasi dan selalu mengedepankan bukti nyata.',
                    'Al-Biruni': 'Sang Polymath Astronom. Kamu punya rasa ingin tahu yang luas, mulai dari bentuk bumi hingga posisi bintang.',
                    'Ibnu Rusyd': 'Sang Filosof. Kamu adalah jembatan ilmu pengetahuan yang percaya bahwa agama dan logika bisa berjalan beriringan.',
                    'Ibnu Khaldun': 'Bapak Sosiologi. Kamu peka terhadap fenomena sosial dan sejarah, memahami bagaimana peradaban manusia tumbuh.',
                    'Al-Battani': 'Ahli Astronomi. Hitunganmu sangat akurat, kamu adalah orang yang detail dalam melihat fenomena alam semesta.',
                    'Al-Jazari': 'Bapak Robotik. Kamu kreatif dalam menciptakan alat mekanik otomatis yang memudahkan pekerjaan manusia.'
                },
                answer(type) {
                    this.scores[type] = (this.scores[type] || 0) + 1;
                    if (this.currentQ < this.questions.length - 1) {
                        this.currentQ++;
                    } else {
                        this.calculateResult();
                    }
                },
                calculateResult() {
                    this.winner = Object.keys(this.scores).reduce((a, b) => this.scores[a] > this.scores[b] ? a : b);
                    this.step = 'result';
                },
                reset() {
                    this.step = 'start';
                    this.currentQ = 0;
                    this.scores = {};
                }
            }
        }
    </script>
</body>

</html>
