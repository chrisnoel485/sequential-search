<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statutes')->insert([
        	'nama' => 'Dipinjam',
        	'deskripsi' => 'Aset DiPinjam'
        ]);
        DB::table('statutes')->insert([
        	'nama' => 'Tidak Dipinjam',
        	'deskripsi' => 'Aset Tidak DiPinjam'
        ]);
    }
}
