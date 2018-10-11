<?php

use BlazeCMS\Models\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TextSeeder extends Seeder
{

    private $sources;

    public function __construct()
    {

        $path = database_path('sources/texts.json');

        $this->sources = json_decode(file_get_contents($path), false);

        //text builder supports only one seed file
        $this->sources = collect($this->sources)->unique();

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->sources as $source) {
            
            $text = new Text();

            //translation
            $text->name = trim($source->name);

            foreach($source->values as $locale => $value) {
                $text->translateOrNew($locale)->value = trim($value);  

            }
            
            $text->save();
            
        }
    }



}
