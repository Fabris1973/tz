<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Адреса</title>
</head>
<body>
    <ul>
        @foreach ($addresses as $address)
            <li>
                <a href="{{ route('addresses.show', ['address' => $address]) }}">{{ $address->address }}</a>
                -
                <a href="{{ route('addresses.edit', ['address' => $address]) }}">Редактировать</a>
                -
                <form name="delete" method="post" action="{{ route('addresses.destroy', ['address' => $address]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Удалить" />
                </form>
            </li>
        @endforeach
        <li>
            <a href="{{ route('addresses.create') }}">Добавить ещё</a>
        </li>
    </ul>
</body>
</html>
