<x-layout title="Register">
    <div class="w-full max-w-md m-auto h-full  flex flex-col    justify-center ">
        <form method="POST" action="{{route('postRegister')}}">
            @csrf
            <x-dropdown-select id="role" name="role"  for="role">
                <option selected value="student">Choose a Role</option>
                <option value="professor">Professor</option>
                <option value="student">Student</option>


            </x-dropdown-select>

            <x-form-input
                name="name"
                type="name"
                id="name"
                placeholder="John Doe"

            >
                Name
            </x-form-input>
            <x-form-error name="name"></x-form-error>
            <x-form-input
                name="email"
                type="email"
                id="email"
                placeholder="johndoe@example.com"

            >
                Email
            </x-form-input>
            <x-form-error name="email"></x-form-error>
            <x-form-input
                 name="password"
                type="password"
                id="password"
                placeholder="Password"

            >
                Password

            </x-form-input>
            <x-form-error name="password"></x-form-error>
            <x-form-input
                name="password_confirmation"
                type="password"
                id="password_confirmation"
                placeholder="Password"

            >
                Confirm Password

            </x-form-input>
            <x-form-error name="password_confirmation"></x-form-error>
            <div class="flex justify-around mt-4">
                <x-button
                    type="submit" class="bg-cyan-dark text-white px-6 p-3 rounded-md"

                >
                    Register
                </x-button>
            </div>
        </form>


    </div>


</x-layout>
