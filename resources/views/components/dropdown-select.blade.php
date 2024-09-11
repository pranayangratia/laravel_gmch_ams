<div class="m-2">
    <label for="role" class="block font-medium text-cyan-dark">Select {{$name}}</label>
    <select {{$attributes(['class' =>"mt-2   w-full p-3 text-lg font-semibold text-light-blue  rounded-md border border-cyan shadow-[0_5px_5px_rgba(118,171,174,100)] ease-in-out duration-300 outline-none focus:shadow-[0_10px_10px_rgba(118,171,174,100)] focus:border-cyan"])}}>
        {{$slot}}
    </select>
</div>
