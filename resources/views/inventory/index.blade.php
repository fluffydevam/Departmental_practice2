@extends('layouts.admin')

@section('content')
      <h1>Inventory</h1>
      <a href="{{ route('inventory.create') }}">+ Add Inventory</a>

      <table border="1" cellpadding="6">
        <tr>
            <th>Equipment Name</th><th>Category</th><th>Unit Price</th><th>Description</th><th>Status</th><th>Added By</th><th>Actions</th>
        </tr>
        @forelse ($inventory as $item)
            <tr>
                <td>{{ $item->equipment_name }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ number_format($item->unit_price, 2) }}</td>
                <td>{{ $item->description }}</td>
              <td>{{ $item->availability_status === 'available' ? 'Available' : 'Unavailable' }}</td>
                <td>{{ $item->user->name ?? 'Unknown' }}</td>
                <td>
                    <a href="{{ route('inventory.show', $item) }}">View</a>
                    <a href="{{ route('inventory.edit', $item) }}">Edit</a>
                    <form method="POST" action="{{ route('inventory.destroy', $item) }}" style="display:inline"
                        onsubmit="return confirm('Delete this Equipment?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7">No Equipment Yet.</td></tr>
            @endforelse
      </table>

      {{ $inventory->links() }}
      @endsection
