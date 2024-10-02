@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'id' => '',
    'class' => '',
    'helperText' => '',
    'value' => ''
])

<div class="relative">
    <label for="{{ $id }}" class="block text-sm font-semibold mb-2 text-gray-600">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
        @class([
                "py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0",
                $class
        ])
        placeholder="{{ $placeholder ?? $label }}" aria-describedby="helper-{{ $id }}" value="{{ $value }}">
    <p class="text-sm text-gray-500 mt-2" id="helper-{{ $id }}">{{ $helperText }}</p>
    @error($name)
    <p class="text-sm mt-2 text-red-600">{{ $message }}</p>
    @enderror
</div>
