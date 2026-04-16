<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@if ($action == 'create')Добавить@elseИзменить@endif адрес</title>
</head>
<body>
    <h2>@if ($action == 'create')Добавить@elseИзменить@endif адрес</h2>
    <form name="address" method="post" action="@if ($action == 'create'){{ route('addresses.store') }}@else {{ route('addresses.update', ['address' => $address]) }}@endif">
        @csrf
        @if ($action == 'edit') @method('PUT') @endif
        <label for="address">Адрес:</label>
        <input type="text" name="address" id="address" value="@if ($action == 'create'){{ old('address') }}@else{{ $address->address }}@endif" />
        @error('address')
            <span>{{ $message }}</span>
        @enderror
        <br />
        <br />
        <input type="submit" value="@if ($action == 'create')Добавить@elseИзменить@endif" />
    </form>
</body>
</html>
