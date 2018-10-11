<?php


use BlazeCMS\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class PageSeeder extends Seeder
{
    private $pages;

    public function __construct()
    {
        $files = Storage::disk('database')->files('sources/pages');

        foreach ($files as $file) {
            if (ends_with($file, '.json')) {
                $path = database_path($file);
                $this->pages = json_decode(file_get_contents($path), false);

                break; //page builder supports only one seed file
            }
        }

        $this->pages = collect($this->pages);

    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        foreach ($this->pages as $page) {
            $this->createPage($page);
        }
    }


    private function createPage($item, $parent_id = null)
    {

        $locale = fallback_locale();

        $menu = new Page();
        if (isset($parent_id)) {
            $menu->parent_id = $parent_id;
        }
        $menu->status = "public";
        //translation
        $menu->translateOrNew($locale)->title = $item->title;
        $menu->save();
        $menu->populatePath();

        if (isset($item->sub_pages))

            foreach ($item->sub_pages as $sub_page) {


                $this->createPage($sub_page, $menu->id);
            }

    }

}
