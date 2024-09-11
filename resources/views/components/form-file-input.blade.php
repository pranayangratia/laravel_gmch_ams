<div class="m-2">
    <label for="{{$slot}}" class="block font-medium text-cyan-dark"> {{$slot}} </label>

    <input
        {{$attributes(['class'=>'mt-2 w-full p-3 font-bold bg-full-white text-light-blue rounded-md border border-cyan shadow-[0_5px_5px_rgba(118,171,174,100)] ease-in-out duration-300 outline-none focus:shadow-[0_10px_10px_rgba(118,171,174,100)] focus:border-cyan'])}}
    />
</div>
