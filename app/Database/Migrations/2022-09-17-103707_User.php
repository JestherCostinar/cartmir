<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'firstname' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'lastname' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'phone' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
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
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
