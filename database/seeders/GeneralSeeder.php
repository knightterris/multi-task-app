<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\FoodCategory;
use App\Models\ItemCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodCategories = [
            [
                'name'      => 'French Fries',
                'description'=> 'French fries are served hot, either soft or crispy, and are generally eaten as part of lunch or dinner or by themselves as a snack.',
            ],
            [
                'name'      => 'Burgers',
                'description'=> 'A burger is a flat round mass of minced meat or vegetables, which is fried and often eaten in a bread roll.',
            ],
            [
                'name'      => 'Meal',
                'description'=> 'the food served and eaten especially at one of the customary, regular occasions for taking food during the day, as breakfast, lunch, or supper.',
            ],
            [
                'name'      => 'Drinks',
                'description'=> 'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture.',
            ],
            [
                'name'      => 'Meat',
                'description'=> 'chicken,pork,fish...etc.'
            ],
            [
                'name'      => 'Snacks',
                'description' => 'Especially fast food.'
            ],
            [
                'name'      => 'Seafood',
                'description'=> 'octopus,fish...etc.'
            ],
            [
                'name'      => 'Drinks',
                'description'=> 'soda,beer,soft-drinks...etc.'
            ],
            [
                'name'      => 'Fast Food',
                'description'=> 'chicken,pork,fish...etc.'
            ],
            [
                'name'      => 'Diet',
                'description'=> 'Especially vegetables..etc.'
            ],
            [
                'name'      => 'For Vegans',
                'description'=> 'chicken,pork,fish...etc.'
            ],
            [
                'name'      => 'Family Sized',
                'description'=> 'chicken,pork,fish...etc.'
            ],
        ];
        FoodCategory::insert($foodCategories);

        $itemCategories = [
            [
                'name'      => 'Shirt',
                'description'=> 'A comfortable shirt.',
            ],
            [
                'name'      => 'Trousers',
                'description'=> 'A comfortable trousers.',
            ],
            [
                'name'      => 'Shorts',
                'description'=> 'A comfortable shorts.',
            ],
            [
                'name'      => 'Pants',
                'description'=> 'A comfortable pants.',
            ],
            [
                'name'      => 'Sweater',
                'description'=> 'A comfortable sweater.',
            ],
            [
                'name'      => 'Blouse',
                'description'=> 'A comfortable blouse.',
            ],
            [
                'name'      => 'Shoes',
                'description'=> 'A comfortable Shoes.',
            ],
            [
                'name'      => 'Heels',
                'description'=> 'A comfortable heels.',
            ],
            [
                'name'      => 'Hoodie',
                'description'=> 'A comfortable hoodie.',
            ],
            [
                'name'      => 'Jacket',
                'description'=> 'A comfortable jacket.',
            ],
            [
                'name'      => 'Accessories',
                'description'=> 'Comfortable accessories.',
            ],
            [
                'name'      => 'Cosmetics',
                'description'=> 'Comfortable cosmetics.',
            ],
        ];
        ItemCategory::insert($itemCategories);

        $users = [
            [
                'id'        => 2,
                'name'      =>'Tony',
                'email'     =>'tony@gmail.com',
                'password'  =>Hash::make('passowrd'),
                'role'      =>'user',
                'address'   =>'united Kingdom',
                'gender'    =>'male',
                'works_at'  =>'Solutions Hub',
                'study_at'  =>'Yale',
                'bio'       =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'phone'     =>'445555999666',
            ],
            [
                'id'        => 3,
                'name'      =>'Mark',
                'email'     =>'mark@gmail.com',
                'password'  =>Hash::make('passowrd'),
                'role'      =>'user',
                'address'   =>'UAE',
                'gender'    =>'male',
                'works_at'  =>'Technology Hub',
                'study_at'  =>'Yale',
                'bio'       =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'phone'     =>'445555999666',
            ],
            [
                'id'        => 4,
                'name'      =>'Debbie',
                'email'     =>'debbie@gmail.com',
                'password'  =>Hash::make('passowrd'),
                'role'      =>'user',
                'address'   =>'Argentina',
                'gender'    =>'female',
                'works_at'  =>'Solutions Hub',
                'study_at'  =>'Yale',
                'bio'       =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'phone'     =>'445555999666',
            ],
            [
                'id'        => 5,
                'name'      =>'Hobbs',
                'email'     =>'hobbs@gmail.com',
                'password'  =>Hash::make('passowrd'),
                'role'      =>'user',
                'address'   =>'united Kingdom',
                'gender'    =>'male',
                'works_at'  =>'Solutions Hub',
                'study_at'  =>'Yale',
                'bio'       =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'phone'     =>'445555999666',
            ],
            [
                'id'        => 6,
                'name'      =>'Shaw',
                'email'     =>'shaw@gmail.com',
                'password'  =>Hash::make('passowrd'),
                'role'      =>'admin',
                'address'   =>'Canada',
                'gender'    =>'male',
                'works_at'  =>'Solutions Hub',
                'study_at'  =>'Yale',
                'bio'       =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'phone'     =>'445555999666',
            ],
        ];
        User::insert($users);
    }
}
