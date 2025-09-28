<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateReactivos extends AbstractMigration
{
    public function change(): void
    {
        $this->table('reactivos', ['engine' => 'InnoDB'])
            ->addColumn('pregunta', 'text', ['null' => false])
            ->addColumn('respuesta_a', 'string', ['limit' => 500, 'null' => false])
            ->addColumn('respuesta_b', 'string', ['limit' => 500, 'null' => false])
            ->addColumn('respuesta_c', 'string', ['limit' => 500, 'null' => false])
            ->addColumn('respuesta_correcta', 'string', ['limit' => 1, 'null' => false])
            ->addColumn('retroalimentacion', 'text', ['null' => true])
            ->addColumn('dificultad', 'integer', ['default' => 1, 'null' => false])
            ->addColumn('area_especialidad', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('subespecialidad', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('created', 'datetime', ['default' => null, 'null' => true])
            ->addColumn('modified', 'datetime', ['default' => null, 'null' => true])
            ->addIndex(['user_id'], ['name' => 'IDX_REACTIVOS_USER_ID'])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION', 'constraint' => 'FK_REACTIVOS_USERS'])
            ->create();
    }
}
