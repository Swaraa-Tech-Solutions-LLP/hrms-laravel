<x-layouts.app>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Add Employee</h2>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex space-x-3 overflow-x-auto">
                @foreach ($steps as $index => $step)
                    <button
                        id="tab{{ $index+1 }}"
                        class="tab-btn flex-shrink-0 px-6 py-3 text-sm font-semibold border-b-4 border-transparent text-gray-800 hover:text-indigo-600 hover:border-indigo-600 focus:outline-none focus:text-indigo-600 focus:border-indigo-600 transition duration-200 ease-in-out {{ $index == 0 ? 'border-indigo-600 text-indigo-600' : '' }}">
                        {{ $step }}
                        <span id="check{{ $index+1 }}" class="hidden text-green-600 ml-2">✅</span>
                    </button>
                @endforeach
            </div>
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data" id="employeeForm" class="mt-6">
                @csrf
                @foreach ($sections as $title => $id)
                    <div class="tab-content hidden bg-gray-50 p-1 rounded-lg shadow-sm" id="tabContent{{ $loop->index + 1 }}">
                        <h3 class="text-xl font-semibold mb-6 text-gray-900">{{ $title }}</h3>
                        @if ($id === 'basic-info')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label><span class="text-red-500">*</span>
                                    <label for="phone" class="text-gray-700 font-medium">Mobile Number:</label> <span class="text-red-500">*</span>
                                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" name="first_name" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Middle Name</label><span class="text-red-500">*</span>
                                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" name="middle_name" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label><span class="text-red-500">*</span>
                                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" name="last_name" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label><span class="text-red-500">*</span>
                                    <input type="email" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" name="email" required>
                                </div>
                            </div>
                        @endif
                        @if ($id === 'work-info')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 font-medium">Department</label>
                                    <select class="w-full p-2 border rounded-lg" name="department" required>
                                        <option value="">Select</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Client</label>
                                    <select class="w-full p-2 border rounded-lg" name="client" required>
                                        <option value="">Select</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Location</label>
                                    <select class="w-full p-2 border rounded-lg" name="location" required>
                                        <option value="">Select</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Deignation</label>
                                    <select class="w-full p-2 border rounded-lg" name="designation" required>
                                        <option value="">Select</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Job Role</label>
                                    <select class="w-full p-2 border rounded-lg" name="job_role" required>
                                        <option value="">Select</option>
                                        @foreach($jobRoles as $role)
                                            <option value="{{ $role->id }}" {{ old('job_role') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Status</label>
                                    <select class="w-full p-2 border rounded-lg" name="status" required>
                                        <option value="">Select</option>
                                        @foreach([1 => 'Active', 0 => 'Terminated', 2 => 'Deceased', 3 => 'Resigned'] as $value => $label)
                                            <option value="{{ $value }}" {{ old('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Joining Date</label>
                                    <input type="date" name="join_date" required>
                                </div>
                            </div>
                        @endif
                        @if ($id === 'personal-details')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="dob" class="text-gray-700 font-medium">Date of Birth:</label>
                                    <input type="date" id="dob" name="dob" value="{{ old('dob') }}" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter DOB" required>
                                </div>
                                <div>
                                    <label for="gender" class="text-gray-700 font-medium">Gender:</label>
                                    <select name="gender" id="gender" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
                                        <option value="">Select a gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="marital_status" class="text-gray-700 font-medium">Marital Status:</label>
                                    <select name="marital_status" id="marital_status" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
                                        <option value="">Select a marital status</option>
                                        <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                        <option value="Separated" {{ old('marital_status') == 'Separated' ? 'selected' : '' }}>Separated</option>
                                        <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="blood_group" class="text-gray-700 font-medium">Blood Group:</label>
                                    <select name="blood_group" id="blood_group" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
                                        <option value="">Select a blood group</option>
                                        @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-', 'Unknown'] as $group)
                                            <option value="{{ $group }}" {{ old('blood_group') == $group ? 'selected' : '' }}>{{ $group }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="imgfile" class="text-gray-700 font-medium">Profile Image:</label>
                                    <input type="file" name="imgfile" id="imgfile" class="hidden">
                                    <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 shadow-md" onclick="document.getElementById('imgfile').click()">Select File</button>
                                    <img src="" id="ad_img" class="max-h-24 max-w-24 border border-gray-300 rounded-lg"/>
                                </div>
                            </div>
                        @endif
                        @if ($id === 'identity-info')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="inputEmail1" class="text-gray-700 font-medium">SSS No.:</label>
                                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="sss_no" placeholder="Enter SSS No" name="sss_no" required>
                                </div>
                                <div>
                                    <label for="inputEmail1" class="text-gray-700 font-medium">PhilHealth No.:</label>
                                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="philhealth_no" placeholder="Enter PhilHealth No" name="philhealth_no" required>
                                </div>
                                <div>
                                    <label for="inputEmail1" class="text-gray-700 font-medium">HDMF:</label>
                                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="hdmf" placeholder="Enter HDMF" name="hdmf" required>
                                </div>
                                <div>
                                    <label for="inputEmail1" class="text-gray-700 font-medium">Tax Identification No.:</label>
                                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="tax_identification_no" placeholder="Enter Tax Identification No" name="tax_identification_no" required>
                                </div>
                                <div>
                                    <label for="bank_name" class="text-gray-700 font-medium">Bank Name:</label>
                                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="bank_name" placeholder="Enter Bank Name" name="bank_name" required>
                                </div>
                                <div>
                                    <label for="bank_account_number" class="text-gray-700 font-medium">Bank Account Number:</label>
                                    <input type="text" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" id="bank_account_number" placeholder="Enter Bank Account Number" name="bank_account_number" required>
                                </div>
                            </div>
                        @endif
                        @if($id == 'contact-details')
                            <div class="mb-4">
                                <label for="phone" class="text-gray-700 font-medium">Mobile Number:</label> <span class="text-red-500">*</span>
                                <input type="text" class="w-full p-2 border rounded-lg" name="phone" id="phone" placeholder="Enter Phone number" value="{{ old('phone') }}" required>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="present_address" class="text-gray-700 font-medium">Present Address:</label> <span class="text-red-500">*</span>
                                    <input type="text" class="w-full p-2 border rounded-lg" name="present_address" id="present_address" placeholder="Address" value="{{ old('present_address') }}" required>
                                    <div class="grid grid-cols-2 gap-4 mt-2">
                                        <input type="text" class="w-full p-2 border rounded-lg" name="present_city" id="present_city" placeholder="City" value="{{ old('present_city') }}" required>
                                        <input type="text" class="w-full p-2 border rounded-lg" name="present_state" id="present_state" placeholder="State" value="{{ old('present_state') }}" required>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 mt-2">
                                        <input type="text" class="w-full p-2 border rounded-lg" name="present_country" id="present_country" placeholder="Country" value="{{ old('present_country') }}" required>
                                        <input type="text" class="w-full p-2 border rounded-lg" name="present_national_id" id="present_national_id" placeholder="National ID" value="{{ old('present_national_id') }}" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="permanent_address" class="text-gray-700 font-medium">Permanent Address:</label>
                                    <span class="text-red-500">*</span>
                                    <input type="checkbox" id="address_checkbox" class="ml-2"> <label class="text-gray-700">Same as Present Address</label>
                                    <input type="text" class="w-full p-2 border rounded-lg" name="permanent_address" id="permanent_address" placeholder="Address" value="{{ old('permanent_address') }}" required>
                                    <div class="grid grid-cols-2 gap-4 mt-2">
                                        <input type="text" class="w-full p-2 border rounded-lg" name="permanent_city" id="permanent_city" placeholder="City" value="{{ old('permanent_city') }}" required>
                                        <input type="text" class="w-full p-2 border rounded-lg" name="permanent_state" id="permanent_state" placeholder="State" value="{{ old('permanent_state') }}" required>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 mt-2">
                                        <input type="text" class="w-full p-2 border rounded-lg" name="permanent_country" id="permanent_country" placeholder="Country" value="{{ old('permanent_country') }}" required>
                                        <input type="text" class="w-full p-2 border rounded-lg" name="permanent_national_id" id="permanent_national_id" placeholder="National ID" value="{{ old('permanent_national_id') }}" required>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($id == 'work-experience')
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr class="text-left text-gray-700">
                                        <th class="p-2 text-sm">Previous Company Name</th>
                                        <th class="p-2 text-sm">Job Title</th>
                                        <th class="p-2 text-sm">From Date</th>
                                        <th class="p-2 text-sm">To Date</th>
                                        <th class="p-2 text-sm">Job Description</th>
                                        <th class="p-2 text-sm">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="experience_row" class="bg-white">
                                @php
                                    $oldExperiences = old('company_name', []);
                                    $oldJobTitles = old('job_title', []);
                                    $oldFromDates = old('from_date', []);
                                    $oldToDates = old('to_date', []);
                                    $oldDescriptions = old('job_description', []);
                                    $experienceCount = max(count($oldExperiences), 1);
                                @endphp
                                @for ($i = 0; $i < $experienceCount; $i++)
                                    <tr class="border-t border-gray-300">
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="company_name[]" value="{{ $oldExperiences[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="job_title[]" value="{{ $oldJobTitles[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="date" class="w-full p-2 border rounded-lg" name="from_date[]" value="{{ $oldFromDates[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="date" class="w-full p-2 border rounded-lg" name="to_date[]" value="{{ $oldToDates[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="job_description[]" value="{{ $oldDescriptions[$i] ?? '' }}"></td>
                                        <td class="p-2 text-center">
                                            <button type="button" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600" id="experience_add">+</button>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        @endif
                        @if($id == 'education-details')
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr class="text-left text-gray-700">
                                        <th class="p-2 text-sm">Institution Name</th>
                                        <th class="p-2 text-sm">Degree/Diploma</th>
                                        <th class="p-2 text-sm">Specialization</th>
                                        <th class="p-2 text-sm">Date of Completion</th>
                                        <th class="p-2 text-sm">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="education_row" class="bg-white">
                                @php
                                    $oldInstitutions = old('institution_name', []);
                                    $oldDegrees = old('degree', []);
                                    $oldSpecializations = old('specialization', []);
                                    $oldCompletionDates = old('date_of_completion', []);
                                    $educationCount = max(count($oldInstitutions), 1);
                                @endphp
                                @for ($i = 0; $i < $educationCount; $i++)
                                    <tr class="border-t border-gray-300">
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="institution_name[]" value="{{ $oldInstitutions[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="degree[]" value="{{ $oldDegrees[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="specialization[]" value="{{ $oldSpecializations[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="date" class="w-full p-2 border rounded-lg" name="date_of_completion[]" value="{{ $oldCompletionDates[$i] ?? '' }}"></td>
                                        <td class="p-2 text-center">
                                            <button type="button" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600" id="education_add">+</button>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        @endif
                        @if($id == 'emergency-contacts')
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                                <thead class="bg-gray-100">
                                    <tr class="text-left text-gray-700">
                                        <th class="p-2 text-sm">Name</th>
                                        <th class="p-2 text-sm">Relationship</th>
                                        <th class="p-2 text-sm">Phone</th>
                                        <th class="p-2 text-sm">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="emergency_row" class="bg-white">
                                @php
                                    $oldNames = old('em_name', []);
                                    $oldRelations = old('relation', []);
                                    $oldPhones = old('em_phone', []);
                                    $emergencyCount = max(count($oldNames), 1);
                                @endphp
                                @for ($i = 0; $i < $emergencyCount; $i++)
                                    <tr class="border-t border-gray-300">
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="em_name[]" value="{{ $oldNames[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="relation[]" value="{{ $oldRelations[$i] ?? '' }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="em_phone[]" value="{{ $oldPhones[$i] ?? '' }}"></td>
                                        <td class="p-2 text-center">
                                            <button type="button" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600" id="emergency_add">+</button>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        @endif
                        @if($id == 'separation-info')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="contract_start_date" class="text-gray-700 font-medium">Contract Starting Date:</label>
                                    <input type="date" class="w-full p-2 border rounded-lg" id="contract_start_date" placeholder="Enter Contract Starting Date" name="contract_start_date" value="{{ old('contract_start_date') }}">
                                </div>
                                <div>
                                    <label for="contract_end_date" class="text-gray-700 font-medium">Contract Ending Date:</label>
                                    <input type="date" class="w-full p-2 border rounded-lg" id="contract_end_date" placeholder="Enter Contract Ending Date" name="contract_end_date" value="{{ old('contract_end_date') }}">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="reason_for_leaving" class="text-gray-700 font-medium">Reason for Leaving:</label>
                                <textarea class="w-full p-2 border rounded-lg" id="reason_for_leaving" placeholder="Enter Reason for Leaving" name="reason_for_leaving">{{ old('reason_for_leaving') }}</textarea>
                            </div>
                        @endif
                        @if($id == 'salary-details')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="ctc_salary_selection" class="text-gray-700 font-medium">CTC & Salary:</label> <span class="text-red-500">*</span>
                                    <select name="ctc_salary_selection" id="ctc_salary_selection" class="w-full p-2 border rounded-lg">
                                        <option value="">Select any</option>
                                        @foreach($SalaryComponent as $component)
                                            <option value="{{$component->annual_ctc}}" {{ old('ctc_salary_selection') == $component->annual_ctc ? 'selected' : '' }}> {{$component->annual_ctc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <table class="w-full border border-gray-300 rounded-lg overflow-hidden mt-5">
                                <thead class="bg-gray-100">
                                <tr class="text-left text-gray-700">
                                    <th class="p-2 text-sm">SALARY COMPONENTS</th>
                                    <th class="p-2 text-sm">CALCULATION TYPE</th>
                                    <th class="p-2 text-sm">MONTHLY AMOUNT</th>
                                    <th class="p-2 text-sm">ANNUAL AMOUNT</th>
                                </tr>
                                </thead>
                                <tbody id="salary_row" class="bg-white">
                                    <tr><td class="p-2"><strong>Earnings</strong></td></tr>
                                    <tr>
                                        <td class="p-2">Basic</td>
                                        <td class="p-2">
                                            <input type="text" class="w-full p-2 border rounded-lg" name="basic_salary_per" id="basic_salary_per" readonly value="{{ old('basic_salary_per', 50) }}">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" class="w-full p-2 border rounded-lg" name="monthly_basic" id="monthly_basic" readonly value="{{ old('monthly_basic') }}">
                                        </td>
                                        <td class="p-2">
                                            <input type="text" class="w-full p-2 border rounded-lg" name="annual_basic" id="annual_basic" readonly value="{{ old('annual_basic') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">House Rent Allowance</td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="house_rent_per" id="house_rent_per" readonly value="{{ old('house_rent_per', 50) }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="monthly_house_rent" id="monthly_house_rent" readonly value="{{ old('monthly_house_rent') }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="annual_house_rent" id="annual_house_rent" readonly value="{{ old('annual_house_rent') }}"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">Conveyance Allowance</td>
                                        <td class="p-2">Fixed</td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="monthly_conveyance" id="monthly_conveyance" readonly value="{{ old('monthly_conveyance', 0) }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="annual_conveyance" id="annual_conveyance" readonly value="{{ old('annual_conveyance', 0) }}"></td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">Fixed Allowance</td>
                                        <td class="p-2">Fixed</td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="monthly_fixed" id="monthly_fixed" readonly value="{{ old('monthly_fixed') }}"></td>
                                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="annual_fixed" id="annual_fixed" readonly value="{{ old('annual_fixed') }}"></td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="p-2 font-bold">Cost to Company</td>
                                        <td class="p-2"></td>
                                        <td class="p-2 font-bold" id="monthly_cost">{{ old('monthly_cost') }}</td>
                                        <td class="p-2 font-bold" id="annual_cost">{{ old('annual_cost') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                        <div class="mt-6 flex justify-between">
                            @if (!$loop->first)
                                <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 shadow-md" onclick="prevStep({{ $loop->index + 1 }})">Back</button>
                            @endif
                                @if ($loop->last)
                                    <input type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 shadow-md" id="save">
                                @endif
                            @if (!$loop->last)
                                <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 shadow-md" onclick="nextStep({{ $loop->index + 1 }})">Next</button>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="hidden text-center mt-6" id="submitSection">
                    <button type="submit" class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 shadow-md">Submits</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('tab1').disabled = false;
            showTab(1);
        });
        function showTab(step) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById(`tabContent${step}`).classList.remove('hidden');
            document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
            document.getElementById(`tab${step}`).classList.add('active');
        }
        function prevStep(step) {
            showTab(step - 1);
            document.getElementById('submitSection').classList.add('hidden');
        }
        function nextStep(step) {
            if (validateStep(step)) {
                document.getElementById(`check${step}`).classList.remove('hidden');
                document.getElementById(`tab${step + 1}`).disabled = false;
                showTab(step + 1);
                if (step === 11) document.getElementById('submitSection').classList.remove('hidden');
            }
        }
        function validateStep(step) {
            let valid = true;
            document.querySelectorAll(`#tabContent${step} input[required], #tabContent${step} select[required]`).forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });
            return valid;
        }

        $("#save").mouseover(function() {

            yourArray_experience = [];
            yourArray_education = [];
            yourArray_emergency = [];
            var company_names = document.getElementsByName('company_name[]');
            var job_titles = document.getElementsByName('job_title[]');
            var from_dates = document.getElementsByName('from_date[]');
            var to_dates = document.getElementsByName('to_date[]');
            var job_descriptions = document.getElementsByName('job_description[]');
            var institution_names = document.getElementsByName('institution_name[]');
            var degrees = document.getElementsByName('degree[]');
            var specializations = document.getElementsByName('specialization[]');
            var date_of_completions = document.getElementsByName('date_of_completion[]');
            var em_names = document.getElementsByName('em_name[]');
            var relations = document.getElementsByName('relation[]');
            var em_phones = document.getElementsByName('em_phone[]');

            for (var i = 0; i < company_names.length; i++) {
                var company_name = company_names[i];
                var job_title = job_titles[i];
                var from_date = from_dates[i];
                var to_date = to_dates[i];
                var job_description = job_descriptions[i];
                var work_experience = new WorkExperience(company_name.value, job_title.value, from_date.value,
                    to_date.value, job_description.value);
                yourArray_experience.push(work_experience);
                $("#work_experience").val(JSON.stringify(yourArray_experience));
            }

            for (var i = 0; i < institution_names.length; i++) {
                var institution_name = institution_names[i];
                var degree = degrees[i];
                var specialization = specializations[i];
                var date_of_completion = date_of_completions[i];
                var education_details = new EducationDetails(institution_name.value, degree.value, specialization
                    .value, date_of_completion.value);
                yourArray_education.push(education_details);
                $("#education_details").val(JSON.stringify(yourArray_education));
            }

            for (var i = 0; i < em_names.length; i++) {
                var em_name = em_names[i];
                var relation = relations[i];
                var em_phone = em_phones[i];
                var emergency = new Emergency(em_name.value, relation.value, em_phone.value);
                yourArray_emergency.push(emergency);
                $("#emergency").val(JSON.stringify(yourArray_emergency));
            }
        });

        function WorkExperience(company_name, job_title, from_date, to_date, job_description) {
            this.CompanyName = company_name;
            this.JobTitle = job_title;
            this.FromDate = from_date;
            this.ToDate = to_date;
            this.JobDescription = job_description;
        }

        function EducationDetails(institution_name, degree, specialization, date_of_completion) {
            this.InstitutionName = institution_name;
            this.Degree = degree;
            this.Specialization = specialization;
            this.DateofCompletion = date_of_completion;

        }

        function Emergency(em_wname, relation, em_phone) {
            this.Name = em_name;
            this.Relation = relation;
            this.Phone = em_phone;

        }
    </script>
    <style>
        .tab-btn {
            border: 1px solid #D1D5DB; /* Keeping border but removing bottom */
            border-bottom: none; /* Removes the bottom border */
        }
        .tab-btn.active {
            background-color: white; /* Highlight the active tab */
            border-bottom: 2px solid white; /* Ensuring bottom border disappears */
        }
    </style>
</x-layouts.app>
