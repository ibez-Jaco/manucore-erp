@if(session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (!window.Swal) return;
            @if(session('success'))
                Swal.fire({ toast:true, position:'top-end', icon:'success', title:@js(session('success')), showConfirmButton:false, timer:3000 });
            @endif
            @if(session('error'))
                Swal.fire({ toast:true, position:'top-end', icon:'error', title:@js(session('error')), showConfirmButton:false, timer:4000 });
            @endif
        });
    </script>
@endif
