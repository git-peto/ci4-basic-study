<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSaleItem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'sale_id' => [
                'type' => 'int',
            ],
            'item_id' => [
                'type' => 'int'
            ],
            'quantity' => [
                'type' => 'int',
            ],
            'price' => [
                'type' => 'int'
            ],
            'subtotal' => [
                'type' => 'int'
            ],
        ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('sale_items', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('sale_items');
    }
}
