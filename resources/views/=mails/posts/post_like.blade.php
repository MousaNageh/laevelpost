@component('mail::message')
# Introduction
<h3>{{ $liker->name }} has liked your post of</h3>

<div class="card">
    <div class="card-header">post</div>
    <div class="card-body">
        {{ $post->post }}
    </div>
</div>


@component('mail::button', ['url' => route("post")])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
