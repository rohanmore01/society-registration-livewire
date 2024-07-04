<div class="row mt-3">
    <div class="col-3"></div>
    <div class="col-6 border border-primary p-3">
        <h4 class="text-center border-bottom border-danger border-3 p-2 fw-bold">LOGIN FORM</h4>

        <form wire:submit="checkLogin">
            <div class="m-3 row">
                <label for="email" class="col-md-3 col-form-label text-md-end text-start">Email Address</label>
                <div class="col-md-8">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" wire:model="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="m-3 row">
                <label for="password" class="col-md-3 col-form-label text-md-end text-start">Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" wire:model="password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            <div class="m-3 row">
                <label for="captcha" class="col-md-3 col-form-label text-md-end text-start">Captcha</label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-success btnCaptchaRefresh"><i
                                        class="fa fa-refresh"></i></button>
                            </div>
                        </div>
                        <div class="col">
                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha"
                                name="captcha" wire:model="captcha">
                        </div>
                    </div>
                    @if ($errors->has('captcha'))
                        <span class="text-danger">{{ $errors->first('captcha') }}</span>
                    @endif
                </div>
            </div>

            <div class="mb-3 row">
                    <button type="submit" class="col-md-2 offset-md-5 btn btn-outline-success" wire:loading.attr="disabled">Login
                        <i class="fa fa-spinner fa-spin" wire:loading></i>
                    </button>
            </div>
            <p style="text-align: center;">Forgot Password ? <a href="{{ url('/forget-password-form') }}" wire:navigate>Click Here</a>
            </p>
            <p style="text-align: center;">Don't Have an Account ? <a href="{{ url('/registration') }}" wire:navigate>Click Here</a>
                To Register</p>
        </form>
    </div>
    <div class="col-3"></div>
</div>
