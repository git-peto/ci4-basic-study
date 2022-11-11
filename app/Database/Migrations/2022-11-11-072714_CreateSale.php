<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSale extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'invoice_no' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'invoice_date' => [
                'type' => 'datetime'
            ],
            'customer_id' => [
                'type' => 'int',
            ],
            'grand_total' => [
                'type' => 'int'
            ],
        ]);
        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('sales', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
