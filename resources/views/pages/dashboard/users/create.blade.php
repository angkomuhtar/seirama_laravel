<x-LayoutApp>
    <div class="space-y-8">
        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
            <div class="card xl:col-span-2">
                <div class="card-body flex flex-col p-6">
                    <header
                        class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Tambah Karyawan</div>
                        </div>
                    </header>
                    <div class="card-text h-full ">
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                                <div class="input-area relative">
                                    <label for="largeInput" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="input-area relative">
                                    <label for="largeInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="input-area relative">
                                    <label for="largeInput" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" placeholder="Phone Number"
                                        pattern="[0-9]">
                                </div>
                                <div class="input-area relative">
                                    <label for="largeInput" class="form-label">Password</label>
                                    <input type="password" class="form-control"
                                        placeholder="8+ characters, 1 capitat letter">
                                </div>
                                <div class="input-area relative">
                                    <label for="largeInput" class="form-label">Company</label>
                                    <input type="text" class="form-control" placeholder="Company">
                                </div>
                                <div class="input-area">
                                    <label for="select" class="form-label">Country</label>
                                    <select id="select" class="form-control">
                                        <option value="option1" class="dark:bg-slate-700">Country 1</option>
                                        <option value="option2" class="dark:bg-slate-700">Country 2</option>
                                        <option value="option3" class="dark:bg-slate-700">Country 3</option>
                                        <option value="option4" class="dark:bg-slate-700">Country 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 pt-5">
                                <button class="btn inline-flex justify-center btn-primary">Simpan</button>
                                <button class="btn inline-flex justify-center btn-danger">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard card">
            <div class="card-header">
                <h4 class="card-title">Vertical form wizard</h4>
            </div>

            <div class="card-body p-6">
                <div class="grid gap-5 grid-cols-12">
                    <div class="lg:col-span-3 col-span-12">
                        <div
                            class="flex z-[5] items-start relative flex-col lg:min-h-full md:min-h-[300px] min-h-[250px] wizard-steps">

                            <div class="relative z-[1] flex-1 last:flex-none wizard-step active">
                                <div
                                    class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                      bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                    <div class="number-box">
                                        <span class="number"> 1</span>

                                        <span class="text-3xl no-icon">
                                            <iconify-icon icon="bx:check-double"> </iconify-icon>
                                        </span>
                                    </div>


                                </div>

                                <div class="bar-line2"></div>
                                <div
                                    class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                     text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                    <span class="w-max block">Account Details</span>
                                </div>
                            </div>

                            <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                                <div
                                    class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                      bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                    <div class="number-box">
                                        <span class="number"> 2</span>

                                        <span class="text-3xl no-icon">
                                            <iconify-icon icon="bx:check-double"> </iconify-icon>
                                        </span>
                                    </div>


                                </div>

                                <div class="bar-line2"></div>
                                <div
                                    class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                     text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                    <span class="w-max block">Personal info</span>
                                </div>
                            </div>

                            <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                                <div
                                    class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                      bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                    <div class="number-box">
                                        <span class="number"> 3</span>

                                        <span class="text-3xl no-icon">
                                            <iconify-icon icon="bx:check-double"> </iconify-icon>
                                        </span>
                                    </div>


                                </div>

                                <div class="bar-line2"></div>
                                <div
                                    class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                     text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                    <span class="w-max block">Address</span>
                                </div>
                            </div>

                            <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                                <div
                                    class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                      bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                    <div class="number-box">
                                        <span class="number"> 4</span>

                                        <span class="text-3xl no-icon">
                                            <iconify-icon icon="bx:check-double"> </iconify-icon>
                                        </span>
                                    </div>


                                </div>

                                <div class="bar-line2"></div>
                                <div
                                    class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                     text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                    <span class="w-max block">Address</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="conten-box lg:col-span-9 col-span-12 h-full">
                        <form>
                            <div class="wizard-form-step active" data-step="1">
                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                    <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                        <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Enter Your
                                            Account Details</h4>
                                    </div>
                                    <div class="input-area">
                                        <label for="username" class="form-label">User Name*</label>
                                        <input id="username" type="text" class="form-control"
                                            placeholder="Username">
                                    </div>
                                    <div class="input-area">
                                        <label for="fullname" class="form-label">Full Name*</label>
                                        <input id="fullname" type="text" class="form-control"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="input-area">
                                        <label for="email" class="form-label">Email*</label>
                                        <input id="email" type="text" class="form-control"
                                            placeholder="Enter Your Email">
                                    </div>
                                    <div class="input-area">
                                        <label for="phonenumber" class="form-label">Phone number*</label>
                                        <input id="phonenumber" type="text" class="form-control"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="input-area">
                                        <label for="password" class="form-label">Password*</label>
                                        <input id="password" type="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                    <div class="input-area">
                                        <label for="confirmPassword" class="form-label">Confirm Password*</label>
                                        <input id="confirmPassword" type="password" class="form-control"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-form-step" data-step="2">
                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                    <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                        <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Personal
                                            Information</h4>
                                    </div>
                                    <div class="input-area">
                                        <label for="firstname" class="form-label">First Name*</label>
                                        <input id="firstname" type="text" class="form-control"
                                            placeholder="First">
                                    </div>
                                    <div class="input-area">
                                        <label for="lastname" class="form-label">Last Name*</label>
                                        <input id="lastname" type="text" class="form-control"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-form-step" data-step="3">
                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                    <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                        <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Address</h4>
                                    </div>
                                    <div class="input-area lg:col-span-3 md:col-span-2 col-span-1">
                                        -LayoutApp <label for="address" class="form-label">Address*</label>
                                        <textarea name="address" id="address" rows="3" class="form-control" placeholder="Your Address"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-form-step" data-step="4">
                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                    <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                        <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Social Links</h4>
                                    </div>
                                    <div class="input-area">
                                        <label for="fblink" class="form-label">Facebook Link*</label>
                                        <input id="fblink" type="url" class="form-control"
                                            placeholder="Facebook Link">
                                    </div>
                                    <div class="input-area">
                                        <label for="youtubelink" class="form-label">Youtube Link*</label>
                                        <input id="youtubelink" type="url" class="form-control"
                                            placeholder="Youtube Link">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6   space-x-3">
                                <button class="btn btn-dark prev-button" type="button">prev</button>
                                <button class="btn btn-dark next-button" type="button">next</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-LayoutApp>
