<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageItem extends Migration
{
    public function up()
    {
        $this->forge->addColumn('items', [
            'image_name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('items', 'image_name');
    }
}
