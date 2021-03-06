@component('mail::message')
# Introduction

Our Products
@foreach (\App\Models\Product::orderBy("created_at" , "desc")->limit(5)->get() as $product)
    - ** {{$product->name}} - {{$product->price}}
@endforeach


@component('mail::button', ['url' => config('app.url')])
shop now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
