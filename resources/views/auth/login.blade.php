<x-layout title="Login">
    <div class="w-full max-w-md m-auto h-full  flex flex-col    justify-center ">
        <form method="POST" action="{{route('postLogin')}}">
            @csrf
            {{--            <div class="m-2">--}}
            {{--                <label for="email" class="block font-medium text-cyan-dark"> Email </label>--}}

            {{--                <input--}}
            {{--                    class='mt-2 focus:h-14 w-full p-3 text-lg rounded-md border border-cyan  shadow-[0_5px_10px_rgba(118,171,174,100)] ease-in-out duration-300 outline-none focus:shadow-[0_10px_40px_rgba(118,171,174,100)]  focus:border-cyan' name="email" id="email" type="email"--}}
            {{--                />--}}
            {{--            </div>--}}

            <x-form-input
                name="email"
                type="email"
                id="email"
                placeholder="johndoe@example.com"

            >
                Email
            </x-form-input>
            <x-form-error name="email">
                email
            </x-form-error>

            <x-form-input
                name="password"
                type="password"
                id="password"
                placeholder="password"


            >
                password

            </x-form-input>
            <x-form-error name="password">
                email
            </x-form-error>
            <div class="flex justify-around m-4">
                <x-button class="bg-cyan-dark text-white px-6 p-3 rounded-md"
                          type="submit"

                >
                    Login
                </x-button>
            </div>
        </form>


    </div>


</x-layout>
