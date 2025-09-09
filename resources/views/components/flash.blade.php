@php
    $types = ['success','error','warning','info'];
    $payload = null;
    foreach ($types as $t) {
        if (session()->has($t)) {
            $payload = ['type'=>$t, 'message'=>session($t)];
            break;
        }
    }
@endphp

@if ($payload)
    <script>
        (function () {
            // If SweetAlert2 hasn't loaded yet, retry shortly.
            function showToast() {
                if (!window.Swal || typeof Swal.fire !== 'function') {
                    return setTimeout(showToast, 100);
                }
                const type = @json($payload['type']);
                const message = @json($payload['message']);

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: type,
                    title: message,
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    background: '#fff',
                    customClass: {
                        popup: 'erp-fade-in'
                    }
                });
            }
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', showToast);
            } else {
                showToast();
            }
        })();
    </script>
@endif
