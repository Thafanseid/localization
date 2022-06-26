<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $datas= [

            [
                'title_in_english' => 'I am study Laravel.',
                'title_in_myanmar' => 'ကျွန်တော်က Laravel ကိုလေ့လာနေပါတယ်။',
                'body_in_english' => 'First, download the Laravel installer using Composer.',
                'body_in_myanmar' => 'ပထမဦးစွာ Composer ကိုအသုံးပြု၍ Laravel installer ကိုဒေါင်းလုဒ်လုပ်ပါ။'

            ],
            [
                'title_in_english' => 'I am study Laravel.',
                'title_in_myanmar' => 'ကျွန်တော်က Laravel ကိုလေ့လာနေပါတယ်။',
                'body_in_english' => 'First, download the Laravel installer using Composer.',
                'body_in_myanmar' => 'ပထမဦးစွာ Composer ကိုအသုံးပြု၍ Laravel installer ကိုဒေါင်းလုဒ်လုပ်ပါ။'

            ],
            [
                'title_in_english' => 'I am study Laravel.',
                'title_in_myanmar' => 'ကျွန်တော်က Laravel ကိုလေ့လာနေပါတယ်။',
                'body_in_english' => 'First, download the Laravel installer using Composer.',
                'body_in_myanmar' => 'ပထမဦးစွာ Composer ကိုအသုံးပြု၍ Laravel installer ကိုဒေါင်းလုဒ်လုပ်ပါ။'

            ]
        ];

        foreach($datas as $key=>$value)
        {
            Post::create([
                'title_in_english' => $value['title_in_english'],
                'title_in_myanmar' => $value['title_in_myanmar'],
                'body_in_english' => $value['body_in_english'],
                'body_in_myanmar' => $value['body_in_myanmar'],
            ]);
        }
    }
}
