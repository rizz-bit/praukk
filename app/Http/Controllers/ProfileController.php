<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {    
        return view('profile.photo');
    }
    public function album($id)
    {    
        $albums = Album::with('user')->where('user_id', $id)->get(); 
        // dd($albums);
    // return view('albums', compact('albums'));
        return view('profile.album_display',compact('albums'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {

        // dd($request);
        // Validasi input
        // $request->validate([
        //     'username' => 'required',
        //     'nama_lengkap' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'alamat' => 'required',
        //     'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        
        $user = User::findOrFail($id);
        // // Jika ada foto baru yang diupload, proses upload foto baru
        if ($request->hasFile('profile_picture')) {
                // Hapus foto lama jika ada
                if ($user->profile_picture && file_exists(public_path('images/' . $user->profile_picture))) {
                        unlink(public_path('images/' . $user->profile_picture));
                    }
                
            // Upload foto baru
            $profile_pictureName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'), $profile_pictureName);
        } else {
                // Jika tidak ada foto baru, gunakan foto lama
                $profile_pictureName = $user->profile_picture;
            }
            
        // Update data user
        $user->update($request->all());
        $user->profile_picture = $profile_pictureName;
        $user->save();

        // dd($user);

        return redirect()->route('profile')->with('success', 'Data berhasil diperbarui!');
    }

    // public function update(Request $request, User $user){
    //     $request->validate([
    //         'username' => 'required',
    //         'nama_lengkap' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'alamat' => 'required',
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     if($request->hasFile('profile_picture')){
    //         $path = $request->file('profile_picture')->store('profile_pictures', 'public');
    //         $user->profile_picture = $path;
    //     }
        
    //     $user->username = $request->username;
    //     $user->nama_lengkap = $request->nama_lengkap;
    //     $user->email = $request->email;
    //     // $user->password = $request->password;
    //     $user->alamat = $request->alamat;

    //     $user->save();

    //     dd($user);
    // }
}

