<?php $view->script('user-edit', 'system/user:app/admin/edit.js', ['vue', 'uikit-form-password']) ?>

<form id="js-user-edit" name="form" class="uk-form uk-form-horizontal" v-on="valid: save" v-cloak>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>

            <h2 class="uk-margin-remove">{{ 'Edit User' | trans }}</h2>

        </div>
        <div data-uk-margin>

            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>
            <a class="uk-button" v-attr="href: $url('admin/user')">{{ user.id ? 'Close' : 'Cancel' | trans }}</a>

        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-3-4">

            <div class="uk-form-row">
                <label for="form-username" class="uk-form-label">{{ 'Username' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-username" class="uk-form-width-large" type="text" name="username" v-model="user.username" v-valid="required">
                    <p class="uk-form-help-block uk-text-danger" v-show="form.username.invalid">{{ 'Username cannot be blank.' | trans }}</p>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-name" class="uk-form-label">{{ 'Name' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-name" class="uk-form-width-large" type="text" name="name" v-model="user.name" v-valid="required">
                    <p class="uk-form-help-block uk-text-danger" v-show="form.name.invalid">{{ 'Name cannot be blank.' | trans }}</p>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-email" class="uk-form-label">{{ 'Email' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-email" class="uk-form-width-large" type="text" name="email" v-model="user.email" v-valid="email" lazy>
                    <p class="uk-form-help-block uk-text-danger" v-show="form.email.invalid">{{ 'Field must be a valid email address.' | trans }}</p>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-password" class="uk-form-label">{{ 'Password' | trans }}</label>
                <div class="uk-form-controls uk-form-controls-text js-password" v-show="user.id">
                    <a href="#" data-uk-toggle="{ target: '.js-password' }">{{ 'Change password' | trans }}</a>
                </div>
                <div class="uk-form-controls js-password" v-class="'uk-hidden' : user.id">
                    <div class="uk-form-password">
                        <input id="form-password" class="uk-form-width-large" type="password" v-model="password">
                        <a href="" class="uk-form-password-toggle" data-uk-form-password="{ lblShow: '{{ 'Show' | trans }}', lblHide: '{{ 'Hide' | trans }}' }">{{ 'Show' | trans }}</a>
                    </div>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Status' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-form-controls-condensed" v-repeat="statuses">
                        <label><input type="radio" v-model="user.status" value="{{ $key }}" v-attr="disabled: config.currentUser == user.id"> {{ $value }}</label>
                    </p>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Roles' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-form-controls-condensed" v-repeat="role: roles">
                        <label><input type="checkbox" v-model="role.selected" v-attr="disabled: role.disabled"> {{ role.name }}</label>
                    </p>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Last login' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    <p>{{ $trans('%date%', { date: user.login ? $date(user.login, 'medium') : $trans('Never') }) }}</p>
                </div>
            </div>

            <div class="uk-form-row">
                <span class="uk-form-label">{{ 'Registered since' | trans }}</span>
                <div class="uk-form-controls uk-form-controls-text">
                    {{ $trans('%date%', { date: $date(user.registered, 'medium') }) }}
                </div>
            </div>

        </div>
        <div class="uk-width-medium-1-4">

            <div class="uk-panel uk-panel-box uk-text-center">

                <div class="uk-panel-badge uk-badge" v-if="user.isNew">{{ 'New' | trans }}</div>
                <div class="uk-panel-badge uk-badge uk-badge-{{ user.status ? 'success' : 'danger' }}" v-if="!user.isNew">{{ statuses[user.status] }}</div>

                <div class="uk-panel-teaser">
                    <img height="280" width="280" v-gravatar="user.email">
                </div>

                <h3 class="uk-panel-tile uk-margin-bottom-remove">{{ user.name }}</h3>
                <div>
                    <a href="mailto:{{ user.email }}">{{ user.email }}</a><i class="uk-icon-check" title="{{ 'Verified email address' | trans }}" v-show="config.emailVerification && user.data.verified"></i>
                </div>

            </div>

        </div>
    </div>

</form>
