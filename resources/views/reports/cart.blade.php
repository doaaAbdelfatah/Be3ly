<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    <h1>المبيعات</h1>
    @forelse ($products as $product)
        <div>
            <h2>{{$product->name}}</h2>
            <h4>{{$product->price}}</h4>
        </div>
        <hr>
    @empty

    @endforelse

</body>
</html>
