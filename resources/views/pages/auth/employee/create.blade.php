<x-layouts.app>
    <div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg mx-auto">
            <h2 class="text-3xl font-bold text-center mb-6 text-gray-700">Add Employee</h2>

            <!-- Step Progress -->
            <div class="flex space-x-2 overflow-x-auto pb-4">
                @php
                    $steps = [
                        'Basic Info', 'Work Info', 'Personal Details',
                        'Identity', 'Contact', 'Address', 'Work Experience',
                        'Education', 'Emergency Contacts', 'Separation Info', 'Salary Details'
                    ];
                @endphp
                @foreach ($steps as $index => $step)
                    <button id="tab{{ $index+1 }}"
                            class="tab-btn flex-1 py-2 px-3 text-sm border border-gray-300 text-gray-700 bg-gray-100 hover:bg-gray-200"
                            onclick="showTab({{ $index+1 }})" disabled>
                        {{ $step }}
                        <span id="check{{ $index+1 }}" class="hidden text-green-500 ml-2">✔</span>
                    </button>
                @endforeach
            </div>

            <!-- Forms -->
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data" id="employeeForm" class="mt-4">
                @csrf

                @php
                    $sections = [
                        'Basic Information' => 'basic-info',
                        'Work Information' => 'work-info',
                        'Personal Details' => 'personal-details',
                        'Identity Information' => 'identity-info',
                        'Contact Details' => 'contact-details',
                        'Address Details' => 'address-details',
                        'Work Experience' => 'work-experience',
                        'Education Details' => 'education-details',
                        'Emergency Contacts' => 'emergency-contacts',
                        'Separation Information' => 'separation-info',
                        'Salary Details' => 'salary-details'
                    ];
                @endphp

                @foreach ($sections as $title => $id)
                    <div class="tab-content hidden bg-gray-50 p-6 rounded-lg shadow-md" id="tabContent{{ $loop->index + 1 }}">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">{{ $title }}</h3>
                        @if ($id === 'basic-info')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 font-medium">First Name</label>
                                    <input type="text" class="w-full p-2 border rounded-lg" name="first_name" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Middle Name</label>
                                    <input type="text" class="w-full p-2 border rounded-lg" name="middle_name" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Last Name</label>
                                    <input type="text" class="w-full p-2 border rounded-lg" name="last_name" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Email Address</label>
                                    <input type="email" class="w-full p-2 border rounded-lg" name="email" required>
                                </div>
                            </div>
                        @endif

                        @if ($id === 'work-info')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 font-medium">Department</label>
                                    <select class="w-full p-2 border rounded-lg" name="department_name" required>
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
                                    <select class="w-full p-2 border rounded-lg" name="location_name" required>
                                        <option value="">Select</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Deignation</label>
                                    <select class="w-full p-2 border rounded-lg" name="designation_name" required>
                                        <option value="">Select</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Job Role</label>
                                    <select class="w-full p-2 border rounded-lg" name="job_role" required>
                                        <option value="">Select</option>
                                        <option value="GUARD8">GUARD8</option>
                                        <option value="GUARD10">GUARD10</option>
                                        <option value="GUARD12">GUARD12</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium">Status</label>
                                    <select class="w-full p-2 border rounded-lg" name="status" required>
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Terminated</option>
                                        <option value="2">Deceased</option>
                                        <option value="3">Resigned</option>
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
                                    <label class="block text-gray-700 font-medium">Personal Details</label>
                                    <select class="w-full p-2 border rounded-lg" name="department_name" required>
                                        <option value="">Select</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif

                        <button type="button" class="next-btn mt-6 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 shadow-md" onclick="nextStep({{ $loop->index + 1 }})">
                            Next
                        </button>
                    </div>
                @endforeach

                <!-- Submit Button -->
                <div class="hidden text-center mt-6" id="submitSection">
                    <button type="submit" class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 shadow-md">Submit</button>
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
            document.querySelectorAll(`#tabContent${step} input, #tabContent${step} select`).forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.classList.add('border-red-500');
                } else {
                    input.classList.remove('border-red-500');
                }
            });
            return valid;
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
