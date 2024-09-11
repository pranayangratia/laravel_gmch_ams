<x-layout
    title="Add Activity"
>
    <div class="w-full max-w-md m-auto h-full  flex flex-col    justify-center ">
        <form method="POST" action="{{route('post.student.add-activity')}}" enctype='multipart/form-data'>


            @csrf
            @if($errors->any())

                <div class="border-red rounded-3xl text-red">
                    {{ implode('', $errors->all(':message')) }}
                </div>
            @endif
            <x-dropdown-select id="type" name="type" for="type">


                <option disabled selected>Choose an activity</option>
                <option value="lecture">Lecture</option>
                <option value="seminar">Seminar</option>
                <option value="group_discussion">Group Discussion</option>
                <option value="presentation">Presentation</option>
                <option value="research_work">Research Work</option>
                <option value="grand_round">Grand Round</option>
                <option value="graded_responsibility">Graded Responsibility</option>
                <option value="elog_book">E-log Book</option>


            </x-dropdown-select>
            <x-form-error name="type"></x-form-error>
            <x-form-textfield placeholder="Describe" rows="4" name="description" id="description">Add description
            </x-form-textfield>

            <x-form-error name="description"></x-form-error>
            {{--            <x-form-file-input id="attachment" type="file" name="attachment">Upload file</x-form-file-input>--}}
            {{--            <x-form-error name="attachment"></x-form-error>--}}
            <div class="m-2">
                <label for="Attachment" class="block font-medium text-cyan-dark"> Attachment</label>

                <input
                    class='mt-2 w-full p-3 font-bold bg-full-white text-light-blue rounded-md border border-cyan shadow-[0_5px_5px_rgba(118,171,174,100)] ease-in-out duration-300 outline-none focus:shadow-[0_10px_10px_rgba(118,171,174,100)] focus:border-cyan'
                    name="attachment" type="file" id="attachment"/>
            </div>


            <input class="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">


            <div class="flex justify-around mt-4">
                <x-button
                    type="submit" class="bg-cyan-dark text-white px-6 p-3 rounded-md"

                >
                    Add
                </x-button>
            </div>
        </form>


    </div>
</x-layout>
