<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Demo User',
            'email' => 'demo@email.com',
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'status_id' => 1
        ];

        $this->db->table('users')->insert($data);
    }
}
