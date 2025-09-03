@if(session('success') || session('error') || session('warning'))
<script>
    document.addEventListener("DOMContentLoaded", () => {
        if (!window.Swal) return;
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: @json(session('success')),
            confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-1') || '#2171B5'
        });
        @endif
        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: @json(session('error')),
            confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-1') || '#2171B5'
        });
        @endif
        @if(session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: @json(session('warning')),
            confirmButtonColor: getComputedStyle(document.documentElement).getPropertyValue('--primary-1') || '#2171B5'
        });
        @endif
    });
</script>
@endif
