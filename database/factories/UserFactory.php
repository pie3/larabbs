<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $avatars = [
            'http://larabbs.test/uploads/images/avatars/202203/11/1_1646933207_Jyy4b58o2n.jpg',
            'http://larabbs.test/uploads/images/avatars/202203/11/1_1646928598_H6OVxWNkKw.gif',
            'http://larabbs.test/uploads/images/avatars/202203/11/1_1647012422_csYZ3jiDus.jpg',
            'http://larabbs.test/uploads/images/avatars/202203/11/1_1647012449_qRBxkplfpD.jpg',
            'http://larabbs.test/uploads/images/avatars/202203/11/1_1647012470_EPFgSKTf8P.jpg',
            'http://larabbs.test/uploads/images/avatars/202203/11/1_1647012792_i0aAecAv9r.jpg',
        ];

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$MhrW78PsUaT8XMIqMRiy2elifGC6wc1D0CWzFv6n2FYp4T6A2sMcK', // pie2####3
            'remember_token' => Str::random(10),
            'introduction' => $this->faker->sentence(),
            'avatar' => $this->faker->randomElement($avatars),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
