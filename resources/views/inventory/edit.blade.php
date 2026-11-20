@extends('layouts.admin')

@section('content')
    <h1>Edit Inventory</h1>

    <form method="POST" action="{{ route('inventory.update', $inventory) }}">
        @csrf
        @method('PUT')
        @include('inventory.form')
        <button type="submit">Update</button>
    </form>
@endsection
