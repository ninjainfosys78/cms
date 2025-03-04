@props([
    'selectedProvince'=>null,
    'selectedDistrict'=>null,
    'selectedLocalBody'=>null
])

<div class="relative grid grid-cols-2 gap-4 col-span-2">
    <!-- Province Dropdown -->
    <div class="province col-span-1">
        <label for="provinces" class="block text-sm font-semibold mb-2 text-gray-600">Select Province</label>
        <select id="provinces" name="province_id" wire:model.live="selectedProvince"
                class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            @foreach($provinces as $province)
                <option value="{{ $province->id }}" {{ $selectedProvince == $province->id ? 'selected' : '' }}>
                    {{ $province->province }}
                </option>
            @endforeach
        </select>
        @error('province_id') <p class="text-sm mt-2 text-red-600">{{ $message }}</p> @enderror
    </div>

    <!-- District Dropdown -->
    <div class="district col-span-1">
        <label for="districts" class="block text-sm font-semibold mb-2 text-gray-600">Select District</label>
        <select id="districts" name="district_id" wire:model.live="selectedDistrict"
                class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            @foreach($districts as $district)
                <option value="{{ $district->id }}" {{ $selectedDistrict == $district->id ? 'selected' : '' }}>
                    {{ $district->district }}
                </option>
            @endforeach
        </select>
        @error('district_id') <p class="text-sm mt-2 text-red-600">{{ $message }}</p> @enderror
    </div>

    <!-- Local Body Dropdown -->
    <div class="local_body col-span-1">
        <label for="local_bodies" class="block text-sm font-semibold mb-2 text-gray-600">Local Body</label>
        <select id="local_bodies" name="local_body_id" wire:model.live="selectedLocalBody"
                class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            @foreach($local_bodies as $local_body)
                <option value="{{ $local_body->id }}" {{ $selectedLocalBody == $local_body->id ? 'selected' : '' }}>
                    {{ $local_body->local_body }}
                </option>
            @endforeach
        </select>
        @error('local_body_id') <p class="text-sm mt-2 text-red-600">{{ $message }}</p> @enderror
    </div>
</div>
