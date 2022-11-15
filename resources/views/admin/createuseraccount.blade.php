<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="bg-dark inline-block align-bottom bg-blue-100 rounded-lg text-left overflow-hidden -xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form method="POST" action="{{ route('createResidentAccount') }}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Resident Name</label>
                            <input name="name" type="text"
                                class="appearance-none border-green-200 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Enter Name">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Room Number</label>
                            <input name="roomNo" type="text"
                                class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Enter Room Number">
                            @error('address')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Contact Number</label>
                            <input name="contactNumber" type="text"
                                class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Enter Contact Number">
                            @error('contactnumber')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="inputfile mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Gender</label>
                            <input type="radio" name="gender" value="Male" checked>
                            <label for="gender">Male</label>
                            <input class="ml-1" type="radio" name="gender" value="Female">
                            <label for="gender">Female</label>
                            @error('gender')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="inputselect mb-4">
                            <label for="exampleFormControlInput1" class="block text-green-500 text-sm font-bold mb-2">Vaccine Information</label>
                            <select name="vaccinedose" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="Unvaccinated">Unvaccinated</option>
                                <option value="First Dose">First Dose</option>
                                <option value="Fully Vaccinated">Fully Vaccinated</option>
                                <option value="Fully Vaccinated With Booster">Fully Vaccinated With Booster</option>
                            </select>
                            @error('gender')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Vaccine --}}
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                class="block text-green-500 text-sm font-bold mb-2">Vaccine Card</label>
                            <x-jet-input id="vaccine" class="inputfile" type="file" name="vaccine" required />
                            @error('vaccine')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="bg-blue-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="mt-2 flex w-full rounded-md -sm sm:ml-3 sm:w-auto">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border-green-200 border-transparent px-4 py-2 bg-green-500 text-base leading-6 font-medium text-white -sm hover:bg-green-300 focus:outline-none focus:border-green-200-green-700 focus:-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Create Account
                            </a>
                            <a href="viewusers" type="button"
                                class="inline-flex justify-center w-full rounded-md border-green-200 border-transparent px-4 py-2 bg-green-500 text-base leading-6 font-medium text-white -sm hover:bg-green-300 focus:outline-none focus:border-green-200-green-700 focus:-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                            </a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
