@extends('Lecturer.DefaultLayout.main')

@section('content')
    <!-- Modal Change Password -->
    <div class="overlay">
        <div class="modal modal-change-password">
            <!-- header modal -->
            <div class="modal__title">
                <h4>Đổi mật khẩu</h4>
                <svg class="modal__icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none">
                </svg>
            </div>
            <!-- body modal -->
            <div class="modal__body">
                <form method="post" action="{{ route('password.update') }}" class="form-change-password">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="update_password_current_password">Mật khẩu hiện tại</label>
                        <input type="text" class="form__input input-password" id="update_password_current_password"
                            name="current_password" autocomplete="current-password">

                    </div>
                    <x-input-error style="color: red; font-size: 13px" :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

                    <div class="form-group">
                        <label for="update_password_password">Mật khẩu mới</label>
                        <input type="password" name="password" class="form__input input-new-password"
                            id="update_password_password" autocomplete="new-password">
                    </div>
                    <x-input-error style="color: red; font-size: 13px" :messages="$errors->updatePassword->get('password')" class="mt-2" />

                    <div class="form-group">
                        <label for="update_password_password_confirmation">Xác nhận mật khẩu</label>
                        <input name="password_confirmation" type="password" autocomplete="new-password"
                            class="form__input input-confirm-password" id="update_password_password_confirmation">
                    </div>
                    <x-input-error style="color: red; font-size: 13px" :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

                    <!-- Footer modal -->
                    <div class="btn-action">
                        <button type="submit" class="btn modal__btn btn-save">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
