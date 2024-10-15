{{-- @props([
    'label',
    'name',
    'id' => '',
    'options' => [],
    'class' => '',
    'helperText' => '',
    'selected' => null,
])

<div class="relative mb-6">
    <label for="{{ $id }}" class="block text-sm font-semibold mb-2 text-gray-600">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}"
            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 {{ $class }}"
            aria-describedby="helper-{{ $id }}"
            style="height: 3rem; /* Adjust height as needed */">
        @foreach($options as $value => $option)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
    <p class="text-sm text-gray-500 mt-2" id="helper-{{ $id }}">{{ $helperText }}</p>
    @error($name)
    <p class="text-sm mt-2 text-red-600">{{ $message }}</p>
    @enderror
</div> --}}

@props([
    'label',
    'name',
    'id' => '',
    'options' => [],
    'class' => '',
    'helperText' => '',
    'selected' => null,
])

<div class="relative mb-6">
    <label for="{{ $id }}" class="block text-sm font-semibold mb-2 text-gray-600">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}"
            class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 {{ $class }}"
            aria-describedby="helper-{{ $id }}">
        @foreach($options as $value => $option)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
    <p class="text-sm text-gray-500 mt-2" id="helper-{{ $id }}">{{ $helperText }}</p>
    @error($name)
    <p class="text-sm mt-2 text-red-600">{{ $message }}</p>
    @enderror
</div>
