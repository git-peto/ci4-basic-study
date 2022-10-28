<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusIdToItems extends Migration
{
    public function up()
    {
        $this->forge->addColumn('items', [
            'status_id' => [
                'type'           => 'int',
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('items', 'status_id');
    }
}
