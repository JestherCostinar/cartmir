<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Shippingaddress extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fullname' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'city' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'area' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'pincode' => [
                'type'          => 'INT',
                'constraint'    => '11',
            ],
            'address' => [
                'type'          => 'text',
            ],
            'user_id' => [
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => false,
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
        $this->forge->createTable('shipping_address');
    }

    public function down()
    {
        $this->forge->dropTable('shipping_address');
    }
}
