<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public function index() {
        $view = 'home.user';
    
        return view($view, [
            "pageName" => "Beranda | ",
        ]);
    }

    public function addDrivingSchool() {    
        return view('add-driving-school', [
            "pageName" => "Tawarkan Jasa Anda | ",
        ]);
    }

    public function profile() {
        return view('profile.user-profile', [
            "pageName" => "Profil Anda | ",
        ]);
    }

    public function editProfile() {
        return view('profile.edit-user-profile', [
            "pageName" => "Ubah Profil Anda | ",
        ]);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'hash_for_profile_picture' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
            'fullname' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username,' . Auth::id(),
            'age' => 'nullable|numeric|min:17|max:99',
            'description' => 'nullable|max:255',
            'phone_number' => 'required|max:20',
            'password' => 'nullable|min:5|max:255|confirmed',
            'password_confirmation' => 'nullable|min:5|max:255',
        ],[
            'hash_for_profile_picture.mimes' => 'Format yang didukung adalah .jpg, .png, dan .webp',
            'hash_for_profile_picture.max' => 'Ukuran gambar maksimal adalah 2 MB',
            'fullname.required' => 'Kolom ini harus diisi',
            'fullname.max' => 'Nama Terlalu Panjang',
            'username.required' => 'Kolom ini harus diisi',
            'username.max' => 'Username Terlalu Panjang',
            'username.unique' => 'Username sudah digunakan',
            'age.min' => 'Usia minimal 17 tahun',
            'age.max' => 'Usia maksimal 99 tahun',
            'description.max' => 'Deskripsi terlalu panjang',
            'phone_number.required' => 'Kolom ini harus diisi',
            'phone_number.max' => 'Nomor Terlalu Panjang',
            'password.min' => 'Password minimal berisi 5 karakter',
            'password.max' => 'Password terlalu panjang',
            'password.confirmed' => 'Pastikan anda mengetikkan password yang sama',
            'password_confirmation.min' => 'Password minimal berisi 5 karakter',
            'password_confirmation.max' => 'Password terlalu panjang',
        ]);

        $user = User::find(Auth::id());
        $user->update($request->only(['fullname', 'username', 'age', 'description', 'phone_number']));

        $fileName = null;
        if ($request->hasFile('hash_for_profile_picture')) {
            // Delete old pictures
            if ($user->hash_for_profile_picture && Storage::disk('public')->exists("profile_pictures/" . $user->hash_for_profile_picture)) {
                Storage::disk('public')->delete("profile_pictures/" . $user->hash_for_profile_picture);
            }

            $fileName = time() . '.' . $request->hash_for_profile_picture->getClientOriginalExtension();
            $request->hash_for_profile_picture->storeAs('profile_pictures', $fileName);

            $user->fill(['hash_for_profile_picture' => $fileName]);
            $user->save();            
        }     

        if ($request->has('password') && $request->has('password_confirmation') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        $request->session()->flash('success', 'Profil berhasil diperbarui');

        return redirect()->intended('/user-profile');
    }

    // public function deleteProfilePicture(Request $request)
    // {
    //     $user = User::find(Auth:id());

    //     if ($user->hash_for_profile_picture) {
    //         Storage::disk('public')->delete("profile_pictures/" . $user->hash_for_profile_picture);
    //         $user->hash_for_profile_picture = null;
    //         $user->save();

    //         $request->session()->flash('success', 'Gambar Profil berhasil dihapus');
    //     }

    //     return redirect()->intended('/user-profile');
    // }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        // $request->session()->flash('success', 'Login Berhasil');

        Auth::logout();

        $user->delete();

        return redirect('/');
    }
}
