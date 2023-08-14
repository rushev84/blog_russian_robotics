<div class="col-md-12 col-lg-4 sidebar">

{{--    @component('components.search-form')--}}
{{--    @endcomponent--}}

{{--    @component('components.bio')--}}
{{--    @endcomponent--}}

{{--    @component('components.popular-posts')--}}
{{--    @endcomponent--}}

    @component('components.categories', [
        'categories' => $categories,
        ])
    @endcomponent

</div>
