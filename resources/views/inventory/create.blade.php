@extends('layouts.admin')

@section('content')
    <h1>Add Inventory</h1>

    <form method="POST" action="{{ route('inventory.store') }}">
        @csrf
        @include('inventory.form')
        <button type="submit">Save</button>
    </form>
@endsection
