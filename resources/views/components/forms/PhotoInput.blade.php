@props([
    'label',
    'name',
    'id',
    'class' => '',
    'helperText' => '',
    'accept' => '',
    'is_multiple' => false
])
<div class="mb-3">
    <label
        for="photo"
        class="mb-2 inline-block text-gray-600 font-semibold dark:text-gray-600"
    >{{$label}}</label
    >
    <input
        class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-secondary-600 bg-transparent bg-clip-padding px-3 py-[0.32rem] text-base font-normal leading-[2.15] text-surface transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:me-3 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-e file:border-solid file:border-inherit file:bg-transparent file:px-3  file:py-[0.32rem] file:text-surface focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/70 dark:text-white  file:dark:text-white"
        id="{{$id}}"
        name="{{$name}}"
        type="file" multiple/>
    @error($name)
    <p class="text-sm mt-2 text-red-600">{{$message}}</p>
    @enderror
</div>
