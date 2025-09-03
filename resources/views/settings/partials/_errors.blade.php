@if ($errors->any())
    <div class="mb-4 erp-alert-danger">
        <div class="mb-1 font-medium">Please fix the following:</div>
        <ul class="ml-6 text-sm list-disc">
            @foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
@endif
