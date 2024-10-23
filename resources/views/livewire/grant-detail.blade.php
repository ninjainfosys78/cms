@props([
    'selectedModelTypes'=>null,
])
<div class="relative grid grid-cols-2 gap-4 col-span-2">
    <!-- Model Type Dropdown -->
    <div class="model_type col-span-1">
        <label for="model_type" class="block text-sm font-semibold mb-2 text-gray-600">Model Type</label>
        <select id="model_type" name="model_type" wire:model.live="selectedModelTypes"
                class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            @foreach($modelTypes as $modelType => $name)
                <option value="{{ $modelType }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('model_type') <p class="text-sm mt-2 text-red-600">{{ $message }}</p> @enderror
    </div>

    <!-- Related Models Dropdown -->
    <div class="model_id col-span-1">
        <label for="model_id" class="block text-sm font-semibold mb-2 text-gray-600">Model</label>
        <select id="model_id" name="model_id" class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0">
            @foreach($modelIds as $model)
                <option value="{{ $model->id }}">{{ $model->name ?? $model->title }}</option>
            @endforeach
        </select>
        @error('model_id') <p class="text-sm mt-2 text-red-600">{{ $message }}</p> @enderror
    </div>
</div>
