@extends('layouts.form')

@section('content')
    {{-- Forms Header --}}
    <div class="sticky top-0 pt-8 pb-4 bg-custom-white flex flex-col gap-1">
        <h1 class="text-3xl lg:text-4xl/snug tracking-tight text-custom-dark font-encode font-semibold">Ubah Data Profil</h1>
        <p class="text-custom-grey text-lg font-league lg:text-xl">Perbarui informasi personal anda</p>
    </div>

    {{-- Forms --}}
    <form action="/admin-profile/edit" method="post" enctype="multipart/form-data">
        @csrf
        {{-- Form Sub Headers --}}
        <div class="flex flex-col gap-1 mb-4">
            <h2 class="text-xl lg:text-2xl/snug text-custom-dark font-encode font-semibold">Data Personal</h2>
        </div>
        <div class="flex flex-col mt-4 gap-5 lg:gap-7">
            {{-- Input Profile Picture --}}
            <div class="flex flex-col gap-2">
                <label for="hash_for_profile_picture" class="font-semibold font-league text-xl text-custom-grey">Gambar Profil (Optional)</label>
                @if (auth()->user()->hash_for_profile_picture)
                    <img src="{{ asset('storage/profile_pictures/' . auth()->user()->hash_for_profile_picture) }}" alt="profile-picture" class="w-20 lg:w-32 h-20 lg:h-32 object-cover mb-2 rounded-full">
                @endif
                <input type="file" name="hash_for_profile_picture" id="hash_for_profile_picture" class="font-league font-medium text-lg/snug text-custom-secondary placeholder:#48484833">
                @error('hash_for_profile_picture')
                    <span class="text-custom-destructive">{{ $message }}</span>
                @enderror
            </div>
            {{-- Input Full Name --}}
            <div class="flex flex-col gap-1">
                <label for="fullname" class="font-semibold font-league text-xl text-custom-grey">Nama Kursus Mengemudi<span class="text-custom-destructive">*</span></label>
                <input type="text" name="fullname" id="fullname" placeholder="Nama Lengkap" class="p-4 font-league font-medium text-lg/[0] text-custom-secondary placeholder:#48484833 rounded-lg @error('fullname') border-2 border-custom-destructive @enderror" autofocus value="{{ auth()->user()->fullname }}">
                @error('fullname')
                    <span class="text-custom-destructive">{{ $message }}</span>
                @enderror
            </div>
            {{-- Input Username --}}
            <div class="flex flex-col gap-1">
                <label for="username" class="font-semibold font-league text-xl text-custom-grey">Username<span class="text-custom-destructive">*</span></label>
                <input type="text" name="username" id="username" placeholder="user_name_123" class="p-4 font-league font-medium text-lg/[0] text-custom-secondary placeholder:#48484833 rounded-lg @error('username') border-2 border-custom-destructive @enderror" value="{{ auth()->user()->username }}">
                @error('username')
                    @if ($message === 'The username has already been taken.')
                        <span class="text-custom-destructive">{{ $message }}</span>    
                    @else
                        <span class="text-custom-destructive">{{ $message }}</span>
                    @endif
                @enderror
            </div>
            {{-- Input Description --}}
            <div class="flex flex-col gap-1">
                <label for="description" class="font-semibold font-league text-xl text-custom-grey">Deskripsi (opsional)</label>
                <textarea name="description" id="description" rows="5" placeholder="Buat personal anda menarik" class="px-4 py-3.5 h-36 font-league font-medium text-lg/snug text-custom-secondary placeholder:#48484833 resize-none rounded-lg @error('description') border-2 border-custom-destructive @enderror">{{ auth()->user()->description }}</textarea>
                @error('description')
                    <span class="text-custom-destructive">{{ $message }}</span>
                @enderror
            </div>
            {{-- Input Phone Number --}}
            <div class="flex flex-col gap-1">
                <label for="phone_number" class="font-semibold font-league text-xl text-custom-grey">Nomor Whatsapp Aktif<span class="text-custom-destructive">*</span></label>
                <input type="tel" name="phone_number" id="phone_number" placeholder="081818181818" class="w-full p-4 font-league font-medium text-lg/[0] text-custom-secondary placeholder:#48484833 rounded-lg @error('phone_number') border-2 border-custom-destructive @enderror" value="{{ auth()->user()->phone_number }}">
                @error('phone_number')
                    <span class="text-custom-destructive">{{ $message }}</span>
                @enderror
            </div>

            {{-- Form Sub Headers --}}
            <div class="flex flex-col gap-1 mt-3">
                <h2 class="text-xl lg:text-2xl/snug text-custom-dark font-encode font-semibold">Keamanan Akun</h2>
            </div>

            {{-- Input Password --}}
            <div class="flex flex-col gap-1">
                <label for="password" class="font-semibold font-league text-xl text-custom-grey">Masukkan Password Baru</label>
                <div class="relative flex justify-end items-center">
                    <input type="password" name="password" id="password" placeholder="Password Baru" class="relative py-4 pl-4 pr-10 w-full font-league font-medium text-lg/[0] text-custom-secondary placeholder:#48484833 rounded-lg @error('password') border-2 border-custom-destructive @enderror">
                    <div class="eyeIcon absolute mr-3" onclick="showHidePass()">
                        <svg id="showPass" class="cursor-pointer" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#495D6477" d="M9.75 12a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0"/><path fill="#495D6477" fill-rule="evenodd" d="M2 12c0 1.64.425 2.191 1.275 3.296C4.972 17.5 7.818 20 12 20c4.182 0 7.028-2.5 8.725-4.704C21.575 14.192 22 13.639 22 12c0-1.64-.425-2.191-1.275-3.296C19.028 6.5 16.182 4 12 4C7.818 4 4.972 6.5 3.275 8.704C2.425 9.81 2 10.361 2 12m10-3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5" clip-rule="evenodd"/></svg>
    
                        <svg id="hidePass" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#495D6477" fill-rule="evenodd" d="M1.606 6.08a1 1 0 0 1 1.313.526L2 7l.92-.394v-.001c0-.001 0 0 0 0l.003.009l.021.045c.02.042.051.108.094.194c.086.172.219.424.4.729a13.37 13.37 0 0 0 1.67 2.237a11.966 11.966 0 0 0 .59.592C7.18 11.8 9.251 13 12 13a8.706 8.706 0 0 0 3.22-.602c1.227-.483 2.254-1.21 3.096-1.998a13.053 13.053 0 0 0 2.733-3.725l.027-.058l.005-.011a1 1 0 0 1 1.838.788L22 7l.92.394l-.003.005l-.004.008l-.011.026l-.04.087a14.045 14.045 0 0 1-.741 1.348a15.368 15.368 0 0 1-1.711 2.256l.797.797a1 1 0 0 1-1.414 1.415l-.84-.84a11.81 11.81 0 0 1-1.897 1.256l.782 1.202a1 1 0 1 1-1.676 1.091l-.986-1.514c-.679.208-1.404.355-2.176.424V16.5a1 1 0 0 1-2 0v-1.544c-.775-.07-1.5-.217-2.177-.425l-.985 1.514a1 1 0 0 1-1.676-1.09l.782-1.203c-.7-.37-1.332-.8-1.897-1.257l-.84.84a1 1 0 0 1-1.414-1.414l.797-.797a15.406 15.406 0 0 1-1.87-2.519a13.457 13.457 0 0 1-.591-1.107a5.418 5.418 0 0 1-.033-.072l-.01-.021l-.002-.007l-.001-.002v-.001C1.08 7.395 1.08 7.394 2 7l-.919.395a1 1 0 0 1 .525-1.314" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                @error('password')
                    <span class="text-custom-destructive">{{ $message }}</span>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="flex flex-col gap-1">
                <label for="password_confirmation" class="font-semibold font-league text-xl text-custom-grey">Ketik Ulang Password Baru`</label>
                <div class="relative flex justify-end items-center">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ketik Ulang Password Baru" class="relative py-4 pl-4 pr-10 w-full font-league font-medium text-lg/[0] text-custom-secondary placeholder:#48484833 rounded-lg @error('password') border-2 border-custom-destructive @enderror">
                    <div class="eyeIcon absolute mr-3" onclick="showHideConfirmPass()">
                        <svg id="showConfirmPass" class="cursor-pointer" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#495D6477" d="M9.75 12a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0"/><path fill="#495D6477" fill-rule="evenodd" d="M2 12c0 1.64.425 2.191 1.275 3.296C4.972 17.5 7.818 20 12 20c4.182 0 7.028-2.5 8.725-4.704C21.575 14.192 22 13.639 22 12c0-1.64-.425-2.191-1.275-3.296C19.028 6.5 16.182 4 12 4C7.818 4 4.972 6.5 3.275 8.704C2.425 9.81 2 10.361 2 12m10-3.75a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5" clip-rule="evenodd"/></svg>
    
                        <svg id="hideConfirmPass" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#495D6477" fill-rule="evenodd" d="M1.606 6.08a1 1 0 0 1 1.313.526L2 7l.92-.394v-.001c0-.001 0 0 0 0l.003.009l.021.045c.02.042.051.108.094.194c.086.172.219.424.4.729a13.37 13.37 0 0 0 1.67 2.237a11.966 11.966 0 0 0 .59.592C7.18 11.8 9.251 13 12 13a8.706 8.706 0 0 0 3.22-.602c1.227-.483 2.254-1.21 3.096-1.998a13.053 13.053 0 0 0 2.733-3.725l.027-.058l.005-.011a1 1 0 0 1 1.838.788L22 7l.92.394l-.003.005l-.004.008l-.011.026l-.04.087a14.045 14.045 0 0 1-.741 1.348a15.368 15.368 0 0 1-1.711 2.256l.797.797a1 1 0 0 1-1.414 1.415l-.84-.84a11.81 11.81 0 0 1-1.897 1.256l.782 1.202a1 1 0 1 1-1.676 1.091l-.986-1.514c-.679.208-1.404.355-2.176.424V16.5a1 1 0 0 1-2 0v-1.544c-.775-.07-1.5-.217-2.177-.425l-.985 1.514a1 1 0 0 1-1.676-1.09l.782-1.203c-.7-.37-1.332-.8-1.897-1.257l-.84.84a1 1 0 0 1-1.414-1.414l.797-.797a15.406 15.406 0 0 1-1.87-2.519a13.457 13.457 0 0 1-.591-1.107a5.418 5.418 0 0 1-.033-.072l-.01-.021l-.002-.007l-.001-.002v-.001C1.08 7.395 1.08 7.394 2 7l-.919.395a1 1 0 0 1 .525-1.314" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                @error('password_confirmation')
                    <span class="text-custom-destructive">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        {{-- Button Groups --}}
        <div class="flex flex-row sticky z-20 bottom-0 py-4 items-center justify-between bg-custom-white mt-3">
            <a href="/user-profile" class="text-custom-dark font-league font-medium px-1 pt-2 pb-1 text-lg/none underline hover:text-custom-green-hover cancelLink">Batal</a>
            <button type="submit" class="px-12 py-3 rounded-lg lg:rounded-lg bg-custom-green hover:bg-custom-green-hover text-center lg:text-lg text-custom-white-hover font-semibold lg:order-2 duration-500">Simpan</button>
        </div>
    </form>

    {{-- jQuery JS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        const phoneInputField = document.getElementById('phone_number');
        
        const intlTelInput = window.intlTelInput(phoneInputField, {
            initialCountry: "ID", 
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js"
        });

        phoneInputField.addEventListener('keypress', function(event) {
            if (isNaN(event.key)) {
                event.preventDefault(); // Prevent non-numerical input
            }
        });

        function showHidePass() {
            const $showPass = $('#showPass');
            const $hidePass = $('#hidePass');
            const $passwordInput = $('#password');

            if ($passwordInput.attr('type') === "password") {
                $showPass.css('display', 'block');
                $hidePass.css('display', 'none');
            } else {
                $showPass.css('display', 'none');
                $hidePass.css('display', 'block');
            }
            
            $passwordInput.attr('type', $passwordInput.attr('type') === "password" ? "text" : "password");
        }

        function showHideConfirmPass() {
            const $showConfirmPass = $('#showConfirmPass');
            const $hideConfirmPass = $('#hideConfirmPass');
            const $confirmPasswordInput = $('#password_confirmation');

            if ($confirmPasswordInput.attr('type') === "password") {
                $showConfirmPass.css('display', 'block');
                $hideConfirmPass.css('display', 'none');
            } else {
                $showConfirmPass.css('display', 'none');
                $hideConfirmPass.css('display', 'block');
            }
            
            $confirmPasswordInput.attr('type', $confirmPasswordInput.attr('type') === "password" ? "text" : "password");
        }

        $("#username").on("keydown input", function(event) {
            if (event.type === "keydown" && event.keyCode === 32) {
                event.preventDefault(); // Prevent space on keydown
            } else if (event.type === "input") {
                $(this).val($(this).val().replace(/\s/g, "")); // Remove spaces on input
            }
        });
    </script>
@endsection