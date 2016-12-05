<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = User::select('users_calas.*', 'users.*')
            ->join('users_calas', 'users.id', '=', 'users_calas.userid')
            ->where('users.roles', 'calas');

        if ($request->input('name')) {
            $query->where('users.name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->input('npm')) {
            $query->where('users_calas.npm', 'like', '%' . $request->input('npm') . '%');
        }

        if ($request->input('ipk_lokal')) {
            $query->where('users_calas.ipk_lokal', '>=', $request->input('ipk_lokal'));
        }

        if ($request->input('ipk_utama')) {
            $query->where('users_calas.ipk_utama', '>=', $request->input('ipk_utama'));
        }

        switch ($request->input('sort')) {
            case 'name-asc':
                $query->orderBy('users.name', 'ASC');
                break;
            case 'name-desc':
                $query->orderBy('users.name', 'DESC');
                break;
            case 'created-desc':
                $query->orderBy('users.created_at', 'DESC');
                break;
            case 'created-asc':
                $query->orderBy('users.created_at', 'ASC');
                break;
            case 'lokal-desc':
                $query->orderBy('users_calas.ipk_lokal', 'DESC');
                break;
            case 'lokal-asc':
                $query->orderBy('users_calas.ipk_lokal', 'ASC'); // kecil-besar
                break;
            case 'utama-desc':
                $query->orderBy('users_calas.ipk_utama', 'DESC');
                break;
            case 'utama-asc':
                $query->orderBy('users_calas.ipk_utama', 'ASC'); // kecil-besar
                break;
            default:
                $query->orderBy('users.name', 'ASC');
                break;
        }

        $users = $query->paginate(15);

        $sorts = [
            'name-asc'     => 'Nama A-Z',
            'name-desc'    => 'Nama Z-A',
            'lokal-asc'    => 'IPK Lokal Rendah-Tinggi',
            'lokal-desc'   => 'IPK Lokal Tinggi-Rendah',
            'utama-asc'    => 'IPK Utama Rendah-Tinggi',
            'utama-desc'   => 'IPK Utama Tinggi-Rendah',
            'created-desc' => 'Terbaru',
            'created-asc'  => 'Terlama',
        ];

        $filter = [
            'name'      => $request->get('name'),
            'npm'       => $request->get('npm'),
            'ipk_lokal' => $request->get('ipk_lokal'),
            'ipk_utama' => $request->get('ipk_utama'),
            'sort'      => $request->get('sort'),
        ];

        return view('admin.home', compact('users', 'filter', 'sorts'));
    }
}
