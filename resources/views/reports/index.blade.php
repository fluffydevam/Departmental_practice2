@extends('layouts.admin')

@section('content')
    <h1>Equipment Report</h1>

    <form method="GET" action="{{ route('reports.index') }}">
        <select name="category">
            <option value="">All Categories</option>
            @foreach (['paddles', 'balls', 'nets', 'accessories'] as $category)
                <option value="{{ $category }}" @selected(request('category') === $category)>
                    {{ ucfirst($category) }}
                </option>
            @endforeach
        </select>

        <select name="availability_status">
            <option value="">All Statuses</option>
            <option value="available" @selected(request('availability_status') === 'available')>Available</option>
            <option value="unavailable" @selected(request('availability_status') === 'unavailable')>Unavailable</option>
        </select>

        <button type="submit">Filter</button>
        <a href="{{ route('reports.index') }}">Reset</a>
        <a href="{{ route('reports.pdf', request()->query()) }}">Export PDF</a>
    </form>

    <p>
        Quick:
        <a href="{{ route('reports.index', ['availability_status' => 'available']) }}">Available</a> |
        <a href="{{ route('reports.index', ['availability_status' => 'unavailable']) }}">Unavailable</a>
    </p>

    <p>
        Showing <strong>{{ $inventory->count() }}</strong> item(s)
        with a total unit price of <strong>{{ number_format($inventory->sum('unit_price'), 2) }}</strong>.
    </p>

    <table border="1" cellpadding="6">
        <tr>
            <th>Name</th><th>Category</th><th>Price</th><th>Status</th><th>Added By</th>
        </tr>
        @forelse ($inventory as $item)
            <tr>
                <td>{{ $item->equipment_name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ number_format($item->unit_price, 2) }}</td>
                <td>{{ $item->availability_status === 'available' ? 'Available' : 'Unavailable' }}</td>
                <td>{{ $item->user->name ?? 'Unknown' }}</td>
            </tr>
        @empty
            <tr><td colspan="5">No equipment match these filters.</td></tr>
        @endforelse
    </table>
@endsection
