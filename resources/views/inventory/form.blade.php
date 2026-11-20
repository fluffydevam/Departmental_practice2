<p>
    <label>Equipment Name</label><br>
    <input type="text" name="equipment_name" value="{{ old('equipment_name', $inventory->equipment_name ?? '') }}">
    @error('equipment_name') <span style="color:red">{{ $message }}</span> @enderror
</p>

<p>
    <label>Category</label><br>
    <select name="category">
        @foreach (['paddles', 'balls', 'nets', 'accessories'] as $category)
            <option value="{{ $category }}" @selected(old('category', $inventory->category ?? '') === $category)>
                {{ ucfirst($category) }}
            </option>
        @endforeach
    </select>
    @error('category') <span style="color:red">{{ $message }}</span> @enderror
</p>

<p>
    <label>Unit Price</label><br>
    <input type="number" step="0.01" min="0" name="unit_price" value="{{ old('unit_price', $inventory->unit_price ?? '') }}">
    @error('unit_price') <span style="color:red">{{ $message }}</span> @enderror
</p>

<p>
    <label>Description</label><br>
    <textarea name="description">{{ old('description', $inventory->description ?? '') }}</textarea>
    @error('description') <span style="color:red">{{ $message }}</span> @enderror
</p>

<p>
    <label>Stock Status</label><br>
    <select name="availability_status">
        <option value="available" @selected(old('availability_status', $inventory->availability_status ?? 'available') === 'available')>Available</option>
        <option value="unavailable" @selected(old('availability_status', $inventory->availability_status ?? '') === 'unavailable')>Unavailable</option>
    </select>
    @error('availability_status') <span style="color:red">{{ $message }}</span> @enderror
</p>
