<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\Designations;
use App\Models\Locations;
use Illuminate\Http\Request;
use App\Models\Departments;
use App\Models\SalaryComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\WorkInfo;
use App\Models\JobRole;
use App\Models\PersonalDetails;
use App\Models\IdentityInformations;
use App\Models\ContactDetails;
use App\Models\WorkExperience;
use App\Models\EducationDetails;
use App\Models\EmergencyContacts;
use App\Models\SeparationInformation;
use App\Models\SalaryDetails;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('pages.auth.employee.index');
    }

    public function create()
    {
        $departments = Departments::all();
        $clients = Clients::all();
        $locations = Locations::all();
        $designations = Designations::all();
        $SalaryComponent = SalaryComponent::all();
        $jobRoles = JobRole::all();
        $sections = [
            'Basic Information' => 'basic-info',
            'Work Information' => 'work-info',
            'Personal Details' => 'personal-details',
            'Identity Information' => 'identity-info',
            'Contact Details' => 'contact-details',
            'Work Experience' => 'work-experience',
            'Education Details' => 'education-details',
            'Emergency Contacts' => 'emergency-contacts',
            'Separation Information' => 'separation-info',
            'Salary Details' => 'salary-details'
        ];
        $steps = ['Basic Info', 'Work Info', 'Personal Details', 'Identity', 'Contact', 'Work Experience', 'Education', 'Emergency Contacts', 'Separation Info', 'Salary Details'];

        return view('pages.auth.employee.create', compact('departments', 'clients', 'locations', 'designations', 'SalaryComponent', 'sections', 'steps', 'jobRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'department' => 'required',
            'client' => 'required',
            'location' => 'required',
            'designation' => 'required',
            'job_role' => 'required',
            'status' => 'required',

            'dob' => 'required|date',
            'marital_status' => 'required|string',
            'gender' => 'required|in:Male,Female,Other',
            'blood_group' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'mobile_number' => 'required|string|unique:contact_details,mobile_number', // Ensure the mobile number is unique
            'present_address' => 'required|string',
            'present_city' => 'required|string',
            'present_country' => 'required|string',
            'national_id' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'permanent_city' => 'nullable|string',
            'permanent_country' => 'nullable|string',

            'sss_no' => 'nullable|string',
            'philhealth_no' => 'nullable|string',
            'hdmf' => 'nullable|string',
            'tax_identification_no' => 'nullable|string',
            'bank_name' => 'required|string',
            'bank_account_number' => 'required|string',

            'contract_starting_date' => 'required|date',
            'contract_ending_date' => 'required|date',
            'reason_for_leaving' => 'nullable|string',

            'ctc_salary' => 'required|numeric',
            'basic_monthly' => 'required|numeric',
            'house_rent_allowance_monthly' => 'required|numeric',
            'conveyance_allowance_monthly' => 'required|numeric',
            'fixed_allowance_monthly' => 'required|numeric',
            'basic_annual' => 'required|numeric',
            'house_rent_allowance_annual' => 'required|numeric',
            'conveyance_allowance_annual' => 'required|numeric',
            'fixed_allowance_annual' => 'required|numeric',
        ]);

        try {
            $employeeCode = $this->generateEmployeeCode();
            $user = User::create([
                'name' => $request->firstname . ' ' . $request->middlename . ' ' . $request->lastname,
                'email' => $request->email,
                'username' => $employeeCode,
                'user_type' => 'Employee',
                'gender' => $request->gender,
                'firstname' => $request->first_name,
                'middlename' => $request->middle_name,
                'lastname' => $request->last_name,
                'employee_code' => $employeeCode,
                'password' => Hash::make($employeeCode),
            ]);

            WorkInfo::create([
                'employee_id' => $user->id,
                'department_id' => $request->department,
                'client_id' => $request->client,
                'location_id' => $request->location,
                'designation_id' => $request->designation,
                'job_role_id' => $request->job_role,
                'status' => $request->status,
                'join_date' => $request->join_date,
            ]);

            IdentityInformations::create([
                'employee_id' => $user->id,
                'sss_no' => $request->sss_no,
                'philhealth_no' => $request->philhealth_no,
                'hdmf' => $request->hdmf,
                'tax_identification_no' => $request->tax_identification_no,
            ]);
            if ($request->hasFile('imgfile')) {
                $profileImagePath = $request->file('imgfile')->store('profile_images', 'public');
            } else {
                $profileImagePath = null;
            }

            PersonalDetails::create([
                'employee_id' => $user->id,
                'date_of_birth' => $request->dob,
                'marital_status' => $request->marital_status,
                'gender' => $request->gender,
                'blood_group' => $request->blood_group,
                'profile_image' => $profileImagePath
            ]);

            ContactDetails::create([
                'employee_id' => $user->id,
                'mobile_number' => $request->phone,
                'present_address' => $request->present_address,
                'present_city' => $request->present_city,
                'present_state' => $request->present_state,
                'present_country' => $request->present_country,
                'present_national_id' => $request->present_national_id,
                'permanent_address' => $request->permanent_address,
                'permanent_city' => $request->permanent_city,
                'permanent_state' => $request->permanent_state,
                'permanent_country' => $request->permanent_country,
                'permanent_national_id' => $request->permanent_national_id,
            ]);

            $companies = $request->input('company_name');
            $jobTitles = $request->input('job_title');
            $fromDates = $request->input('from_date');
            $toDates = $request->input('to_date');
            $jobDescriptions = $request->input('job_description');
            $count = count($companies);
            for ($i = 0; $i < $count; $i++) {
                WorkExperience::create([
                    'employee_id' => $user->id,
                    'company_name' => $companies[$i] ?? '',
                    'job_title' => $jobTitles[$i] ?? '',
                    'from_date' => $fromDates[$i] ?? '',
                    'to_date' => $toDates[$i] ?? '',
                    'job_description' => $jobDescriptions[$i] ?? ''
                ]);
            }

            $institutions = $request->input('institution_name'); // array
            $degrees = $request->input('degree');           // array
            $specializations = $request->input('specialization');   // array
            $completionDates = $request->input('date_of_completion'); // array

            $count = count($institutions);
            for ($i = 0; $i < $count; $i++) {
                EducationDetails::create([
                    'employee_id' => $user->id,
                    'institution_name' => $institutions[$i] ?? '',
                    'degree_diploma' => $degrees[$i] ?? '',
                    'specialization' => $specializations[$i] ?? '',
                    'date_of_completion' => $completionDates[$i] ?? ''
                ]);
            }

            $emNames = $request->input('em_name');
            $relations = $request->input('relation');
            $emPhones = $request->input('em_phone');
            $count = count($emNames);

            for ($i = 0; $i < $count; $i++) {
                EmergencyContacts::create([
                    'employee_id' => $user->id,
                    'name' => $emNames[$i] ?? '',
                    'relationship' => $relations[$i] ?? '',
                    'phone' => $emPhones[$i] ?? ''
                ]);
            }

            SeparationInformation::create([
                'employee_id' => $user->id,
                'contract_starting_date' => $request->contract_start_date,
                'contract_ending_date' => $request->contract_end_date,
                'reason_for_leaving' => $request->reason_for_leaving,
            ]);

            SalaryDetails::create([
                'employee_id' => $user->id,
                'ctc_salary' => $request->ctc_salary_selection,
                'basic_monthly' => $request->monthly_basic,
                'house_rent_allowance_monthly' => $request->monthly_house_rent,
                'conveyance_allowance_monthly' => $request->monthly_conveyance,
                'fixed_allowance_monthly' => $request->monthly_fixed,
                'basic_annual' => $request->annual_basic,
                'house_rent_allowance_annual' => $request->annual_house_rent,
                'conveyance_allowance_annual' => $request->annual_conveyance,
                'fixed_allowance_annual' => $request->annual_fixed
            ]);
            return redirect()->back()->with('success', 'Employee Created');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'something went wrong.');
        }
    }

    private function generateEmployeeCode()
    {
        $latestEmployee = User::latest('id')->first();
        $latestCode = $latestEmployee ? (int)substr($latestEmployee->employee_code, 4) : 0;
        return 'EMP-' . str_pad($latestCode + 1, 3, '0', STR_PAD_LEFT);
    }
}
