<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function change(): void
    {
        $this->table('users', ['engine' => 'InnoDB'])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('role', 'string', ['limit' => 50, 'default' => 'usuariobase', 'null' => false])
            ->addColumn('active', 'boolean', ['default' => true, 'null' => false])
            ->addColumn('created', 'datetime', ['default' => null, 'null' => true])
            ->addColumn('modified', 'datetime', ['default' => null, 'null' => true])
            ->addIndex(['email'], ['unique' => true, 'name' => 'UNQ_USERS_EMAIL'])
            ->create();
    }
}
