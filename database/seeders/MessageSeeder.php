<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::insert([
            [
                "category_id" => "2",
                "agency_id" => "1",
                "name"=> "anonymous",
                "title"=> "LAPORAN KEGIATAN PENDATAAN MASYARAKAT",
                "report" => "Kegiatan pendataan masyarakat ini bertujuan untuk memperoleh informasi mengenai kondisi sosial, ekonomi, dan demografis masyarakat di Desa Suka Maju. Data ini diharapkan dapat digunakan sebagai acuan dalam perencanaan program pemberdayaan masyarakat yang lebih tepat sasaran.",
                "date"=> "29-10-20",
                "code"=> "345343",
                "email" => "crasumbas@gmail.com"

            ],
            [
                "category_id" => "2",
                "agency_id" => "1",
                "name"=> "anonymous",
                "title"=> "LAPORAN",
                "report" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis recusandae deserunt reiciendis ipsa dolor? At repellat minus excepturi animi ipsum.",
                "date"=> "29-10-20",
                "code"=> "34534233",
                "email" => "crasumbas@gmail.com"
            ],
            [
                "category_id" => "2",
                "agency_id" => "2",
                "name"=> "anonymous",
                "title"=> "LAPORAN KEGIATAN PENDATAAN MASYARAKAT",
                "report" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. At doloremque quibusdam dolores quidem est labore libero ipsa eaque distinctio esse?",
                "date"=> "29-10-20",
                "code"=> "3453413",
                "email" => "crasumbas@gmail.com",

            ],
            [
                "category_id" => "2",
                "agency_id" => "2",
                "name"=> "anonymous",
                "title"=> "LAPORAN KEGIATAN PENDATAAN MASYARAKAT",
                "report" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis libero unde similique quis id voluptatem aliquam quae perferendis velit minus!",
                "date"=> "29-10-20",
                "code"=> "3453453",
                "email" => "crasumbas@gmail.com",

            ],
            [
                "category_id" => "2",
                "agency_id" => "3",
                "name"=> "anonymous",
                "title"=> "LAPORAN KEGIATAN PENDATAAN MASYARAKAT",
                "report" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio cum sapiente voluptatum repellendus aspernatur aut assumenda esse numquam. Ipsam, provident!",
                "date"=> "29-10-20",
                "code"=> "3453433",
                "email" => "crasumbas@gmail.com",

            ],
            [
                "category_id" => "2",
                "agency_id" => "3",
                "name"=> "anonymous",
                "title"=> "LAPORAN KEGIATAN PENDATAAN MASYARAKAT",
                "report" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas suscipit necessitatibus iste libero nobis odit vero eum ipsum fugiat soluta.",
                "date"=> "29-10-20",
                "code"=> "3453473",
                "email" => "crasumbas@gmail.com",

            ],
        ]);
    }
}
