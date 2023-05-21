<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\MyWishList;
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
                'password'  => Hash::make('password'),
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
                'password'  =>Hash::make('password'),
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
                'password'  =>Hash::make('password'),
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
                'password'  =>Hash::make('password'),
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
                'password'  =>Hash::make('password'),
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

        $products = [
            [
                'id'            => 1,
                'name'          => 'Excepteur',
                'description'   => 'Molestiae esse est',
                'price'         => '100000',
                'category_id'   => 3,
                'count'         => 200,
                'status'        => 1,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 1,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 2,
                'name'          => 'DFWE dfdfae e frw',
                'description'   => 'fdfmoerw essed df dfpm adfd sasdfwwefm a est',
                'price'         => '200000',
                'category_id'   => 6,
                'count'         => 700,
                'status'        => 0,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 0,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 1,
            ],
            [
                'id'            => 3,
                'name'          => 'dfaf dmimoem no werw aefnom',
                'description'   => 'gdgadg g do 9jn aem i aneonwa  esse est',
                'price'         => '600000',
                'category_id'   => 5,
                'count'         => 1000,
                'status'        => 0,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 1,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 4,
                'name'          => 'dfadfp pdn aBIBI',
                'description'   => 'Molestiae dgaed geona  anilamf en est',
                'price'         => '100000',
                'category_id'   => 3,
                'count'         => 200,
                'status'        => 1,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 1,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 5,
                'name'          => 'nayap',
                'description'   => ' 0enma  knwe rnina ae in fe esse est',
                'price'         => '100000',
                'category_id'   => 1,
                'count'         => 800,
                'status'        => 0,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 0,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 6,
                'name'          => 'dancer',
                'description'   => 'Molestiae 0n er  faer3wa ninimw 0n er  faer3wa ninimw 0n er  faer3wa ninimw esse est',
                'price'         => '900000',
                'category_id'   => 9,
                'count'         => 900,
                'status'        => 0,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 1,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 7,
                'name'          => 'Korea brand',
                'description'   => 'Molestiae daffe on neoaerfae esse est',
                'price'         => '100000',
                'category_id'   => 8,
                'count'         => 200,
                'status'        => 1,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 0,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 8,
                'name'          => 'boom ',
                'description'   => 'wann fdaf ad -nnwne dkafadf dfoanoew  adeafd pteur estiae esse est',
                'price'         => '8000000',
                'category_id'   => 3,
                'count'         => 8800,
                'status'        => 1,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 0,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 9,
                'name'          => 'nate eomq',
                'description'   => 'dam mfe  esse est',
                'price'         => '1800000',
                'category_id'   => 3,
                'count'         => 200,
                'status'        => 1,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 1,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 0,
            ],
            [
                'id'            => 10,
                'name'          => 'ticn ticn',
                'description'   => 'dafmoenmiew nin e ern esse est',
                'price'         => '100000',
                'category_id'   => 3,
                'count'         => 200,
                'status'        => 1,
                'created_by'    => 'Admin',
                'created_at'    => Carbon::now(),
                'created_by_id' => 1,
                'product_type'  => 1,
                'like'          => 0,
                'comment'       => 0,
                'wishlist_status'=> 1,
            ],
        ];
        Product::insert($products);

        $myWishLists = [
                [
                    'id'        => 1,
                    'user_id'   => 1,
                    'product_id'=> 2,
                ],
                [
                    'id'        => 2,
                    'user_id'   => 1,
                    'product_id'=> 10,
                ],
            ];
            MyWishList::insert($myWishLists);
    }
}
