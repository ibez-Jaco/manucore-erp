@extends('layouts.panel')

@section('title', 'Form Examples - ManuCore ERP')

@section('header', 'Form Component Examples')
@section('subheader', 'Comprehensive collection of form patterns and input components')

@section('page-actions')
    <a href="{{ route('admin.templates') }}" class="btn btn-secondary">
        ← Back to Templates
    </a>
    <button class="btn btn-secondary" onclick="copyAllForms()">
        📋 Copy All Examples
    </button>
@endsection

@section('content')
<div class="space-y-8">

    {{-- Template Info --}}
    <div class="alert alert-primary">
        <div class="alert-icon">📋</div>
        <div class="alert-content">
            <div class="alert-title">Form Component Library</div>
            <div class="alert-message">Complete form patterns with validation, styling, and accessibility features using the ManuCore theme system.</div>
        </div>
    </div>

    {{-- Basic Form Elements --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Basic Form Elements</h3>
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Standard Form Controls</h4>
            </div>
            <div class="card-body">
                <form class="space-y-4">
                    @csrf
                    
                    {{-- Text Inputs --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Text Input</label>
                            <input type="text" class="form-input" placeholder="Enter text here">
                            <div class="form-help">Standard text input field</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Required Field *</label>
                            <input type="text" class="form-input" required placeholder="This field is required">
                        </div>
                    </div>

                    {{-- Email and Password --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Email Input</label>
                            <input type="email" class="form-input" placeholder="user@example.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password Input</label>
                            <input type="password" class="form-input" placeholder="••••••••">
                        </div>
                    </div>

                    {{-- Number and Tel --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Number Input</label>
                            <input type="number" class="form-input" placeholder="123" min="0" max="1000">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-input" placeholder="+27 11 123 4567">
                        </div>
                    </div>

                    {{-- Date and Time --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="form-group">
                            <label class="form-label">Date Input</label>
                            <input type="date" class="form-input" value="2024-09-09">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Time Input</label>
                            <input type="time" class="form-input" value="14:30">
                        </div>
                        <div class="form-group">
                            <label class="form-label">DateTime Local</label>
                            <input type="datetime-local" class="form-input">
                        </div>
                    </div>

                    {{-- Select and Textarea --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Select Dropdown</label>
                            <select class="form-select">
                                <option value="">Choose an option</option>
                                <option value="option1">Option 1</option>
                                <option value="option2" selected>Option 2 (Selected)</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">File Upload</label>
                            <input type="file" class="form-input" accept=".pdf,.doc,.docx">
                            <div class="form-help">Supported formats: PDF, DOC, DOCX</div>
                        </div>
                    </div>

                    {{-- Textarea --}}
                    <div class="form-group">
                        <label class="form-label">Textarea</label>
                        <textarea class="form-textarea" rows="4" placeholder="Enter detailed description...">Sample textarea content with multiple lines of text that demonstrates how the component handles longer form content.</textarea>
                    </div>

                    {{-- Checkboxes and Radio --}}
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Checkboxes</label>
                            <div class="space-y-2">
                                <label class="gap-2 d-flex align-center">
                                    <input type="checkbox" checked>
                                    <span class="text-sm">Email notifications</span>
                                </label>
                                <label class="gap-2 d-flex align-center">
                                    <input type="checkbox">
                                    <span class="text-sm">SMS notifications</span>
                                </label>
                                <label class="gap-2 d-flex align-center">
                                    <input type="checkbox" checked>
                                    <span class="text-sm">Push notifications</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Radio Buttons</label>
                            <div class="space-y-2">
                                <label class="gap-2 d-flex align-center">
                                    <input type="radio" name="priority" value="low">
                                    <span class="text-sm">Low Priority</span>
                                </label>
                                <label class="gap-2 d-flex align-center">
                                    <input type="radio" name="priority" value="medium" checked>
                                    <span class="text-sm">Medium Priority</span>
                                </label>
                                <label class="gap-2 d-flex align-center">
                                    <input type="radio" name="priority" value="high">
                                    <span class="text-sm">High Priority</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Form Sizes --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Form Input Sizes</h3>
        <div class="card">
            <div class="card-body">
                <div class="space-y-4">
                    <div class="form-group">
                        <label class="form-label">Small Input</label>
                        <input type="text" class="form-input form-input-sm" placeholder="Small input field">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Regular Input</label>
                        <input type="text" class="form-input" placeholder="Regular sized input field">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Large Input</label>
                        <input type="text" class="form-input form-input-lg" placeholder="Large input field">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Form States --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Form States & Validation</h3>
        <div class="card">
            <div class="card-body">
                <div class="space-y-4">
                    {{-- Success State --}}
                    <div class="form-group">
                        <label class="form-label">Valid Input</label>
                        <input type="text" class="form-input" value="john@example.com" style="border-color: var(--success-500);">
                        <div class="mt-1 text-xs text-success-600">✓ Email format is valid</div>
                    </div>

                    {{-- Error State --}}
                    <div class="form-group">
                        <label class="form-label">Invalid Input</label>
                        <input type="text" class="form-input form-input-error" value="invalid-email">
                        <div class="form-error">Please enter a valid email address</div>
                    </div>

                    {{-- Disabled State --}}
                    <div class="form-group">
                        <label class="form-label">Disabled Input</label>
                        <input type="text" class="form-input" value="This field is disabled" disabled>
                    </div>

                    {{-- Readonly State --}}
                    <div class="form-group">
                        <label class="form-label">Readonly Input</label>
                        <input type="text" class="form-input" value="This field is readonly" readonly>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Advanced Form Patterns --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Advanced Form Patterns</h3>
        
        {{-- Multi-step Form --}}
        <div class="mb-6 card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Multi-step Form</h4>
            </div>
            <div class="card-body">
                {{-- Progress Indicator --}}
                <div class="mb-6">
                    <div class="justify-between mb-2 d-flex align-center">
                        <span class="text-sm font-medium text-brand-600">Step 2 of 4</span>
                        <span class="text-sm text-neutral-500">50% Complete</span>
                    </div>
                    <div class="h-2 rounded-full w-100 bg-neutral-200">
                        <div class="h-2 rounded-full bg-brand-600" style="width: 50%"></div>
                    </div>
                </div>

                {{-- Step Content --}}
                <div class="space-y-4">
                    <h5 class="font-medium text-neutral-900">Company Information</h5>
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="form-group">
                            <label class="form-label">Company Name *</label>
                            <input type="text" class="form-input" value="Acme Manufacturing Ltd.">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Registration Number</label>
                            <input type="text" class="form-input" value="2019/123456/07">
                        </div>
                    </div>
                </div>

                {{-- Navigation --}}
                <div class="justify-between mt-6 d-flex">
                    <button class="btn btn-secondary">← Previous</button>
                    <button class="btn btn-primary">Next →</button>
                </div>
            </div>
        </div>

        {{-- Inline Form --}}
        <div class="mb-6 card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Inline Form</h4>
            </div>
            <div class="card-body">
                <form class="flex-wrap gap-3 d-flex align-center">
                    <div class="mb-0 form-group">
                        <input type="text" class="form-input form-input-sm" placeholder="Search products...">
                    </div>
                    <div class="mb-0 form-group">
                        <select class="form-select form-input-sm">
                            <option value="">All Categories</option>
                            <option value="electronics">Electronics</option>
                            <option value="mechanical">Mechanical</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">🔍 Search</button>
                    <button type="button" class="btn btn-secondary btn-sm">Clear</button>
                </form>
            </div>
        </div>

        {{-- Form with Sections --}}
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Sectioned Form</h4>
            </div>
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Section 1 --}}
                    <div class="form-section">
                        <div class="form-section-title">
                            <h5 class="font-medium text-neutral-900">Personal Information</h5>
                        </div>
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="form-group">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-input" value="John">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-input" value="Smith">
                            </div>
                        </div>
                    </div>

                    {{-- Section 2 --}}
                    <div class="form-section">
                        <div class="form-section-title">
                            <h5 class="font-medium text-neutral-900">Contact Details</h5>
                        </div>
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="form-group">
                                <label class="form-label">Email Address *</label>
                                <input type="email" class="form-input" value="john.smith@example.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-input" value="+27 11 123 4567">
                            </div>
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="form-actions">
                        <div class="justify-end gap-3 d-flex">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Information</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Custom Components --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Custom Form Components</h3>
        
        {{-- Color Picker --}}
        <div class="mb-6 card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Custom Controls</h4>
            </div>
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Color Picker --}}
                    <div class="form-group">
                        <label class="form-label">Color Selection</label>
                        <div class="gap-2 d-flex align-center">
                            <input type="color" class="form-input" value="#2563eb" style="width: 60px; height: 40px; padding: 4px;">
                            <input type="text" class="form-input" value="#2563eb" style="font-family: monospace;">
                        </div>
                    </div>

                    {{-- Range Slider --}}
                    <div class="form-group">
                        <label class="form-label">Range Slider</label>
                        <div class="gap-4 d-flex align-center">
                            <input type="range" class="flex-1" min="0" max="100" value="75" id="range-slider">
                            <span class="w-12 text-sm font-medium text-center" id="range-value">75</span>
                        </div>
                    </div>

                    {{-- Toggle Switch --}}
                    <div class="form-group">
                        <label class="form-label">Toggle Switch</label>
                        <div class="gap-3 d-flex align-center">
                            <div class="toggle-switch" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                            <span class="text-sm">Enable notifications</span>
                        </div>
                    </div>

                    {{-- Tag Input --}}
                    <div class="form-group">
                        <label class="form-label">Tags</label>
                        <div class="tag-input">
                            <div class="tag-container">
                                <span class="tag">Manufacturing <button onclick="removeTag(this)">×</button></span>
                                <span class="tag">Industrial <button onclick="removeTag(this)">×</button></span>
                                <span class="tag">ERP <button onclick="removeTag(this)">×</button></span>
                                <input type="text" class="tag-input-field" placeholder="Add tag..." onkeypress="addTag(event)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- File Upload Area --}}
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">File Upload Components</h4>
            </div>
            <div class="card-body">
                <div class="space-y-6">
                    {{-- Drag & Drop Area --}}
                    <div class="form-group">
                        <label class="form-label">Drag & Drop Upload</label>
                        <div class="upload-area" onclick="document.getElementById('file-upload').click()">
                            <div class="upload-content">
                                <div class="upload-icon">📁</div>
                                <div class="upload-text">
                                    <div class="upload-title">Click to upload or drag and drop</div>
                                    <div class="upload-subtitle">PDF, DOC, XLS up to 10MB</div>
                                </div>
                            </div>
                            <input type="file" id="file-upload" multiple accept=".pdf,.doc,.docx,.xls,.xlsx" style="display: none;">
                        </div>
                    </div>

                    {{-- File List --}}
                    <div class="form-group">
                        <label class="form-label">Uploaded Files</label>
                        <div class="file-list">
                            <div class="file-item">
                                <div class="file-icon">📄</div>
                                <div class="file-details">
                                    <div class="file-name">Document.pdf</div>
                                    <div class="file-size">2.4 MB</div>
                                </div>
                                <div class="file-actions">
                                    <button class="btn btn-ghost btn-sm">View</button>
                                    <button class="btn btn-ghost btn-sm">Remove</button>
                                </div>
                            </div>
                            <div class="file-item">
                                <div class="file-icon">📊</div>
                                <div class="file-details">
                                    <div class="file-name">Spreadsheet.xlsx</div>
                                    <div class="file-size">1.8 MB</div>
                                </div>
                                <div class="file-actions">
                                    <button class="btn btn-ghost btn-sm">View</button>
                                    <button class="btn btn-ghost btn-sm">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Form Validation Examples --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Form Validation</h3>
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Real-time Validation</h4>
            </div>
            <div class="card-body">
                <form id="validation-form" class="space-y-4">
                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-input" name="email" required>
                        <div class="validation-message"></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password *</label>
                        <input type="password" class="form-input" name="password" required minlength="8">
                        <div class="validation-message"></div>
                        <div class="form-help">Minimum 8 characters</div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Confirm Password *</label>
                        <input type="password" class="form-input" name="confirm_password" required>
                        <div class="validation-message"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" class="form-input" name="phone" required pattern="[+][0-9]{2}\s[0-9]{2}\s[0-9]{3}\s[0-9]{4}">
                        <div class="validation-message"></div>
                        <div class="form-help">Format: +27 11 123 4567</div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Validate Form</button>
                        <button type="button" class="btn btn-secondary" onclick="resetValidation()">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Code Examples --}}
    <section>
        <h3 class="mb-4 text-xl font-bold text-neutral-900">Implementation Examples</h3>
        <div class="card">
            <div class="card-header">
                <h4 class="font-semibold text-neutral-900">Form Component Code</h4>
            </div>
            <div class="card-body">
                <div class="space-y-4">
                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Basic Form Structure</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;div class="form-group"&gt;
    &lt;label class="form-label"&gt;Label Text *&lt;/label&gt;
    &lt;input type="text" class="form-input" required&gt;
    &lt;div class="form-help"&gt;Helper text&lt;/div&gt;
    &lt;div class="form-error"&gt;Error message&lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>

                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Form Grid Layout</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>&lt;div class="grid grid-cols-1 gap-4 lg:grid-cols-2"&gt;
    &lt;div class="form-group"&gt;
        &lt;label class="form-label"&gt;First Field&lt;/label&gt;
        &lt;input type="text" class="form-input"&gt;
    &lt;/div&gt;
    &lt;div class="form-group"&gt;
        &lt;label class="form-label"&gt;Second Field&lt;/label&gt;
        &lt;input type="text" class="form-input"&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                    </div>

                    <div>
                        <h5 class="mb-2 font-medium text-neutral-700">Form Validation Classes</h5>
                        <pre class="p-4 overflow-x-auto text-sm rounded-lg bg-neutral-100"><code>/* Validation state classes */
.form-input-error     /* Error state styling */
.form-error          /* Error message styling */
.form-help           /* Helper text styling */

/* Size variations */
.form-input-sm       /* Small input */
.form-input-lg       /* Large input */</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('head')
<style>
/* Custom form component styles */
.toggle-switch {
    width: 48px;
    height: 24px;
    background: var(--neutral-300);
    border-radius: var(--radius-full);
    position: relative;
    cursor: pointer;
    transition: background var(--transition-fast);
}

.toggle-switch.active {
    background: var(--brand-600);
}

.toggle-slider {
    width: 20px;
    height: 20px;
    background: white;
    border-radius: var(--radius-full);
    position: absolute;
    top: 2px;
    left: 2px;
    transition: transform var(--transition-fast);
    box-shadow: var(--shadow-sm);
}

.toggle-switch.active .toggle-slider {
    transform: translateX(24px);
}

.tag-input {
    border: 1px solid var(--neutral-300);
    border-radius: var(--radius-lg);
    padding: var(--space-2);
    background: white;
    transition: border-color var(--transition-fast);
}

.tag-input:focus-within {
    border-color: var(--brand-500);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.tag-container {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    align-items: center;
}

.tag {
    display: inline-flex;
    align-items: center;
    gap: var(--space-1);
    padding: var(--space-1) var(--space-2);
    background: var(--brand-100);
    color: var(--brand-700);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
}

.tag button {
    background: none;
    border: none;
    color: var(--brand-600);
    cursor: pointer;
    padding: 0;
    font-size: 14px;
}

.tag-input-field {
    border: none;
    outline: none;
    padding: var(--space-1);
    min-width: 100px;
    flex: 1;
}

.upload-area {
    border: 2px dashed var(--neutral-300);
    border-radius: var(--radius-lg);
    padding: var(--space-8);
    text-align: center;
    cursor: pointer;
    transition: all var(--transition-fast);
    background: var(--neutral-50);
}

.upload-area:hover {
    border-color: var(--brand-400);
    background: var(--brand-50);
}

.upload-icon {
    font-size: 3rem;
    margin-bottom: var(--space-3);
}

.upload-title {
    font-weight: 500;
    color: var(--neutral-900);
    margin-bottom: var(--space-1);
}

.upload-subtitle {
    font-size: var(--text-sm);
    color: var(--neutral-500);
}

.file-list {
    space-y: var(--space-3);
}

.file-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3);
    background: var(--neutral-50);
    border-radius: var(--radius-lg);
}

.file-icon {
    font-size: 1.5rem;
}

.file-details {
    flex: 1;
}

.file-name {
    font-weight: 500;
    color: var(--neutral-900);
    font-size: var(--text-sm);
}

.file-size {
    font-size: var(--text-xs);
    color: var(--neutral-500);
}

.file-actions {
    display: flex;
    gap: var(--space-2);
}

.form-section {
    background: white;
    border: 1px solid var(--neutral-200);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    margin-bottom: var(--space-6);
}

.form-section-title {
    padding-bottom: var(--space-4);
    border-bottom: 1px solid var(--neutral-200);
    margin-bottom: var(--space-6);
}

.form-actions {
    padding-top: var(--space-6);
    border-top: 1px solid var(--neutral-200);
    margin-top: var(--space-6);
}

.validation-message {
    font-size: var(--text-xs);
    margin-top: var(--space-1);
    min-height: 1rem;
}

.validation-message.error {
    color: var(--danger-600);
}

.validation-message.success {
    color: var(--success-600);
}

/* Dark mode adjustments */
[data-theme="dark"] .form-section {
    background: var(--neutral-100);
    border-color: var(--neutral-300);
}

[data-theme="dark"] .upload-area {
    background: var(--neutral-200);
    border-color: var(--neutral-400);
}

[data-theme="dark"] .upload-area:hover {
    background: var(--brand-950);
    border-color: var(--brand-600);
}

[data-theme="dark"] .file-item {
    background: var(--neutral-200);
}

[data-theme="dark"] .tag {
    background: var(--brand-950);
    color: var(--brand-300);
}
</style>
@endpush

@push('scripts')
<script>
// Form interaction functions
function copyAllForms() {
    const formExamples = `
// Basic Form Group
<div class="form-group">
    <label class="form-label">Label Text *</label>
    <input type="text" class="form-input" required>
    <div class="form-help">Helper text</div>
</div>

// Form Grid Layout
<div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
    <div class="form-group">
        <label class="form-label">Field 1</label>
        <input type="text" class="form-input">
    </div>
    <div class="form-group">
        <label class="form-label">Field 2</label>
        <select class="form-select">
            <option>Option 1</option>
        </select>
    </div>
</div>

// Validation States
<input type="text" class="form-input form-input-error">
<div class="form-error">Error message</div>

// Custom Toggle Switch
<div class="toggle-switch" onclick="toggleSwitch(this)">
    <div class="toggle-slider"></div>
</div>
`;
    
    if (window.ManuCore) {
        ManuCore.showToast('Form examples copied to console! Check browser console for full code.', 'success');
    }
    
    console.log('Form Component Examples:');
    console.log(formExamples);
}

// Toggle Switch Function
function toggleSwitch(element) {
    element.classList.toggle('active');
}

// Range Slider
document.getElementById('range-slider').addEventListener('input', function(e) {
    document.getElementById('range-value').textContent = e.target.value;
});

// Tag Input Functions
function addTag(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        const value = event.target.value.trim();
        if (value) {
            const tag = document.createElement('span');
            tag.className = 'tag';
            tag.innerHTML = `${value} <button onclick="removeTag(this)">×</button>`;
            event.target.parentNode.insertBefore(tag, event.target);
            event.target.value = '';
        }
    }
}

function removeTag(button) {
    button.parentElement.remove();
}

// Form Validation
function resetValidation() {
    const form = document.getElementById('validation-form');
    form.reset();
    
    // Clear validation messages
    form.querySelectorAll('.validation-message').forEach(msg => {
        msg.textContent = '';
        msg.className = 'validation-message';
    });
    
    // Clear error states
    form.querySelectorAll('.form-input-error').forEach(input => {
        input.classList.remove('form-input-error');
    });
}

// Real-time validation
document.getElementById('validation-form').addEventListener('input', function(e) {
    const field = e.target;
    const messageEl = field.parentNode.querySelector('.validation-message');
    
    // Clear previous state
    field.classList.remove('form-input-error');
    messageEl.className = 'validation-message';
    messageEl.textContent = '';
    
    // Validate based on field type
    let isValid = true;
    let message = '';
    
    if (field.name === 'email') {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (field.value && !emailPattern.test(field.value)) {
            isValid = false;
            message = 'Please enter a valid email address';
        } else if (field.value) {
            message = '✓ Email format is valid';
            messageEl.className = 'validation-message success';
        }
    }
    
    if (field.name === 'password') {
        if (field.value.length > 0 && field.value.length < 8) {
            isValid = false;
            message = 'Password must be at least 8 characters';
        } else if (field.value.length >= 8) {
            message = '✓ Password length is valid';
            messageEl.className = 'validation-message success';
        }
    }
    
    if (field.name === 'confirm_password') {
        const password = document.querySelector('input[name="password"]').value;
        if (field.value && field.value !== password) {
            isValid = false;
            message = 'Passwords do not match';
        } else if (field.value && field.value === password) {
            message = '✓ Passwords match';
            messageEl.className = 'validation-message success';
        }
    }
    
    if (field.name === 'phone') {
        const phonePattern = /^[+][0-9]{2}\s[0-9]{2}\s[0-9]{3}\s[0-9]{4}$/;
        if (field.value && !phonePattern.test(field.value)) {
            isValid = false;
            message = 'Please use format: +27 11 123 4567';
        } else if (field.value) {
            message = '✓ Phone format is valid';
            messageEl.className = 'validation-message success';
        }
    }
    
    if (!isValid) {
        field.classList.add('form-input-error');
        messageEl.className = 'validation-message error';
    }
    
    messageEl.textContent = message;
});

// Form submission validation
document.getElementById('validation-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    let isValid = true;
    
    // Check all required fields
    this.querySelectorAll('[required]').forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('form-input-error');
            const messageEl = field.parentNode.querySelector('.validation-message');
            messageEl.className = 'validation-message error';
            messageEl.textContent = 'This field is required';
        }
    });
    
    if (isValid) {
        if (window.ManuCore) {
            ManuCore.showToast('Form validation passed!', 'success');
        }
        console.log('Form data:', Object.fromEntries(formData));
    } else {
        if (window.ManuCore) {
            ManuCore.showToast('Please fix validation errors', 'error');
        }
    }
});

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

// Initialize form functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('📋 Form Examples loaded');
    
    // Initialize any additional form components
    if (window.ManuCore) {
        ManuCore.initTooltips();
    }
});
</script>
@endpush