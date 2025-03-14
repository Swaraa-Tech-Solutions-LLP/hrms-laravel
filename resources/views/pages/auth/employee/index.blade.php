<x-layouts.app>
    <div class="min-h-screen bg-gray-100 p-4 mt-10">
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <h1 class="text-2xl font-bold">All Employees</h1>
                <div class="flex-1 sm:max-w-sm">
                    <input type="text" placeholder="Search employee" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <a href="{{route('employee.create')}}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded text-sm font-medium">New Employee</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($employees as $employee)
                    <div class="bg-white p-4 rounded shadow flex flex-col items-center space-y-2">
                        <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center">
                            <img class="rounded-full object-cover w-24 h-24" src="{{ asset('storage/' . $employee->personalDetails->profile_image) }}" alt="Employee photo">
                        </div>
                        <p class="font-semibold text-gray-800">{{$employee->name}}</p>
                        <p class="text-sm text-gray-500">{{$employee->email}}</p>
                        <p class="text-sm text-gray-500">{{$employee->contactDetails->mobile_number}}</p>
                        <div class="flex space-x-3 text-xl mt-2">
                            <button class="text-green-500 hover:text-green-600">
                                <i class="fas fa-pencil-alt" style="color: green;"></i>

                            </button>
                            <button class="text-red-500 hover:text-red-600">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-layouts.app>
