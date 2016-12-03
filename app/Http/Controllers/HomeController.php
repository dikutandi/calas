<?php

namespace App\Http\Controllers;

use App\Calas;
use App\Http\Requests\CalasRequest;
use Illuminate\Http\Request;
use Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user  = $request->user();
        $calas = $user->calas;

        return view('home', compact('user', 'calas'));
    }

    /**
     * Update Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCalas(CalasRequest $request)
    {
        $user = $request->user();

        $cv = $this->uploadCV('cv', $user, $request);

        $calas = Calas::create([
            'userid'    => $user->id,
            'npm'       => $request->get('npm'),
            'kelas'     => $request->get('kelas'),
            'alamat'    => $request->get('alamat'),
            'contact'   => $request->get('contact'),
            'ipk_utama' => $request->get('ipk_utama'),
            'ipk_lokal' => $request->get('ipk_lokal'),
            'cv'        => $cv,
        ]);

        if ($calas) {
            session()->flash('info', 'Berhasil Memasukan Data.');

            return redirect()->back();
        } else {
            session()->flash('error', 'Gagal Memasukan Data.');

            return redirect()->back();
        }

    }

    public function uploadCV($file = 'cv', $user, Request $request)
    {
        if ($file) {

            $destinationPath = 'uploads/CV'; // upload path
            $extension       = Input::file('cv')->getClientOriginalExtension(); // getting file extension
            $fileName        = $user->name . '.' . $request->npm . '.' . $extension; // renameing image

            $fullPath       = $destinationPath . '/';
            $upload_success = Input::file('cv')->move($fullPath, $fileName); // uploading file to given path

            if ($upload_success) {
                return $fullPath . $fileName;
            } else {
                return false;
            }
        }

    }
}
