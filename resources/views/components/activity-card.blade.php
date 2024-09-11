@props(['user', 'date', 'name', 'fileUrl'=>null, 'id'])

<div class="bg-cyan-dark group flex flex-col p-3 rounded-xl hover:shadow-xl hover:shadow-blue shadow-md shadow-blue ease-in-out duration-300">
    <div class="w-full flex  justify-between">
        <h1 class="text-lighter-blue font-bold text-xl mb-3">
            {{ $name  }}
        </h1>
        @if($fileUrl)
            <a href="{{$fileUrl}}" class="text-white underline hover:text-light-blue">Attachment</a>
        @else
            <span class="text-gray">No attachments</span>
        @endif
    </div>
    <div class="line-clamp-3 w-full text-white font-semibold">
        <p>{{ $slot }}</p>
    </div>
    <div class="flex justify-between">
        <h1 class="font-semibold text-lighter-blue">{{ $date }}</h1>
        <h1 class="font-semibold text-lighter-blue">{{ $user }}</h1>
    </div>
</div>
