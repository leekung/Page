@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('page::pages.title.pages') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('page::pages.title.pages') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ URL::route('admin.page.page.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('page::pages.button.create page') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="snp_navigation">
                        <nav class="items snp_navigationInner">
                            <div class="item hasSubmenu"><span>{{ trans('message.Company') }}</span></div>
                            <nav class="items subNavigation" id="subNavigationCompany">
                                <div class="item"><a href="{{ URL::route('admin.page.page.edit', 4) }}"><span>{{ trans('message.About S&P') }}</span></a>
                                </div>
                                <div class="item"><a href="{{ URL::route('admin.page.page.edit', 9) }}"><span>{{ trans('message.Learning Center') }}</span></a></div>
                                <div class="item"><a href="{{ URL::route('admin.page.page.edit', 6) }}"><span>{{ trans('message.CSR') }}</span></a></div>
                                <div class="item"><a href="{{ URL::route('admin.page.page.edit', 7) }}"><span>{{ trans('message.Career') }}</span></a></div>
                                <div class="item hide"><a href=""><span>{{ trans('message.Contact us') }}</span></a></div>
                            </nav>
                            <div class="item hasSubmenu"><span>{{ trans('message.Product & Service') }}</span></div>
                            <nav class="items subNavigation" id="subNavigationProduct">
                                <div class="item"><a href="{{ URL::route('admin.page.page.edit', 2) }}"><span>{{ trans('message.Cake Gallery') }}</span></a></div>
                                <div class="item">
                                    <a href="{{ URL::route('admin.page.page.edit', 15) }}"><span>{{ trans('message.Bakery-Cake') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 16) }}"><span>{{ trans('message.Bakery-Bread') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 17) }}"><span>{{ trans('message.Bakery-MoonCake') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 18) }}"><span>{{ trans('message.Bakery-Pastry') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 19) }}"><span>{{ trans('message.Bakery-Cookies') }}</span></a>

                                </div>
                                <div class="item">
                                    <a href="{{ URL::route('admin.page.page.edit', 14) }}"><span>{{ trans('message.Restaurant-Breakfast') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 13) }}"><span>{{ trans('message.Restaurant-Highlight Menu') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 12) }}"><span>{{ trans('message.Restaurant-Healthy Meal') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 11) }}"><span>{{ trans('message.Restaurant-Beverage & Dessert') }}</span></a>
                                </div>
                                <div class="item">
                                    <a href="{{ URL::route('admin.page.page.edit', 21) }}"><span>{{ trans('message.Coffee-Espresso Hot') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 22) }}"><span>{{ trans('message.Coffee-Iced Espresso') }}</span></a>
                                    | <a href="{{ URL::route('admin.page.page.edit', 20) }}"><span>{{ trans('message.Coffee-Espresso Frost') }}</span></a>
                                </div>
                                <div class="item"><a href="#"><span>{{ trans('message.Package Food') }}</span></a></div>
                                <div class="item"><a href="#"><span>{{ trans('message.Caterman') }}</span></a></div>
                            </nav>
                            <div class="item"><a href="#"><span>{{ trans('message.Investor Relations') }}</span></a></div>
                            <div class="item hide"><a href=""><span>{{ trans('message.Promotion') }}</span></a></div>
                            <div class="item"><a href="{{ URL::route('admin.page.page.edit', 3) }}"><span>{{ trans('message.Joy Card') }}</span></a></div>
                            <div class="item hide"><a href="#"><span>{{ trans('message.News & Activity') }}</span></a></div>
                            <div class="item"><a href="{{ URL::route('admin.page.page.edit', 5) }}"><span>{{ trans('message.Store Locations') }}</span></a></div>
                            <hr>
                            <div class="item"><a href="{{ URL::route('admin.page.page.edit', 8) }}"><span>{{ trans('message.FAQ') }}</span></a></div>
                            <div class="item"><a href="{{ URL::route('admin.page.page.edit', 10) }}"><span>{{ trans('message.Sitemap') }}</span></a></div>
                            <div class="item"><a href="#"><span>{{ trans('S&P Magazine') }}</span></a></div>
                        </nav>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('styles')
<style type="text/css">
    .snp_navigation .hasSubmenu {
        font-weight:bold;
    }
    .snp_navigation .items.subNavigation {
        margin-left: 20px;
    }
    .snp_navigation .item {
        line-height: 2.5em;
    }
    .snp_navigation .item > a {
        padding: 5px;
    }
    .snp_navigation .item > a:hover {
        border-bottom: solid 2px #3c8dbc;
    }
</style>
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('page::pages.title.create page') }}</dd>
    </dl>
@stop

@section('scripts')
    <?php $locale = App::getLocale(); ?>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.page.page.create') ?>" }
                ]
            });
        });
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
