<?php

namespace Modules\Page\Events\Handlers;

use Modules\Page\Entities\Page;

/**
 * Class DeleteMetaAllLocale
 * @package Modules\Page\Events\Handlers
 */
class DeleteMetaAllLocale
{
    /**
     * @param PageWasDeleted $event
     */
    public function handle($event)
    {
        $page = new Page();
        $page->id = $event->pageId;
        $page->meta->each(function ($item, $key) {
            $item->delete();
        });
    }
}
