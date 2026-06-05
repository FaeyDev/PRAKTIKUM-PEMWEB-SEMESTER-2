<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder {
    public function run(): void {
        $jabatans = [
            ['nama_jabatan' => 'Manager'],
            ['nama_jabatan' => 'Staff'],
            ['nama_jabatan' => 'Supervisor'],
        ];

        foreach ($jabatans as $jabatan) {
            Jabatan::firstOrCreate($jabatan);
        }
    }
}