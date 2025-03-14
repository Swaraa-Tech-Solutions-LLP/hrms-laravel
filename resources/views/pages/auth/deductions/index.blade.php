<x-layouts.app>
    <div class="min-h-screen bg-gray-100 p-4 mt-10">
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold">Deductions</h1>
                <p class="text-gray-600">All Your Deductions</p>
            </div>

            <div class="mb-4 flex gap-4">
                <a href="{{asset('format/deduction_template.xlsx')}}" target="_blank" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700">Download Template</a>
                <a href="#" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700">Upload Deduction</a>
                <button id="newDeductionBtn" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700">New Deduction</button>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full bg-white table-auto">
                    <thead class="bg-gray-100">
                    <tr class="text-left text-sm font-semibold text-gray-700 border-b">
                        <th class="py-3 px-4 cursor-pointer">Id <i class="fas fa-sort"></i></th>
                        <th class="py-3 px-4 cursor-pointer">Code <i class="fas fa-sort"></i></th>
                        <th class="py-3 px-4 cursor-pointer">Employee <i class="fas fa-sort"></i></th>
                        <th class="py-3 px-4 cursor-pointer">Type <i class="fas fa-sort"></i></th>
                        <th class="py-3 px-4 cursor-pointer">Description <i class="fas fa-sort"></i></th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deductions as $deduction)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{$deduction->id}}</td>
                        <td class="py-3 px-4">{{$deduction->code}}</td>
                        <td class="py-3 px-4">{{$deduction->employee_id}}</td>
                        <td class="py-3 px-4">{{$deduction->deduction_type}}</td>
                        <td class="py-3 px-4">{{$deduction->description}}</td>
                        <td class="py-3 px-4 flex space-x-2">
                            <a data-id="{{$deduction->id}}" data-code="{{$deduction->code}}" data-employee-id="{{$deduction->employee_id}}" data-deduction-type="{{$deduction->deduction_type}}" data-description="{{$deduction->description}}" class="deduction_edit text-blue-600 hover:text-blue-800">Edit</a>
                            <a data-id="{{$deduction->id}}" class="deduction_delete text-red-600 hover:text-red-800">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="deductionModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(0,0,0,0.7)]">
        <div class="bg-white p-10 rounded-2xl shadow-2xl w-1/3 max-w-md transform transition-transform duration-200 ease-out translate-y-[-50px]">
            <h3 class="text-3xl font-semibold mb-8 text-center text-gray-800" id="DeductionActionTitle">Add Deduction</h3>
            <div id="message" class="mb-4 text-center text-lg hidden"></div>
            <form id="deductionForm" method="POST">
                <div class="mb-6">
                    <label for="employee" class="block text-sm font-medium text-gray-700">User:</label>
                    <select name="employee" id="employee" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none text-lg" required>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="code" class="block text-sm font-medium text-gray-700">Deduction Code:</label>
                    <input type="text" id="code" name="code" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none text-lg" required>
                </div>
                <div class="mb-6">
                    <label for="deduction_type" class="block text-sm font-medium text-gray-700">Deduction Type:</label>
                    <select id="deduction_type" name="deduction_type" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none text-lg" required>
                        <option value="">Select Type</option>
                        <option value="SSS Loan">SSS Loan</option>
                        <option value="Pag-IBIG Loan">Pag-IBIG Loan</option>
                        <option value="Personal Loan">Personal Loan</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                    <input type="text" id="description" name="description" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:outline-none text-lg" required>
                </div>
                <div class="flex justify-between items-center">
                    <button type="button" id="closeModalBtn" class="bg-gray-500 text-white px-6 py-3 rounded-lg text-lg hover:bg-gray-600 focus:outline-none transition duration-200">Close</button>
                    <button type="submit" class="bg-purple-600 text-white px-8 py-3 rounded-lg text-lg hover:bg-purple-700 focus:outline-none transition duration-200">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
