<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fk_order_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'order_amount' => [
                'type'          => 'DECIMAL',
                'constraint'    => '10,2',
                'null'          => false,
                'default'       => 0.00
            ],
            'order_date' => [
                'type'          => 'DATETIME',
            ],
            'image' => [
                'type'          => 'text',
                'constraint'    => '100',
            ],
            'user_id' => [
                'type'          => 'INT',
                'null'          => false,
            ],
            'order_type' => [
                'type'          => 'ENUM("Online", "COD")',
                'default'       => 'COD',
                'null'          => false
            ],
            'order_status' => [
                'type'          => 'ENUM("Pending", "Accepted", "out_for_delivery", "Delivered")',
                'default'       => 'Pending',
                'null'          => false
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                // 'default' => 'current_timestamp()',
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                // 'default' => 'current_timestamp()',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
