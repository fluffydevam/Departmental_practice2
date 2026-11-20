@extends('layouts.admin')

@section('content')
    <h1>{{ $inventory->equipment_name }}</h1>

    <p><strong>Category:</strong> {{ $inventory->category }}</p>
    <p><strong>Price:</strong> {{ number_format($inventory->unit_price, 2) }}</p>
    <p><strong>Status:</strong> {{ $inventory->availability_status === 'available' ? 'Available' : 'Unavailable' }}</p>
    <p><strong>Description:</strong> {{ $inventory->description }}</p>
    <p><strong>Added By:</strong> {{ $inventory->user->name ?? 'Unknown' }}</p>

    <a href="{{ route('inventory.edit', $inventory) }}">Edit</a> |
    <a href="{{ route('inventory.index') }}">Back to list</a>
@endsection
