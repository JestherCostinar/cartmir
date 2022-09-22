<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'product_desc' => [
                'type'          => 'text',
                'null'          => true
            ],
            'qty' => [
                'type'          => 'INT',
                'null'          => false
            ],
            'MRP' => [
                'type'          => 'DECIMAL',
                'constraint'    => '10,2',
                'null'          => false,
                'default'       => 0.00
            ],
            'selling_price' => [
                'type'          => 'DECIMAL',
                'constraint'    => '10,2',
                'null'          => false,
                'default'       => 0.00
            ],
            'image' => [
                'type'          => 'text',
                'constraint'    => '100',
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                // 'default' => 'current_timestamp()',
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                // 'default' => 'current_timestamp()',
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
