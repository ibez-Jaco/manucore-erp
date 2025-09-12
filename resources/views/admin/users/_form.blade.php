@php
    $editing = isset($user);
    $activeVal = (int) old('is_active', $editing ? (int) ($user->is_active ?? 1) : 1);
@endphp

<div class="space-y-6">
    {{-- User Details --}}
    <div class="card card-subtle">
        <div class="card-header">
            <div class="gap-2 d-flex align-center">
                <div class="inline-flex items-center justify-center w-8 h-8 rounded-2xl" style="background: var(--brand-100); color: var(--brand-700);">
                    <x-lucide-user class="w-4 h-4" />
                </div>
                <h3 class="card-title">User Details</h3>
            </div>
            <p class="card-subtitle">Primary identity fields used for sign-in and display</p>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-input" required>
                    <div class="form-help">Used for login and notifications</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Security --}}
    <div class="card card-subtle">
        <div class="card-header">
            <div class="gap-2 d-flex align-center">
                <div class="inline-flex items-center justify-center w-8 h-8 rounded-2xl" style="background: var(--brand-100); color: var(--brand-700);">
                    <x-lucide-lock class="w-4 h-4" />
                </div>
                <h3 class="card-title">Security</h3>
            </div>
            <p class="card-subtitle">{{ $editing ? 'Set a new password (optional)' : 'Choose a strong password' }}</p>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div x-data="{ show: false }">
                    <label class="form-label">{{ $editing ? 'New Password' : 'Password' }} {{ $editing ? '(optional)' : '*' }}</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password" class="form-input" @if(!$editing) required @endif autocomplete="new-password">
                        <button type="button" class="absolute -translate-y-1/2 btn btn-ghost btn-sm right-2 top-1/2"
                                @click="show = !show" aria-label="Toggle password">
                            <span x-show="!show"><x-lucide-eye class="w-4 h-4" /></span>
                            <span x-show="show" x-cloak><x-lucide-eye-off class="w-4 h-4" /></span>
                        </button>
                    </div>
                    @if($editing)<div class="form-help">Leave blank to keep the current password</div>@endif
                </div>

                <div x-data="{ show: false }">
                    <label class="form-label">Confirm {{ $editing ? 'New ' : '' }}Password {{ $editing ? '(optional)' : '*' }}</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password_confirmation" class="form-input" @if(!$editing) required @endif autocomplete="new-password">
                        <button type="button" class="absolute -translate-y-1/2 btn btn-ghost btn-sm right-2 top-1/2"
                                @click="show = !show" aria-label="Toggle password confirm">
                            <span x-show="!show"><x-lucide-eye class="w-4 h-4" /></span>
                            <span x-show="show" x-cloak><x-lucide-eye-off class="w-4 h-4" /></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Access & Roles --}}
    <div class="card card-subtle">
        <div class="card-header">
            <div class="gap-2 d-flex align-center">
                <div class="inline-flex items-center justify-center w-8 h-8 rounded-2xl" style="background: var(--brand-100); color: var(--brand-700);">
                    <x-lucide-shield-check class="w-4 h-4" />
                </div>
                <h3 class="card-title">Access & Roles</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="form-label">Status</label>
                    <div class="gap-2 d-flex">
                        <label class="btn {{ $activeVal===1 ? 'btn-primary' : 'btn-ghost' }} btn-sm">
                            <input type="radio" name="is_active" value="1" class="hidden" @checked($activeVal===1)>
                            Active
                        </label>
                        <label class="btn {{ $activeVal===0 ? 'btn-warning' : 'btn-ghost' }} btn-sm">
                            <input type="radio" name="is_active" value="0" class="hidden" @checked($activeVal===0)>
                            Disabled
                        </label>
                    </div>
                    <div class="form-help">Disabled users cannot sign in</div>
                </div>

                <div>
                    <label class="form-label">Roles</label>
                    <select name="roles[]" class="form-select" multiple size="5">
                        @foreach(($roles ?? []) as $roleName)
                            <option value="{{ $roleName }}" @selected(in_array($roleName, old('roles', $userRoles ?? []), true))>{{ $roleName }}</option>
                        @endforeach
                    </select>
                    <div class="form-help">Hold Ctrl/Cmd to select multiple</div>
                </div>
            </div>

            @unless($editing)
                <div class="mt-4">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="send_verification" value="1" class="checkbox" {{ old('send_verification', '1') ? 'checked' : '' }}>
                        <span>Send verification email</span>
                    </label>
                    <div class="form-help">We’ll email a verification link to complete signup</div>
                </div>
            @endunless
        </div>
    </div>

    {{-- Actions --}}
    <div class="gap-2 d-flex">
        <button class="btn btn-primary">{{ $editing ? 'Update User' : 'Create User' }}</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
