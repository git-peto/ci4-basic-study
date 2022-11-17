<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToSales extends Migration
{
    public function up()
    {
        $this->forge->addColumn('sales', [
            'user_id' => [
                'type' => 'int'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('sales', 'user_id');
    }
}
