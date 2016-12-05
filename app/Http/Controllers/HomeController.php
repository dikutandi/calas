<?php

namespace App\Http\Controllers;

use App\Calas;
use App\Http\Requests\CalasRequest;
use App\Http\Requests\TugasRequest;
use Illuminate\Http\Request;
use Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
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

        if ($user->roles == 'admin') {
            return redirect(url('/lepkom-admin/home'));
        }

        $lab_minat = [
            'database'  => 'Database',
            'ecommerce' => 'E-Commerce',
            'jaringan'  => 'Jaringan',
            'aplikasi'  => 'Pemrograman Aplikasi',
            'internet'  => 'Pemrograman Internet',
            'hardware'  => 'Perangkat Keras',
        ];

        return view('home', compact('user', 'calas', 'lab_minat'));
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
            'lab_minat' => $request->get('lab_minat'),
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

    public function storeProject(TugasRequest $request)
    {
        $user = $request->user();

        $ppt = $this->uploadCV('project_ppt', $user, $request);

        $user->calas->project_name = $request->get('project_name');
        $user->calas->project_desc = $request->get('project_desc');
        $user->calas->project_ppt  = $ppt;

        if ($user->calas->save()) {
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

            $destinationPath = 'uploads/CV' . $request->npm; // upload path
            $extension       = Input::file($file)->getClientOriginalExtension(); // getting file extension
            $fileName        = $user->name . '.' . $request->npm . '.' . $extension; // renameing image

            $fullPath       = $destinationPath . '/';
            $upload_success = Input::file($file)->move($fullPath, $fileName); // uploading file to given path

            if ($upload_success) {
                return $fullPath . $fileName;
            } else {
                return false;
            }
        }

    }

    public function download(Request $request)
    {
        $file = $request->get('file');

        return response()->download($file);
    }
}
