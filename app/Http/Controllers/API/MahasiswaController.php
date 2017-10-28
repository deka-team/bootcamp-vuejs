<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        return Mahasiswa::latest('updated_at')->get();
    }

    public function store()
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = request()->input('nim');
        $mahasiswa->nama = request()->input('nama');
        $mahasiswa->save();

        return $mahasiswa;
    }

    public function update($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nim = request()->input('nim');
        $mahasiswa->nama = request()->input('nama');
        $mahasiswa->save();

        return $mahasiswa;
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return $mahasiswa;
    }
}
