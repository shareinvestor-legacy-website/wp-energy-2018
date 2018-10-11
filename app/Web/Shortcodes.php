<?php
/**
 * Created by PhpStorm.
 * User: atthakorn
 * Date: 8/20/2016
 * Time: 05:29
 */

namespace BlazeCMS\Web;


use BlazeCMS\Web\Services\ApiService;
use BlazeCMS\Web\Services\CategoryService;
use BlazeCMS\Web\Services\DepartmentService;
use BlazeCMS\Web\Services\GalleryService;
use BlazeCMS\Web\Services\LocationService;
use BlazeCMS\Web\Services\PageService;
use BlazeCMS\Web\Services\PositionService;
use BlazeCMS\Web\Services\PostService;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;


class Shortcodes extends \BlazeCMS\Shortcode\Shortcodes
{

    protected $pageService;
    protected $postService;
    protected $categoryService;
    protected $galleryService;
    protected $positionService;
    protected $departmentService;
    protected $locationService;
    protected $apiService;


    public function __construct(PageService $pageService, PostService $postService, CategoryService $categoryService,
                                GalleryService $galleryService, PositionService $positionService, DepartmentService $departmentService,
                                LocationService $locationService, ApiService $apiService)
    {
        $this->pageService = $pageService;
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->galleryService = $galleryService;
        $this->positionService = $positionService;
        $this->departmentService = $departmentService;
        $this->locationService = $locationService;
        $this->apiService = $apiService;
    }


}