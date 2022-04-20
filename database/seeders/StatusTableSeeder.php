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
        DB::table('statuses')->insert([
        	'nama' => 'Dipinjam',
        	'deskripsi' => 'Aset DiPinjam'
        ]);
        DB::table('statuses')->insert([
        	'nama' => 'Tidak Dipinjam',
        	'deskripsi' => 'Aset Tidak DiPinjam'
        ]);
    }
}
