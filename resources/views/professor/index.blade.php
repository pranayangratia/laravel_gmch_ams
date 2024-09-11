<x-layout title="Students">
    <div class="flex items-center max-w-screen-2xl justify-between w-full py-2 mx-2">
        <h1 class="text-xl flex font-semibold text-blue ml-2">
            <x-fas-filter class="w-4 mr-2 text-lighter-blue"/>
            Filters
        </h1>
    </div>

    <div class="max-w-screen-2xl  w-full">
        <div class="max-w-screen-lg mx-auto px-4">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 bg-cyan-dark text-white">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 bg-cyan-dark text-white">
                                        Year
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 bg-cyan-dark text-white">
                                        Email
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr class="odd:bg-white even:bg-light-gray hover:bg-light-gray cursor-pointer"
                                        onclick="window.location.href='/professor/students/{{ $student->id }}'">
                                        <td class="px-6 py-4 whitespace-nowrap max-sm:text-sm font-medium text-light-blue">{{ $student->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap max-sm:text-sm text-gray-800 text-light-blue">{{ $student->year }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap max-sm:text-sm text-gray-800 text-light-blue">{{ $student->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-5 m-5">
                {{$students->onEachSide(5)->links()}}
            </div>
        </div>
    </div>
</x-layout>
