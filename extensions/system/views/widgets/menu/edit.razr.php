<div class="uk-form-row">
    <label for="form-menu" class="uk-form-label">@trans('Menu')</label>
    <div class="uk-form-controls">
        <select id="form-menu" class="uk-form-width-large" name="widget[settings][menu]">
            @foreach (menus as menu)
            <option value="@menu.id"@(menu.id == widget.get('menu') ? ' selected')>@menu.name</option>
            @endforeach
        </select>
    </div>
</div>
<div class="uk-form-row">
    <label for="form-style" class="uk-form-label">@trans('Style')</label>
    <div class="uk-form-controls">
        <select id="form-style" class="uk-form-width-large" name="widget[settings][style]">
            @foreach (styles as style)
            <option value="@style"@(style == widget.get('style') ? ' selected')>@style</option>
            @endforeach
        </select>
    </div>
</div>
<div class="uk-form-row">
    <label for="form-style" class="uk-form-label">@trans('Start Level')</label>
    <div class="uk-form-controls">
        <select id="form-style" class="uk-form-width-large" name="widget[settings][start_level]">
            @foreach ([1,2,3,4,5,6,7,8,9,10] as value)
            <option value="@(value + 1)"@(value + 1 == widget.get('start_level') ? ' selected')>@trans(value)</option>
            @endforeach
        </select>
    </div>
</div>
<div class="uk-form-row">
    <label for="form-style" class="uk-form-label">@trans('Depth')</label>
    <div class="uk-form-controls">
        <select id="form-style" class="uk-form-width-large" name="widget[settings][depth]">
            <option value="">@trans('- No Limit -')</option>
            @foreach ([1,2,3,4,5,6,7,8,9,10] as value)
            <option value="@(value + 1)"@(value + 1 == widget.get('depth') ? ' selected')>@trans(value)</option>
            @endforeach
        </select>
    </div>
</div>
<div class="uk-form-row">
    <span class="uk-form-label">@trans('Sub Items')</span>
    <div class="uk-form-controls uk-form-controls-text">
        <p class="uk-form-controls-condensed">
            <label><input type="radio" name="widget[settings][mode]" value="all"@('all' === widget.get('mode', 'all') ? ' checked')> @trans('Show all')</label>
        </p>
        <p class="uk-form-controls-condensed">
            <label><input type="radio" name="widget[settings][mode]" value="active"@('active' === widget.get('mode') ? ' checked')> @trans('Show only for active item')</label>
        </p>
    </div>
</div>