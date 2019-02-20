<?php

use Illuminate\Database\Seeder;

class AdminActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = [
            'availible-halls' => 'управление залами',
            'halls-config' => 'конфигурация залов',
            'price-config' => 'конфигурация цен',
            'seance-config' => 'сетка сеансов',
            'sale-start' => 'откырть продажи'
        ];
        foreach ($actions as $alias => $action) {
            DB::table('admin_actions')->insert(['action' => $action, 'alias' => $alias]);
        }
    }
}
