<?php

namespace Modules\Page\Events\Handlers;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Page\Entities\Page;

/**
 * Class CreateMetaAllLocale
 * @package Modules\Page\Events\Handlers
 */
class CreateMetaAllLocale
{
    /**
     * @param PageWasCreated|PageWasUpdated $event
     */
    public function handle($event)
    {
        $locales = LaravelLocalization::getSupportedLocales();
        $model = Page::find($event->pageId);

        foreach ($locales as $locale => $language) {
            $model->setLocale($locale);
            if (isset($event->data[$locale]['metable'])) {
                foreach ($event->data[$locale]['metable'] as $source => $meta) {
                    foreach ($meta as $name => $content) {
                        $content = trim($content);
                        if (!empty($content)) {
                            $model->updateMeta($name, $content);
                        }
                    }
                }
            }
        }
    }
}
