<?php namespace Modules\Page\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Page\Events\Handlers\CreateMetaAllLocale;
use Modules\Page\Events\Handlers\DeleteMetaAllLocale;
use Modules\Page\Events\PageWasCreated;
use Modules\Page\Events\PageWasDeleted;
use Modules\Page\Events\PageWasUpdated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PageWasCreated::class => [
            CreateMetaAllLocale::class,
        ],
        PageWasUpdated::class => [
            CreateMetaAllLocale::class,
        ],
        PageWasDeleted::class => [
            DeleteMetaAllLocale::class,
        ],
    ];
}
