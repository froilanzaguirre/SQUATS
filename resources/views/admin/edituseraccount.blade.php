<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">

        </div>



        <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="bg-dark inline-block align-bottom bg-blue-100 rounded-lg text-left overflow-hidden -xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"

            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            

            <form method="POST" action="{{ route('editResidentAccount', $user->id) }}" enctype="multipart/form-data">

                @csrf

                <div class="bg-white px-4 pt-4 pb-4 sm:p-6 sm:pb-4">

                    <div class="">

                    <h3 class="card-title mb-3 text-lg text-dark fw-bold text-uppercase">Edit User Account</h3>

                        <div class="mb-4">

                            <label for="exampleFormControlInput1" class="block text-black text-sm text-uppercase fw-bold mb-2">{{$user->usertype}} Name</label>

                            <input name="name" type="text"

                                class="appearance-none border-green-200 rounded w-full py-2 px-3 leading-tight text-black focus:outline-none focus:shadow-outline"

                                id="exampleFormControlInput1" value="{{$user->name}}">

                            @error('name')

                                <span class="text-red-500">{{ $message }}</span>

                            @enderror

                        </div>

                        <div class="mb-4">

                            <label for="exampleFormControlInput1" class="block text-black text-sm text-uppercase fw-bold mb-2">Room Number</label>

                            <input name="roomToVisit" type="text"

                                class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none text-black  focus:shadow-outline"

                                id="exampleFormControlInput1" value="{{$user->roomToVisit}}">

                            @error('roomToVisit')

                                <span class="text-red-500">{{ $message }}</span>

                            @enderror

                        </div>

                        <div class="mb-4">

                            <label for="exampleFormControlInput1" class="block text-black text-sm text-uppercase fw-bold mb-2">Contact Number</label>

                            <input name="contactNumber" type="text"

                                class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none text-black  focus:shadow-outline"

                                id="exampleFormControlInput1" value="{{$user->contactNumber}}">

                            @error('contactnumber')

                                <span class="text-red-500">{{ $message }}</span>

                            @enderror

                        </div>
                        
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="block text-black text-sm text-uppercase fw-bold mb-2">Date of Birth</label>
                            <input name="birthDate" type="date"
                                class="appearance-none border-green-200 rounded w-full py-2 px-3  leading-tight focus:outline-none text-black  focus:shadow-outline"
                                id="exampleFormControlInput1" value="{{$user->birthDate}}">
                            @error('birthDate')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="inputfile mb-4">

                            <label for="exampleFormControlInput1" class="block text-black text-sm text-uppercase fw-bold mb-2">Gender</label>

                            <input type="radio" name="gender" value="Male" checked>

                            <label class="text-black text-sm text-uppercase fw-bold" for="gender">Male</label>

                            <input class="ml-1" type="radio" name="gender" value="Female">

                            <label class="text-black text-sm text-uppercase fw-bold" for="gender">Female</label>

                            @error('gender')

                                <span class="text-red-500">{{ $message }}</span>

                            @enderror

                        </div> 

                        <div class="inputselect mb-4">

                            <label for="exampleFormControlInput1" class="block text-black text-sm text-uppercase fw-bold mb-2">Vaccine Information</label>

                            <select name="vaccinedose" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md text-black  shadow-sm " value="{{$user->vaccinedose}}">

                                <option value="">Select Vaccination Dosage</option>
                                <option value="Unvaccinated">Unvaccinated</option>

                                <option value="First Dose">First Dose</option>

                                <option value="Fully Vaccinated">Fully Vaccinated</option>

                                <option value="Fully Vaccinated With Booster">Fully Vaccinated With Booster</option>

                            </select>

                            @error('vaccinedose')

                                <span class="text-red-500">{{ $message }}</span>

                            @enderror

                        </div>

                        

                        <span class="mt-1 flex w-full sm:w-auto">

                            <button class="btn btn-dark btn-block submit" style=" height:40px;width:10rem;border-radius:10px">Edit Account</button>

                            <a href="viewusers" class="btn ml-2 btn-primary btn-block"  style="padding-top:12px;height:40px;width:10rem;border-radius:10px">Cancel</a>

                        </span>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>