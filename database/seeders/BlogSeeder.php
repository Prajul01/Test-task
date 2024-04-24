<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Blogs = [
            [
                'title'=>'My first Blog',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt

                ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam.
                Eget nullam non nisi est sit amet facilisis. Volutpat blandit aliquam etiam erat velit scelerisque.
                Condimentum id venenatis a condimentum. Maecenas accumsan lacus vel facilisis volutpat est velit.
                Auctor elit sed vulputate mi sit amet mauris commodo quis. Volutpat maecenas volutpat blandit aliquam
                etiam. Tellus cras adipiscing enim eu turpis. Sapien pellentesque habitant morbi tristique. Sit amet
                aliquam id diam maecenas ultricies mi eget mauris. Turpis egestas pretium aenean
                pharetra magna. Eu tincidunt tortor aliquam nulla facilisi cras fermentum. Pellentesque pulvinar
                pellentesque habitant morbi. Gravida quis blandit turpis cursus in hac habitasse platea dictumst.
                Eget velit aliquet sagittis id consectetur. Non enim praesent elementum facilisis leo vel fringill
                a. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Turpis egestas maecenas pharetra
                convallis posuere morbi.

                Leo vel orci porta non pulvinar neque. Sed euismod nisi porta lorem mollis aliquam ut. Cursus risus at ultr
                ices mi tempus imperdiet nulla. Purus in massa tempor nec feugiat nisl pretium fusce id. Cursus turpis mass
                 a tincidunt dui. Eget lorem dolor sed viverra ipsum. Quis blandit turpis cursus in hac. Porta lorem mollis
                aliquam ut porttitor leo a diam. Accumsan sit amet nulla facilisi morbi. Leo urna molestie at elementum. Ut
                venenatis tellus in metus vulputate eu scelerisque felis. Suspendisse faucibus interdum posuere lorem ipsu
                 m dolor. Dolor sit amet consectetur adipiscing elit pellentesque. Vel fringilla est ullamcorper eget nulla
                 . Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque. Sagittis vitae et leo duis ut diam qua
                  m nulla. Risus quis varius quam quisque id. Lectus urna duis convallis convallis tellus. Id venenatis a co
                  ndimentum vitae sapien pellentesque.',

                'image'=>'1713903722_6686a3142cb232c5afd2b351ecc6a36c.jpg',
                'status'=> 1,
            ],
            [
                'title'=>'My Second Blog',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt

                ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam.
                Eget nullam non nisi est sit amet facilisis. Volutpat blandit aliquam etiam erat velit scelerisque.
                Condimentum id venenatis a condimentum. Maecenas accumsan lacus vel facilisis volutpat est velit.
                Auctor elit sed vulputate mi sit amet mauris commodo quis. Volutpat maecenas volutpat blandit aliquam
                etiam. Tellus cras adipiscing enim eu turpis. Sapien pellentesque habitant morbi tristique. Sit amet
                aliquam id diam maecenas ultricies mi eget mauris. Turpis egestas pretium aenean
                pharetra magna. Eu tincidunt tortor aliquam nulla facilisi cras fermentum. Pellentesque pulvinar
                pellentesque habitant morbi. Gravida quis blandit turpis cursus in hac habitasse platea dictumst.
                Eget velit aliquet sagittis id consectetur. Non enim praesent elementum facilisis leo vel fringill
                a. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Turpis egestas maecenas pharetra
                convallis posuere morbi.

                Leo vel orci porta non pulvinar neque. Sed euismod nisi porta lorem mollis aliquam ut. Cursus risus at ultr
                ices mi tempus imperdiet nulla. Purus in massa tempor nec feugiat nisl pretium fusce id. Cursus turpis mass
                 a tincidunt dui. Eget lorem dolor sed viverra ipsum. Quis blandit turpis cursus in hac. Porta lorem mollis
                aliquam ut porttitor leo a diam. Accumsan sit amet nulla facilisi morbi. Leo urna molestie at elementum. Ut
                venenatis tellus in metus vulputate eu scelerisque felis. Suspendisse faucibus interdum posuere lorem ipsu
                 m dolor. Dolor sit amet consectetur adipiscing elit pellentesque. Vel fringilla est ullamcorper eget nulla
                 . Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque. Sagittis vitae et leo duis ut diam qua
                  m nulla. Risus quis varius quam quisque id. Lectus urna duis convallis convallis tellus. Id venenatis a co
                  ndimentum vitae sapien pellentesque.',

                'image'=>'1713903605_download (1).jpeg',
                'status'=> 1,
            ],
            [
                'title'=>'My Third Blog',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt

                ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam.
                Eget nullam non nisi est sit amet facilisis. Volutpat blandit aliquam etiam erat velit scelerisque.
                Condimentum id venenatis a condimentum. Maecenas accumsan lacus vel facilisis volutpat est velit.
                Auctor elit sed vulputate mi sit amet mauris commodo quis. Volutpat maecenas volutpat blandit aliquam
                etiam. Tellus cras adipiscing enim eu turpis. Sapien pellentesque habitant morbi tristique. Sit amet
                aliquam id diam maecenas ultricies mi eget mauris. Turpis egestas pretium aenean
                pharetra magna. Eu tincidunt tortor aliquam nulla facilisi cras fermentum. Pellentesque pulvinar
                pellentesque habitant morbi. Gravida quis blandit turpis cursus in hac habitasse platea dictumst.
                Eget velit aliquet sagittis id consectetur. Non enim praesent elementum facilisis leo vel fringill
                a. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Turpis egestas maecenas pharetra
                convallis posuere morbi.

                Leo vel orci porta non pulvinar neque. Sed euismod nisi porta lorem mollis aliquam ut. Cursus risus at ultr
                ices mi tempus imperdiet nulla. Purus in massa tempor nec feugiat nisl pretium fusce id. Cursus turpis mass
                 a tincidunt dui. Eget lorem dolor sed viverra ipsum. Quis blandit turpis cursus in hac. Porta lorem mollis
                aliquam ut porttitor leo a diam. Accumsan sit amet nulla facilisi morbi. Leo urna molestie at elementum. Ut
                venenatis tellus in metus vulputate eu scelerisque felis. Suspendisse faucibus interdum posuere lorem ipsu
                 m dolor. Dolor sit amet consectetur adipiscing elit pellentesque. Vel fringilla est ullamcorper eget nulla
                 . Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque. Sagittis vitae et leo duis ut diam qua
                  m nulla. Risus quis varius quam quisque id. Lectus urna duis convallis convallis tellus. Id venenatis a co
                  ndimentum vitae sapien pellentesque.',

                'image'=>'1713903590_download.jpeg',
                'status'=> 1,
            ],
            [
                'title'=>'My Fourth Blog',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt

                ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam.
                Eget nullam non nisi est sit amet facilisis. Volutpat blandit aliquam etiam erat velit scelerisque.
                Condimentum id venenatis a condimentum. Maecenas accumsan lacus vel facilisis volutpat est velit.
                Auctor elit sed vulputate mi sit amet mauris commodo quis. Volutpat maecenas volutpat blandit aliquam
                etiam. Tellus cras adipiscing enim eu turpis. Sapien pellentesque habitant morbi tristique. Sit amet
                aliquam id diam maecenas ultricies mi eget mauris. Turpis egestas pretium aenean
                pharetra magna. Eu tincidunt tortor aliquam nulla facilisi cras fermentum. Pellentesque pulvinar
                pellentesque habitant morbi. Gravida quis blandit turpis cursus in hac habitasse platea dictumst.
                Eget velit aliquet sagittis id consectetur. Non enim praesent elementum facilisis leo vel fringill
                a. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Turpis egestas maecenas pharetra
                convallis posuere morbi.

                Leo vel orci porta non pulvinar neque. Sed euismod nisi porta lorem mollis aliquam ut. Cursus risus at ultr
                ices mi tempus imperdiet nulla. Purus in massa tempor nec feugiat nisl pretium fusce id. Cursus turpis mass
                 a tincidunt dui. Eget lorem dolor sed viverra ipsum. Quis blandit turpis cursus in hac. Porta lorem mollis
                aliquam ut porttitor leo a diam. Accumsan sit amet nulla facilisi morbi. Leo urna molestie at elementum. Ut
                venenatis tellus in metus vulputate eu scelerisque felis. Suspendisse faucibus interdum posuere lorem ipsu
                 m dolor. Dolor sit amet consectetur adipiscing elit pellentesque. Vel fringilla est ullamcorper eget nulla
                 . Viverra ipsum nunc aliquet bibendum enim facilisis gravida neque. Sagittis vitae et leo duis ut diam qua
                  m nulla. Risus quis varius quam quisque id. Lectus urna duis convallis convallis tellus. Id venenatis a co
                  ndimentum vitae sapien pellentesque.',

                'image'=>'1713903722_6686a3142cb232c5afd2b351ecc6a36c.jpg',
                'status'=> 1,
            ],





        ];

        foreach ($Blogs as $key => $blog) {
            Blog::create($blog);
        }
    }

}
