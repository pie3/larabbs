<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成用户数据集合
        User::factory()->count(10)->create();

        // 单独处理第一个用户的数据
        $user = User::find(1);
        $user->name = 'Pie';
        $user->email = 'piestion@gmail.com';
        $user->avatar = 'http://larabbs.test/uploads/images/avatars/202203/11/1_1646933207_Jyy4b58o2n.jpg';
        $user->introduction = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'; // or: Stay hungry, stay foolish.
        $user->save();
    }
}
