<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'login' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => '123',
                'created_at' => '2020-10-10 13:59:27',
                'updated_at' => '2020-10-10 13:59:27',
            ]
        ];

        $user = $this->table('users');
        $user->insert($data)->save();
    }
}
