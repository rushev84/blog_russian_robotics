@extends('layouts.base')

@section('content')

    @component('components.inner-section', [
        'post' => $post,
        'categories' => $categories,
        ])
    @endcomponent

@endsection

