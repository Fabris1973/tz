<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Адрес {{ $address->address }}</title>
</head>
<body>
    <p>{{ $address->address }}</p>
    <a href="{{ route('addresses.index') }}">Вернуться к списку</a>
</body>
</html>
