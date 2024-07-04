@extends('layouts.form')

@section('content')
    <div class="sticky z-30 top-0 pt-8 pb-4 bg-custom-white">
        {{-- Close or Back --}}
        <a href="/user-profile"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path fill="#040B0D" d="M205.66 194.34a8 8 0 0 1-11.32 11.32L128 139.31l-66.34 66.35a8 8 0 0 1-11.32-11.32L116.69 128L50.34 61.66a8 8 0 0 1 11.32-11.32L128 116.69l66.34-66.35a8 8 0 0 1 11.32 11.32L139.31 128Z"/></svg></a>
    </div>

    <div class="swiper mt-2 z-10">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="bg-custom-white flex flex-col gap-6">
                    <h1 class="text-3xl lg:text-4xl/snug tracking-tight text-custom-dark font-encode font-semibold">Persyaratan untuk menjadi lembaga kursus mengemudi</h1>
                    <p class="text-custom-dark text-lg/snug font-medium font-league lg:text-xl">Anda bisa menjadi instruktur dengan menerima undangan mengajar dari lembaga kursus yang sudah terdaftar di aplikasi. <span class="text-custom-green">Bagaimana mendapat undangan mengajar?</span>

                    <br> <br>

                    Atau anda bisa mendaftarkan jasa anda di aplikasi ini. Anda wajib mengupload dokumen Izin Penyelenggaraan Pendidikan dan Pelatihan Mengemudi Kendaraan Bermotor sebagaimana yang diatur pada <strong>Peraturan Daerah Kota Surabaya No. 22 Tahun 2012.</strong>

                    <br> <br>
                        
                    Dokumen yang anda submit akan kami tinjau paling lama 1 hari (24 Jam), setiap kemajuan dan masalah yang kami temui akan kami notifikasikan ke anda.</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-custom-white mb-6">
                    <h1 class="text-3xl lg:text-4xl/snug tracking-tight text-custom-dark font-encode font-semibold">Upload Dokumen Izin Penyelenggaraan Anda</h1>
                </div>
                <label for="drivingSchoolLicense" class="flex flex-col items-center justify-center w-full h-[21rem] border-2 border-custom-grey border-dashed rounded-lg cursor-pointer bg-custom-disabled-light">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="none" stroke="#646464" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15c0 2.828 0 4.243.879 5.121C4.757 21 6.172 21 9 21h6c2.828 0 4.243 0 5.121-.879C21 19.243 21 17.828 21 15m-9 1V3m0 0l4 4.375M12 3L8 7.375"/></svg>
                        <p class="mt-4 mb-2 text-base text-center text-custom-grey"><span class="font-semibold">Tekan untuk memilih file yang akan diupload</span> atau seret file anda ke area ini</p>
                        <p class="text-sm text-custom-grey">PDF (MAX. 5 MB)</p>
                    </div>
                    <input id="drivingSchoolLicense" type="file" class="hidden" />
                </label>   
                <div class="flex flex-col gap-1 mt-5">
                    <label for="endDate" class="font-semibold font-league text-xl text-custom-grey">Username<span class="text-custom-destructive">*</span></label>
                    <input type="date" name="endDate" id="endDate" placeholder="Cocokkan dengan tanggal berakhir dokumen anda" class="p-4 font-league font-medium text-lg text-custom-secondary placeholder:#48484833 rounded-lg @error('endDate') border-2 border-custom-destructive @enderror">
                </div>
            </div>
        </div>
    </div>   

    <div class="flex flex-row sticky z-20 bottom-0 py-4 items-center justify-between bg-custom-white mt-3">
        <button type="button" id="continue" class="w-full py-3 rounded-lg lg:rounded-lg bg-custom-green hover:bg-custom-green-hover text-center lg:text-lg text-custom-white-hover font-semibold lg:order-2 duration-500">Lanjutkan</button>
        <button type="submit" id="sendDocument" class="hidden w-full py-3 rounded-lg lg:rounded-lg bg-custom-green hover:bg-custom-green-hover text-center lg:text-lg text-custom-white-hover font-semibold lg:order-2 duration-500">Proses Dokumen</button>
    </div>

    {{-- jQuery JS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    {{-- Swiper CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: false,
            allowSlidePrev: false,

            navigation: {
                nextEl: '#continue',
            },

            on: {
                slideChange: function() {
                    const currentSlide = swiper.activeIndex + 1;
                    const isLastSlide = currentSlide === swiper.slides.length; 

                    document.getElementById('continue').style.display = isLastSlide ? 'none' : 'block';
                    document.getElementById('sendDocument').style.display = isLastSlide ? 'block' : 'none';
                }
            }
        })
    </script>
@endsection