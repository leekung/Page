<div class="box-body">
    <div class="box-body">
        <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[title]", trans('page::pages.form.title')) !!}
            {!! Form::text("{$lang}[title]", old("{$lang}.title"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('page::pages.form.title')]) !!}
            {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
        </div>
        <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[slug]", trans('page::pages.form.slug')) !!}
            {!! Form::text("{$lang}[slug]", old("{$lang}.slug"), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('page::pages.form.slug')]) !!}
            {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
        </div>
        <div class='form-group{{ $errors->has("{$lang}.body") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[body]", trans('page::pages.form.body')) !!}
            <textarea class="ckeditor" name="{{$lang}}[body]" rows="10" cols="80">{{ old("{$lang}.body") }}</textarea>
            {!! $errors->first("{$lang}.body", '<span class="help-block">:message</span>') !!}
        </div>
        <?php if (config('asgard.page.config.partials.translatable.create') !== []): ?>
            <?php foreach (config('asgard.page.config.partials.translatable.create') as $partial): ?>
                @include($partial)
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="box-group" id="accordion-{{$lang}}">
        @foreach (config('meta.available_metas') as $meta_group_name => $meta_group)
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a class="collapsed" data-toggle="collapse" href="#collapsePanel-{{ $meta_group_name }}-{{ $lang }}">
                            <i class="fa fa-{{ $meta_group_name }}" aria-hidden="true"></i>
                            {{ ucwords($meta_group_name) }} {{ trans('page::pages.form.meta_data') }}
                        </a>
                    </h4>
                </div>
                <div id="collapsePanel-{{ $meta_group_name }}-{{ $lang }}" class="panel-collapse collapse">
                    <div class="box-body">
                        @foreach($meta_group as $key => $val)
                            @if ($val['edit'] != false)
                                <div class='form-group{{ $errors->has("{$lang}[metable][{$meta_group_name}][{$key}]") ? ' has-error' : '' }}'>
                                    {!! Form::label("{$lang}[metable][{$meta_group_name}][{$key}]", $key) !!}
                                    {!! Form::text("{$lang}[metable][{$meta_group_name}][{$key}]", old("{$lang}.metable.{$meta_group_name}.{$key}"), ['class' => "form-control", 'maxlength' => $val['maxlength']]) !!}
                                    {!! $errors->first("{$lang}[metable][{$meta_group_name}][{$key}]", '<span class="help-block">:message</span>') !!}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
