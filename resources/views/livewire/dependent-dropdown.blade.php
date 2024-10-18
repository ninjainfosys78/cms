<div class="relative">
    <div class="province col-span-1">
        <label for="provinces" class="block text-sm font-semibold mb-2 text-gray-600">Select Province</label>
        <select id="provinces" name="province_id"
            wire:model.live="selectedProvince"
            class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            <option value="" selected disabled>Select a Province</option>
            @foreach($provinces as $province)
                <option value="{{ $province->id }}" {{ $selectedProvince == $province->id ? 'selected' : '' }}>
                    {{ $province->province }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="district">
        <label for="districts" class="block text-sm font-semibold mb-2 text-gray-600">Select District</label>
        <select id="districts" name="district_id"
            wire:model.live="selectedDistrict"
            class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            <option value="" selected disabled>Select a District</option>
            @if($districts)
                @foreach($districts as $district)
                    <option value="{{ $district->id }}" {{ $selectedDistrict == $district->id ? 'selected' : '' }}>
                        {{ $district->district }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="local_body">
        <label for="local_bodies" class="block text-sm font-semibold mb-2 text-gray-600">Local Body</label>
        <select id="local_bodies" name="local_body_id"
                wire:model.live="selectedLocalBody"
                class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            <option value="" selected disabled>Select Local Body</option>
            @if($local_bodies)
                @foreach($local_bodies as $local_body)
                    <option value="{{ $local_body->id }}" {{ $selectedLocalBody == $local_body->id ? 'selected' : '' }}>
                        {{ $local_body->local_body }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="ward">
        {{-- <label for="wards" class="block text-sm font-semibold mb-2 text-gray-600">Select Province</label> --}}
        <x-forms.TextInput
            label="Ward"
            name="ward_no"
            min='1'
            type="number"
        />
        {{-- <select id="wards" name="ward_no"
            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0"
            aria-describedby="helper-wards"
            style="height: 3rem; /* Adjust height as needed */">
            <option value="" selected disabled>Select Ward</option>
            @if($wards)
                @foreach($wards as $ward)
                    <option value="{{ $ward->id }}">{{ $ward->ward }}</option>
                @endforeach
            @endif
        </select> --}}
    </div>
</div>
