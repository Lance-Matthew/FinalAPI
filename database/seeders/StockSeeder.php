<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;


class StockSeeder extends Seeder
{
    public function run(): void
    {
        $placeholder = "LOGO.png";
        DB::table("stocks")->insert([
            // CITE
            // BSIT //
            [
                'stockName' => 'Corporate (M)', //
                'stockPhoto' => 'BSIT.jpg',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)', //
                'stockPhoto' => 'BSIT.jpg',
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'Corporate (F)', 
                'stockPhoto' => 'BSIT.jpg',
                'Course' => 'BSIT',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)', 
                'stockPhoto' => 'BSIT.jpg',
                'Course' => 'BSIT',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Skirt',
            ],
            [
                'stockName' => 'RSO', //
                'stockPhoto' => $placeholder,
                'Course' => 'BSIT',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],



            // CAHS
            // BSN //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSN.png',
                'Course' => 'BSN',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSN.png',
                'Course' => 'BSN',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            /// FF
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSN.png',
                'Course' => 'BSN',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSN.png',
                'Course' => 'BSN',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSN',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],




            // BSMLS //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSMLS.png',
                'Course' => 'BSMLS',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSMLS.png',
                'Course' => 'BSMLS',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            /// FF
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSMLS.png',
                'Course' => 'BSMLS',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSMLS.png',
                'Course' => 'BSMLS',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSMLS',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],



            // BSPHARMA //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSPHARMA.png',
                'Course' => 'BSPHARMA',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSPHARMA.png',
                'Course' => 'BSPHARMA',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            // FFF
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSPHARMA.png',
                'Course' => 'BSPHARMA',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSPHARMA.png',
                'Course' => 'BSPHARMA',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSPHARMA',
                'Gender' => 'Female',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],


            // BSPSYCH //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSPSYCH.png',
                'Course' => 'BSPSYCH',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSPSYCH.png',
                'Course' => 'BSPSYCH',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSPSYCH',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSPSYCH.png',
                'Course' => 'BSPSYCH',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSPSYCH.png',
                'Course' => 'BSPSYCH',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],

            // CEAaa
            // BSCE //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSCE.png',
                'Course' => 'BSCE',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSCE.png',
                'Course' => 'BSCE',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSCE',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSCE.png',
                'Course' => 'BSCE',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSCE.png',
                'Course' => 'BSCE',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],


            // BSCPE //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSCPE.png',
                'Course' => 'BSCPE',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSCPE.png',
                'Course' => 'BSCPE',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSCPE',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSCPE.png',
                'Course' => 'BSCPE',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSCPE.png',
                'Course' => 'BSCPE',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],

            // BSECE //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSECE.png',
                'Course' => 'BSECE',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSECE.png',
                'Course' => 'BSECE',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSECE',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSECE.png',
                'Course' => 'BSECE',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSECE.png',
                'Course' => 'BSECE',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],

            // BSARCHI
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSARCHI.png',
                'Course' => 'BSARCHI',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSARCHI.png',
                'Course' => 'BSARCHI',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSARCHI',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSARCHI.png',
                'Course' => 'BSARCHI',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSARCHI.png',
                'Course' => 'BSARCHI',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            
            // // CMA
            // // BSA //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSA.png',
                'Course' => 'BSA',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSA.png',
                'Course' => 'BSA',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSA',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSA.png',
                'Course' => 'BSA',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSA.png',
                'Course' => 'BSA',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Skirt',
            ],

            // // BST //
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BST.png',
                'Course' => 'BST',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BST.png',
                'Course' => 'BST',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BST',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BST.png',
                'Course' => 'BST',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BST.png',
                'Course' => 'BST',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Skirt',
            ],


            // // BSHM
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSHM.png',
                'Course' => 'BSHM',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSHM.png',
                'Course' => 'BSHM',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSHM',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSHM.png',
                'Course' => 'BSHM',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSHM.png',
                'Course' => 'BSHM',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Skirt',
            ],
            

            // // CELA
            // // BSED
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSED.png',
                'Course' => 'BSED',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSED.png',
                'Course' => 'BSED',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSED',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSED.png',
                'Course' => 'BSED',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSED.png',
                'Course' => 'BSED',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],



            // // BSPOLSCI
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'POLSCI.png',
                'Course' => 'BSPOLSCI',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'POLSCI.png',
                'Course' => 'BSPOLSCI',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSPOLSCI',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'POLSCI.png',
                'Course' => 'BSPOLSCI',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'POLSCI.png',
                'Course' => 'BSPOLSCI',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            

            // // CCJE
            // // BSCRIM
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSCRIM.png',
                'Course' => 'BSCRIM',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (M)',
                'stockPhoto' => 'BSCRIM.png',
                'Course' => 'BSCRIM',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'BSCRIM',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSCRIM.png',
                'Course' => 'BSCRIM',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'Corporate (F)',
                'stockPhoto' => 'BSCRIM.png',
                'Course' => 'BSCRIM',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],

            // // CAS //
            [
                'stockName' => 'University (M)',
                'stockPhoto' => 'UNIVERSITY.jpg',
                'Course' => 'CAS',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'University (M)',
                'stockPhoto' => 'UNIVERSITY.jpg',
                'Course' => 'CAS',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'RSO',
                'stockPhoto' => $placeholder,
                'Course' => 'CAS',
                'Gender' => 'Male',
                'Type' => 'RSO',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'University (F)',
                'stockPhoto' => 'UNIVERSITY.jpg',
                'Course' => 'CAS',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'University (F)',
                'stockPhoto' => 'UNIVERSITY.jpg',
                'Course' => 'CAS',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Skirt',
            ],
            

            // // SHS //
            [
                'stockName' => 'SHS (M)',
                'stockPhoto' => 'SHS.png',
                'Course' => 'SHS',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'SHS (M)',
                'stockPhoto' => 'SHS.png',
                'Course' => 'SHS',
                'Gender' => 'Male',
                'Type' => 'Corporate',
                'Body' => 'Pants',
            ],
            [
                'stockName' => 'SHS (F)',
                'stockPhoto' => 'SHS.png',
                'Course' => 'SHS',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Shirt',
            ],
            [
                'stockName' => 'SHS (F)',
                'stockPhoto' => 'SHS.png',
                'Course' => 'SHS',
                'Gender' => 'Female',
                'Type' => 'Corporate',
                'Body' => 'Skirt',
            ],   
        ]);
    }
}