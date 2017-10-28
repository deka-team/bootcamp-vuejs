<?php

use Illuminate\Database\Seeder;

use App\Models\Mahasiswa;

class MahasiswaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::insert([
            ['nim' => 123456, 'nama' => 'Syawqi'],
            ['nim' => 123457, 'nama' => 'Reza'],
            ['nim' => 123458, 'nama' => 'Haidi'],
            ['nim' => 123459, 'nama' => 'Rizal'],
            ['nim' => 123460, 'nama' => 'Deni'],
        ]);
    }
}
