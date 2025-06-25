@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between" style="margin-bottom: 10px;">
                        <div>
                            <h5 class="mb-0">{{ __('All Users') }}</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#createUserModal">{{ __('+&nbsp; New User') }}</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center data-tables mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('ID') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Nama Lengkap') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Email') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('role') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Creation Date') }}
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                    </td>
                                    @php
                                        $badgeColor = $user->role == 'admin' ? 'bg-gradient-dark' : 'bg-gradient-info';
                                    @endphp
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm {{ $badgeColor }} text-xs font-weight-bold mb-0">
                                            {{ $user->role ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at->format('d/m/y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="modal" data-bs-target="#changePasswordModal{{ $user->id }}" title="Change Password">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" style="background:none; border:none;" data-bs-toggle="tooltip" title="Hapus Data">
                                                <i class="fas fa-trash text-secondary"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('users.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="createUserModalLabel">{{ __('Add New User') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="role" class="form-label">{{ __('Role') }}</label>
                                                <select name="role" class="form-select" required>
                                                <option value="">{{ __('-- Select Role --') }}</option>
                                                <option value="admin">{{ __('Admin') }}</option>
                                                <option value="user">{{ __('User') }}</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                                <input type="password" name="password" class="form-control" required minlength="6">
                                            </div>

                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                                <input type="password" name="password_confirmation" class="form-control" required minlength="6">
                                            </div>
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                            <button type="submit" class="btn btn-primary">{{ __('Create User') }}</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="changePasswordModal{{ $user->id }}" tabindex="-1" aria-labelledby="changePasswordModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('users.change-password', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Change Password - {{ $user->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                                <input type="password" name="password" class="form-control" required minlength="6">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                                <input type="password" name="password_confirmation" class="form-control" required minlength="6">
                                            </div>
                                            </div>

                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                            <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
