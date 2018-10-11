<?php


use BlazeCMS\Models\Menu;
use BlazeCMS\Models\Page;
use BlazeCMS\Models\User;
use BlazeCMS\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class MenuSeeder extends Seeder
{
    private $menus = [];

    public function __construct()
    {
        $files = Storage::disk('database')->files('sources/menus');

        foreach ($files as $file) {

            if (ends_with($file, '.json')) {
                $path = database_path($file);
                $this->menus[] = json_decode(file_get_contents($path), false);
            }

        }

        $this->menus = collect($this->menus)->sortBy('order');
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->menus as $menu) {
            $this->createMenu($menu);
        }
    }


    private function createMenu($item, $parent_id = null)
    {

        $locale = fallback_locale();

        $menu = new Menu();
        if (isset($parent_id)) {
            $menu->parent_id = $parent_id;
        }
        $menu->status = "public";
        //translation
        $menu->translateOrNew($locale)->name = $item->name;
        $menu->save();
        $menu->populatePath();

        //try to find best match page and link it!
        $this->linkToBestMatchPage($menu);


        if (isset($item->submenus))

            foreach ($item->submenus as $submenu) {

                $this->createMenu($submenu, $menu->id);
            }

    }

    private function linkToBestMatchPage($menu)
    {

        $page = Page::where('slug', slugify($menu->name))->first();

        if (isset($page)) {
            $menu->page_id = $page->id;
            $menu->save();
        }

    }

}
