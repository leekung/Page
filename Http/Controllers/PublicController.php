<?php namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Media\Repositories\FileRepository;
use Modules\Page\Repositories\PageRepository;

class PublicController extends BasePublicController
{
    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var Application
     */
    private $app;
    /**
     * @var FileRepository
     */
    private $file;

    public function __construct(PageRepository $page, Application $app, FileRepository $file)
    {
        parent::__construct();
        $this->page = $page;
        $this->app = $app;
        $this->file = $file;
    }

    /**
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function uri($slug)
    {
        $page = $this->page->findBySlugInLocale($slug, $this->locale);

        $this->throw404IfNotFound($page);

        $template = $this->getTemplateForPage($page);
        $galleryFiles = $this->file->findMultipleFilesByZoneForEntity('gallery', $page);
        $thumbnail = $this->file->findFileByZoneForEntity('thumbnail', $page);

        return view($template, compact('page', 'galleryFiles', 'thumbnail'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        $page = $this->page->findHomepage();

        $this->throw404IfNotFound($page);

        $template = $this->getTemplateForPage($page);
        $thumbnail = $this->file->findFileByZoneForEntity('thumbnail', $page);

        return view($template, compact('page', 'thumbnail'));
    }

    /**
     * Return the template for the given page
     * or the default template if none found
     * @param $page
     * @return string
     */
    private function getTemplateForPage($page)
    {
        return (view()->exists($page->template)) ? $page->template : 'default';
    }

    /**
     * Throw a 404 error page if the given page is not found
     * @param $page
     */
    private function throw404IfNotFound($page)
    {
        if (is_null($page)) {
            $this->app->abort('404');
        }
    }
}
