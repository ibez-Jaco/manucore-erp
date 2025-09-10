@extends('layouts.panel')

@section('title', 'Form Page Template - ManuCore ERP')

@section('header', 'Customer Management')
@section('subheader', 'Create and manage customer information with comprehensive form validation')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-success" onclick="saveCustomer()">
        💾 Save Customer
    </button>
@endsection

@section('content')
<div class="space-y-6">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">📝</div>
        <div class="alert-content">
            <div class="alert-title">Form Page Template</div>
            <div class="alert-message">Demonstrates comprehensive form patterns with validation, file uploads, and multi-step workflows.</div>
        </div>
    </div>

    {{-- Customer Form --}}
    <form id="customer-form" class="space-y-6">
        @csrf
        
        {{-- Basic Information --}}
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Basic Information</h3>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="form-group">
                        <label class="form-label">Company Name *</label>
                        <input type="text" class="form-input" name="company_name" value="Acme Manufacturing Ltd." required>
                        <div class="form-help">Enter the full legal company name</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Customer Type *</label>
                        <select class="form-select" name="customer_type" required>
                            <option value="">Select customer type</option>
                            <option value="corporate" selected>Corporate</option>
                            <option value="individual">Individual</option>
                            <option value="government">Government</option>
                            <option value="non-profit">Non-Profit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Registration Number</label>
                        <input type="text" class="form-input" name="registration_number" value="2019/123456/07">
                        <div class="form-help">Company registration or VAT number</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Industry</label>
                        <select class="form-select" name="industry">
                            <option value="">Select industry</option>
                            <option value="manufacturing" selected>Manufacturing</option>
                            <option value="retail">Retail</option>
                            <option value="technology">Technology</option>
                            <option value="healthcare">Healthcare</option>
                            <option value="construction">Construction</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contact Information --}}
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Contact Information</h3>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                    <div class="form-group">
                        <label class="form-label">Primary Contact Name *</label>
                        <input type="text" class="form-input" name="contact_name" value="John Smith" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Title</label>
                        <input type="text" class="form-input" name="job_title" value="Procurement Manager">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-input" name="email" value="john.smith@acmemanufacturing.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" class="form-input" name="phone" value="+27 11 123 4567" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <input type="tel" class="form-input" name="mobile" value="+27 82 123 4567">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Website</label>
                        <input type="url" class="form-input" name="website" value="https://www.acmemanufacturing.com">
                    </div>
                </div>
            </div>
        </div>

        {{-- Address Information --}}
        <div class="card">
            <div class="card-header">
                <div class="justify-between d-flex align-center">
                    <h3 class="text-lg font-semibold">Address Information</h3>
                    <div class="gap-2 d-flex">
                        <label class="gap-2 text-sm d-flex align-center">
                            <input type="checkbox" name="same_address" checked onchange="toggleBillingAddress()">
                            <span>Billing same as physical</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    {{-- Physical Address --}}
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Physical Address</h4>
                        <div class="space-y-4">
                            <div class="form-group">
                                <label class="form-label">Street Address *</label>
                                <input type="text" class="form-input" name="physical_address" value="123 Industrial Drive" required>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="form-group">
                                    <label class="form-label">City *</label>
                                    <input type="text" class="form-input" name="physical_city" value="Johannesburg" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Postal Code *</label>
                                    <input type="text" class="form-input" name="physical_postal" value="2001" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Province *</label>
                                <select class="form-select" name="physical_province" required>
                                    <option value="">Select province</option>
                                    <option value="gauteng" selected>Gauteng</option>
                                    <option value="western-cape">Western Cape</option>
                                    <option value="kwazulu-natal">KwaZulu-Natal</option>
                                    <option value="eastern-cape">Eastern Cape</option>
                                    <option value="free-state">Free State</option>
                                    <option value="limpopo">Limpopo</option>
                                    <option value="mpumalanga">Mpumalanga</option>
                                    <option value="north-west">North West</option>
                                    <option value="northern-cape">Northern Cape</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Country *</label>
                                <select class="form-select" name="physical_country" required>
                                    <option value="south-africa" selected>South Africa</option>
                                    <option value="botswana">Botswana</option>
                                    <option value="namibia">Namibia</option>
                                    <option value="lesotho">Lesotho</option>
                                    <option value="swaziland">Eswatini</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Billing Address --}}
                    <div id="billing-address-section" style="opacity: 0.5;">
                        <h4 class="mb-3 font-semibold text-neutral-900">Billing Address</h4>
                        <div class="space-y-4">
                            <div class="form-group">
                                <label class="form-label">Street Address</label>
                                <input type="text" class="form-input" name="billing_address" value="123 Industrial Drive" disabled>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-input" name="billing_city" value="Johannesburg" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" class="form-input" name="billing_postal" value="2001" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Province</label>
                                <select class="form-select" name="billing_province" disabled>
                                    <option value="gauteng" selected>Gauteng</option>
                                    <option value="western-cape">Western Cape</option>
                                    <option value="kwazulu-natal">KwaZulu-Natal</option>
                                    <option value="eastern-cape">Eastern Cape</option>
                                    <option value="free-state">Free State</option>
                                    <option value="limpopo">Limpopo</option>
                                    <option value="mpumalanga">Mpumalanga</option>
                                    <option value="north-west">North West</option>
                                    <option value="northern-cape">Northern Cape</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-select" name="billing_country" disabled>
                                    <option value="south-africa" selected>South Africa</option>
                                    <option value="botswana">Botswana</option>
                                    <option value="namibia">Namibia</option>
                                    <option value="lesotho">Lesotho</option>
                                    <option value="swaziland">Eswatini</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Financial Information --}}
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Financial Information</h3>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <div class="form-group">
                        <label class="form-label">Credit Limit (ZAR)</label>
                        <input type="number" class="form-input" name="credit_limit" value="100000" min="0" step="100">
                        <div class="form-help">Maximum outstanding amount allowed</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Payment Terms</label>
                        <select class="form-select" name="payment_terms">
                            <option value="">Select payment terms</option>
                            <option value="7">7 Days</option>
                            <option value="14">14 Days</option>
                            <option value="30" selected>30 Days</option>
                            <option value="60">60 Days</option>
                            <option value="90">90 Days</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Currency</label>
                        <select class="form-select" name="currency">
                            <option value="ZAR" selected>South African Rand (ZAR)</option>
                            <option value="USD">US Dollar (USD)</option>
                            <option value="EUR">Euro (EUR)</option>
                            <option value="GBP">British Pound (GBP)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">VAT Number</label>
                        <input type="text" class="form-input" name="vat_number" value="4123456789">
                        <div class="form-help">South African VAT registration number</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bank Name</label>
                        <input type="text" class="form-input" name="bank_name" value="Standard Bank">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Account Number</label>
                        <input type="text" class="form-input" name="account_number" value="123456789">
                    </div>
                </div>
            </div>
        </div>

        {{-- Additional Settings --}}
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Additional Settings</h3>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Preferences</h4>
                        <div class="space-y-3">
                            <label class="gap-3 d-flex align-center">
                                <input type="checkbox" name="email_notifications" checked>
                                <span class="text-sm">Email notifications</span>
                            </label>
                            <label class="gap-3 d-flex align-center">
                                <input type="checkbox" name="marketing_emails">
                                <span class="text-sm">Marketing emails</span>
                            </label>
                            <label class="gap-3 d-flex align-center">
                                <input type="checkbox" name="sms_notifications">
                                <span class="text-sm">SMS notifications</span>
                            </label>
                            <label class="gap-3 d-flex align-center">
                                <input type="checkbox" name="active_customer" checked>
                                <span class="text-sm">Active customer</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Notes</h4>
                        <div class="form-group">
                            <textarea class="form-textarea" name="notes" rows="5" placeholder="Add any additional notes about this customer...">Key customer for manufacturing components. Prefers delivery on Tuesdays. Contact John Smith for all communications.</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- File Upload Section --}}
        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-semibold">Documents</h3>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Upload Documents</h4>
                        <div class="p-6 text-center transition-colors border-2 border-dashed rounded-lg cursor-pointer border-neutral-300 hover:border-brand-400" onclick="document.getElementById('file-upload').click()">
                            <div class="mb-2 text-4xl">📁</div>
                            <p class="mb-2 text-sm text-neutral-600">Click to upload or drag and drop</p>
                            <p class="text-xs text-neutral-500">PDF, DOC, XLS up to 10MB</p>
                            <input type="file" id="file-upload" name="documents[]" multiple accept=".pdf,.doc,.docx,.xls,.xlsx" style="display: none;">
                        </div>
                    </div>
                    <div>
                        <h4 class="mb-3 font-semibold text-neutral-900">Existing Documents</h4>
                        <div class="space-y-2">
                            <div class="gap-3 p-3 rounded-lg d-flex align-center bg-neutral-50">
                                <div class="text-lg">📄</div>
                                <div class="flex-1">
                                    <div class="text-sm font-medium">Company Registration.pdf</div>
                                    <div class="text-xs text-neutral-500">Uploaded 2 days ago</div>
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm">Download</button>
                            </div>
                            <div class="gap-3 p-3 rounded-lg d-flex align-center bg-neutral-50">
                                <div class="text-lg">📊</div>
                                <div class="flex-1">
                                    <div class="text-sm font-medium">Financial Statements.xlsx</div>
                                    <div class="text-xs text-neutral-500">Uploaded 1 week ago</div>
                                </div>
                                <button type="button" class="btn btn-secondary btn-sm">Download</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    {{-- Action Buttons --}}
    <div class="card">
        <div class="card-body">
            <div class="flex-wrap justify-between gap-3 d-flex align-center">
                <div class="gap-3 d-flex">
                    <button type="button" class="btn btn-secondary" onclick="resetForm()">
                        🔄 Reset Form
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="previewData()">
                        👁️ Preview Data
                    </button>
                </div>
                <div class="gap-3 d-flex">
                    <button type="button" class="btn btn-secondary">
                        💾 Save Draft
                    </button>
                    <button type="button" class="btn btn-primary" onclick="saveCustomer()">
                        ✅ Save Customer
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function toggleBillingAddress() {
    const checkbox = document.querySelector('input[name="same_address"]');
    const billingSection = document.getElementById('billing-address-section');
    const billingInputs = billingSection.querySelectorAll('input, select');
    
    if (checkbox.checked) {
        billingSection.style.opacity = '0.5';
        billingInputs.forEach(input => input.disabled = true);
        
        // Copy physical address to billing
        copyPhysicalToBilling();
    } else {
        billingSection.style.opacity = '1';
        billingInputs.forEach(input => input.disabled = false);
    }
}

function copyPhysicalToBilling() {
    const physicalToLillingMap = {
        'physical_address': 'billing_address',
        'physical_city': 'billing_city',
        'physical_postal': 'billing_postal',
        'physical_province': 'billing_province',
        'physical_country': 'billing_country'
    };
    
    Object.keys(physicalToLillingMap).forEach(physicalField => {
        const physicalInput = document.querySelector(`[name="${physicalField}"]`);
        const billingInput = document.querySelector(`[name="${physicalToLillingMap[physicalField]}"]`);
        if (physicalInput && billingInput) {
            billingInput.value = physicalInput.value;
        }
    });
}

function resetForm() {
    if (window.Swal) {
        Swal.fire({
            title: 'Reset Form?',
            text: 'All entered data will be lost',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--danger-600)',
            cancelButtonColor: 'var(--neutral-400)',
            confirmButtonText: 'Yes, reset it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('customer-form').reset();
                toggleBillingAddress(); // Re-apply billing address logic
                if (window.ManuCore) {
                    ManuCore.showToast('Form has been reset', 'info');
                }
            }
        });
    }
}

function previewData() {
    const formData = new FormData(document.getElementById('customer-form'));
    const data = {};
    
    // Convert FormData to regular object
    for (let [key, value] of formData.entries()) {
        data[key] = value;
    }
    
    if (window.Swal) {
        Swal.fire({
            title: 'Form Data Preview',
            html: `
                <div style="text-align: left; max-height: 400px; overflow-y: auto;">
                    <pre style="background: #f5f5f5; padding: 15px; border-radius: 8px; font-size: 12px; white-space: pre-wrap;">${JSON.stringify(data, null, 2)}</pre>
                </div>
            `,
            width: '80%',
            confirmButtonColor: 'var(--brand-600)'
        });
    }
    
    console.log('Form Data:', data);
}

function saveCustomer() {
    // Simulate form validation
    const form = document.getElementById('customer-form');
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('form-input-error');
        } else {
            field.classList.remove('form-input-error');
        }
    });
    
    if (!isValid) {
        if (window.ManuCore) {
            ManuCore.showToast('Please fill in all required fields', 'error');
        }
        return;
    }
    
    // Simulate saving
    if (window.ManuCore) {
        ManuCore.showLoading('Saving Customer...', 'Please wait while we save the customer information');
        
        setTimeout(() => {
            Swal.close();
            ManuCore.showToast('Customer saved successfully!', 'success');
        }, 2000);
    }
}

// File upload handling
document.getElementById('file-upload').addEventListener('change', function(e) {
    const files = e.target.files;
    if (files.length > 0) {
        let fileNames = Array.from(files).map(file => file.name).join(', ');
        if (window.ManuCore) {
            ManuCore.showToast(`Selected ${files.length} file(s): ${fileNames}`, 'info');
        }
    }
});

// Auto-copy physical address when changed
['physical_address', 'physical_city', 'physical_postal', 'physical_province', 'physical_country'].forEach(fieldName => {
    const field = document.querySelector(`[name="${fieldName}"]`);
    if (field) {
        field.addEventListener('input', function() {
            const sameAddressChecked = document.querySelector('input[name="same_address"]').checked;
            if (sameAddressChecked) {
                copyPhysicalToBilling();
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    console.log('📝 Form Page Template loaded');
    
    // Initialize billing address state
    toggleBillingAddress();
});
</script>
@endpush