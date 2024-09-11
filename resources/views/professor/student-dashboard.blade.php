<x-layout title="Students">
    <div class=" flex items-center max-w-screen-2xl   justify-between w-full py-2 mx-2">
        <h1 class="text-xl flex font-semibold text-blue ml-2"> <x-fas-filter class="w-4 mr-2 text-lighter-blue" />Filters</h1>

    </div>


    <div class="grid  grid-cols-4 max-w-screen-2xl    w-full ">
        <div class=" max-sm:hidden p-3 rounded-3xl" >
            <form method="GET" action="">

                <x-form-input
                    name="search"
                    type="text"
                    id="search"
                    placeholder="Search"
                    value="{{ old('search') }}"
                >
                    Search
                </x-form-input>

                <div class="m-2">
                    <label for="type" id="type" class="block font-medium text-cyan-dark">Select type</label>
                    <select name="type" id='type' class="mt-2 w-full p-3 text-lg font-semibold text-light-blue rounded-md border border-cyan shadow-[0_5px_5px_rgba(118,171,174,100)] ease-in-out duration-300 outline-none focus:shadow-[0_10px_10px_rgba(118,171,174,100)] focus:border-cyan">
                        <option value="" {{ old('type') == '' ? 'selected' : '' }}>Choose an activity</option>
                        <option value="Lecture" {{ old('type') == 'lecture' ? 'selected' : '' }}>Lecture</option>
                        <option value="Seminar" {{ old('type') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                        <option value="Group Discussion" {{ old('type') == 'Group Discussion' ? 'selected' : '' }}>Group Discussion</option>
                        <option value="Presentation" {{ old('type') == 'Presentation' ? 'selected' : '' }}>Presentation</option>
                        <option value="Research Work" {{ old('type') == 'Research Work' ? 'selected' : '' }}>Research Work</option>
                        <option value="Grand Round" {{ old('type') == 'Grand Round' ? 'selected' : '' }}>Grand Round</option>
                        <option value="Graded Responsibility" {{ old('type') == 'Graded Responsibility' ? 'selected' : '' }}>Graded Responsibility</option>
                        <option value="E-Log book" {{ old('type') == 'E-Log book' ? 'selected' : '' }}>E-log book</option>
                    </select>
                </div>

                <!-- Date Filter -->
                <div class="m-2">
                    <label for="date" id="date" class="block font-medium text-cyan-dark">Select Date</label>
                    <input
                        type="date"
                        name="date"
                        id="date"
                        value="{{ old('date') }}"
                        class="mt-2 w-full p-3 text-lg font-semibold text-light-blue rounded-md border border-cyan shadow-[0_5px_5px_rgba(118,171,174,100)] ease-in-out duration-300 outline-none focus:shadow-[0_10px_10px_rgba(118,171,174,100)] focus:border-cyan"
                    />
                </div>

                <div class="w-full flex justify-around">
                    <x-button type="submit" class="p-2 px-3 rounded-md bg-cyan-dark text-white">
                        Search
                    </x-button>
                </div>

            </form>



        </div>
        <div class="col-span-3 max-sm:col-span-4">
            <div class="max-w-screen-2xl    w-full grid grid-cols-3 gap-4 md:grid-cols-2 lg:grid-cols-3  max-sm:grid-cols-1 px-2">

                @foreach($activities as $activity)
                    @if($activity->attachment_path)

                        <x-activity-card user="{{$activity->user->name}}" id="{{$activity->id}}"
                                         :fileUrl="route('activities.download', ['id' => $activity->id])"
                                         name="{{ $activity->formatted_type }}"
                                         date="{{ $activity->created_at->format('jS, F, Y') }}">{{$activity->description}}</x-activity-card>
                    @else
                        <x-activity-card user="{{$activity->user->name}}" id="{{$activity->id}}"

                                         name="{{ $activity->formatted_type }}"
                                         date="{{ $activity->created_at->format('jS, F, Y') }}">{{$activity->description}}</x-activity-card>

                    @endif


                @endforeach

            </div>
            <div class="p-5 m-5">
                {{$activities->onEachSide(5)->links()}}
            </div>
        </div>
    </div>


</x-layout>
