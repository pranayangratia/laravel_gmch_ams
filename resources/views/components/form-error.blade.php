@props(['name'])

<div class="text-red font-medium">
    @error($name )
    {{$message}}
    @enderror
</div>
