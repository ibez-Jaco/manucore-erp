{{-- resources/views/front/terms.blade.php --}}
@extends('layouts.front')
@section('title', 'Terms of Service - ManuCore ERP')

@section('content')
  <section class="text-white hero-gradient">
    <div class="max-w-4xl px-4 py-16 mx-auto text-center sm:px-6 lg:px-8">
      <h1 class="mb-4 text-4xl font-bold md:text-5xl">Terms of Service</h1>
      <p class="text-lg text-purple-100">Effective Date: {{ date('F j, Y') }}</p>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="max-w-4xl px-4 mx-auto space-y-10 sm:px-6 lg:px-8">
      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">1. Acceptance of Terms</h2>
        <p class="text-gray-700">
          By accessing or using ManuCore ERP (“Service”), you agree to be bound by these Terms of Service.  
          If you do not agree, you may not use the Service.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">2. Eligibility</h2>
        <p class="text-gray-700">
          You must be at least 18 years old, or the age of majority in your jurisdiction, to use the Service.  
          By using the Service, you represent and warrant that you meet these requirements.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">3. Account Responsibilities</h2>
        <p class="mb-3 text-gray-700">
          You are responsible for maintaining the confidentiality of your account and password,  
          and for all activities under your account. Notify us immediately of any unauthorized use.
        </p>
        <ul class="ml-6 space-y-2 text-gray-700 list-disc">
          <li>Provide accurate, complete information when registering.</li>
          <li>Keep credentials secure and confidential.</li>
          <li>Accept liability for actions taken under your account.</li>
        </ul>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">4. Use of Service</h2>
        <p class="text-gray-700">You agree not to:</p>
        <ul class="mt-2 ml-6 space-y-2 text-gray-700 list-disc">
          <li>Use the Service for unlawful purposes.</li>
          <li>Attempt to access systems without authorization.</li>
          <li>Disrupt or interfere with the Service’s integrity.</li>
        </ul>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">5. Payment & Billing</h2>
        <p class="text-gray-700">
          Fees for paid plans are billed monthly or annually in advance.  
          All payments are non-refundable unless otherwise stated in writing.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">6. Intellectual Property</h2>
        <p class="text-gray-700">
          ManuCore ERP retains all rights, title, and interest in and to the Service,  
          including software, logos, and content. This agreement does not grant you ownership.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">7. Termination</h2>
        <p class="text-gray-700">
          We may suspend or terminate your account if you violate these Terms.  
          Upon termination, your right to use the Service ends immediately.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">8. Limitation of Liability</h2>
        <p class="text-gray-700">
          ManuCore ERP is provided “as is.” To the fullest extent permitted by law,  
          we disclaim liability for indirect or consequential damages.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">9. Governing Law</h2>
        <p class="text-gray-700">
          These Terms are governed by the laws of South Africa, without regard to conflicts of law principles.  
          Disputes will be resolved in the courts of Johannesburg.
        </p>
      </div>
    </div>
  </section>
@endsection
