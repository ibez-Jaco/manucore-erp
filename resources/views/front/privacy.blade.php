{{-- resources/views/front/privacy.blade.php --}}
@extends('layouts.front')
@section('title', 'Privacy Policy - ManuCore ERP')

@section('content')
  <section class="text-white hero-gradient">
    <div class="max-w-4xl px-4 py-16 mx-auto text-center sm:px-6 lg:px-8">
      <h1 class="mb-4 text-4xl font-bold md:text-5xl">Privacy Policy</h1>
      <p class="text-lg text-purple-100">Effective Date: {{ date('F j, Y') }}</p>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="max-w-4xl px-4 mx-auto space-y-10 sm:px-6 lg:px-8">
      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">1. Introduction</h2>
        <p class="text-gray-700">
          This Privacy Policy explains how ManuCore ERP (“we,” “us,” “our”) collects, uses,  
          and safeguards information when you use our Service.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">2. Information We Collect</h2>
        <ul class="ml-6 space-y-2 text-gray-700 list-disc">
          <li><strong>Personal Information:</strong> Name, email, phone, billing details.</li>
          <li><strong>Usage Data:</strong> Log files, IP address, browser type, pages visited.</li>
          <li><strong>Cookies:</strong> To improve functionality and track preferences.</li>
        </ul>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">3. How We Use Information</h2>
        <ul class="ml-6 space-y-2 text-gray-700 list-disc">
          <li>Provide and maintain the Service.</li>
          <li>Communicate updates, invoices, and support notices.</li>
          <li>Analyze trends and improve functionality.</li>
          <li>Comply with legal obligations.</li>
        </ul>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">4. Data Sharing</h2>
        <p class="text-gray-700">
          We do not sell your data. We may share with trusted providers (hosting, payment, email)  
          under strict confidentiality agreements, or when required by law.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">5. Security</h2>
        <p class="text-gray-700">
          We implement industry-standard measures (encryption, firewalls, access controls)  
          to protect your information. However, no system is 100% secure.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">6. Data Retention</h2>
        <p class="text-gray-700">
          We retain information as long as necessary to deliver the Service and comply with obligations.  
          You may request deletion at any time by contacting support.
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">7. Your Rights</h2>
        <ul class="ml-6 space-y-2 text-gray-700 list-disc">
          <li>Access, update, or delete your information.</li>
          <li>Withdraw consent for marketing communications.</li>
          <li>Request a copy of your stored personal data.</li>
        </ul>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">8. Changes to This Policy</h2>
        <p class="text-gray-700">
          We may update this Privacy Policy from time to time.  
          Changes will be posted on this page with an updated “Effective Date.”
        </p>
      </div>

      <div class="p-8 erp-card">
        <h2 class="mb-4 text-2xl font-semibold">9. Contact Us</h2>
        <p class="text-gray-700">
          If you have questions or concerns, please <a href="{{ route('contact') }}" class="text-purple-600 hover:underline">contact us</a>.
        </p>
      </div>
    </div>
  </section>
@endsection
