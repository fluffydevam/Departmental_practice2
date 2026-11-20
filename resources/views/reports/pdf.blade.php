<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #444; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Equipment Inventory Report</h2>
    <p>Generated: {{ now()->format('Y-m-d H:i') }}</p>
    <p>
        Total items: {{ $inventory->count() }} |
        Total unit price: {{ number_format($inventory->sum('unit_price'), 2) }}
    </p>

    <table>
        <thead>
            <tr>
                <th>Equipment Name</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Availability Status</th>
                <th>Added By</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</body>
</html>
