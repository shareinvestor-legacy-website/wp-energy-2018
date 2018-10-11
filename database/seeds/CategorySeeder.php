<?php


use BlazeCMS\Models\User;
use BlazeCMS\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class CategorySeeder extends Seeder
{

    private $sources = [];

    public function __construct()
    {
        
        $path = database_path('sources/categories.json');

        $this->sources = json_decode(file_get_contents($path), false);

        //text builder supports only one seed file
        $this->sources = collect($this->sources)->unique();

    }

    private function create($item, $parent_id = null)
    {

        $locale = fallback_locale();

        $category = new Category();
        if (isset($parent_id)) {
            $category->parent_id = $parent_id;
        }
        $category->status = "public";
        //translation
        $category->translateOrNew($locale)->name = $item->name;
        $category->save();
        $category->populatePath();

        if (isset($item->sub_categories))

            foreach ($item->sub_categories as $child) {

                $this->create($child, $category->id);
            }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->sources as $source) {
            $this->create($source);
        }
     
    }
}
