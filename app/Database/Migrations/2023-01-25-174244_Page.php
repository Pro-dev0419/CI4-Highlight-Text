<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Highlight extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'start_offset' => [
                'type' => 'INT',
            ],
            'end_offset' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('highlights');
    }

    public function down()
    {
        $this->forge->dropTable('highlights');
    }
}