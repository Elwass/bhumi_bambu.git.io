<div>
    <label class="block mb-1 text-sm">Judul</label>
    <input type="text" name="title" value="{{ old('title', $package?->title) }}" class="w-full p-2 rounded text-black" required>
</div>
<div>
    <label class="block mb-1 text-sm">Slug (opsional)</label>
    <input type="text" name="slug" value="{{ old('slug', $package?->slug) }}" class="w-full p-2 rounded text-black">
</div>
<div>
    <label class="block mb-1 text-sm">Kategori</label>
    <select name="category" class="w-full p-2 rounded text-black" required>
        @foreach(['camping' => 'Berkemah', 'outbound' => 'Outbound', 'event' => 'Acara & Gathering', 'bamboo_education' => 'Edukasi Bambu', 'nature_tour' => 'Wisata Alam'] as $value => $label)
            <option value="{{ $value }}" @selected(old('category', $package?->category) === $value)> {{ $label }} </option>
        @endforeach
    </select>
</div>
<div>
    <label class="block mb-1 text-sm">Deskripsi</label>
    <textarea name="description" class="w-full p-2 rounded text-black" rows="4" required>{{ old('description', $package?->description) }}</textarea>
</div>
<div class="grid md:grid-cols-2 gap-3">
    <div>
        <label class="block mb-1 text-sm">Harga</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $package?->price) }}" class="w-full p-2 rounded text-black" required>
    </div>
    <div>
        <label class="block mb-1 text-sm">Durasi</label>
        <input type="text" name="duration" value="{{ old('duration', $package?->duration) }}" class="w-full p-2 rounded text-black" required>
    </div>
</div>
<div>
    <label class="block mb-1 text-sm">Lokasi</label>
    <input type="text" name="location" value="{{ old('location', $package?->location) }}" class="w-full p-2 rounded text-black" required>
</div>
<div>
    <label class="block mb-1 text-sm">Fasilitas</label>
    <textarea name="facilities" class="w-full p-2 rounded text-black" rows="3">{{ old('facilities', $package?->facilities) }}</textarea>
</div>
<div>
    <label class="block mb-1 text-sm">Thumbnail</label>
    <input type="file" name="thumbnail" class="w-full text-sm" accept="image/*">
    @if(!empty($package?->thumbnail))
        <p class="text-xs mt-1">Current: <a href="{{ asset('storage/' . $package->thumbnail) }}" target="_blank" class="underline">Lihat</a></p>
    @endif
</div>
<div class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $package?->is_active ?? true))>
    <label for="is_active">Aktif</label>
</div>
