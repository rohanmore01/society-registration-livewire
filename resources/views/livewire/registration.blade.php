<div class="row mt-3">
    <div class="col-3"></div>
    <div class="col-6 border border-primary p-3">
        <h4 class="text-center border-bottom border-danger border-3 p-2 fw-bold">USER REGISTRATION FORM</h4>

        <form wire:submit="save">
            <div class="m-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                <div class="col-md-7">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}"  wire:model="name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="m-3 row">
                <label for="mobile_no" class="col-md-4 col-form-label text-md-end text-start">Mobile No</label>
                <div class="col-md-7">
                    <input type="number" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no"
                        name="mobile_no" value="{{ old('mobile_no') }}" wire:model="mobile_no">
                    @if ($errors->has('mobile_no'))
                        <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                    @endif
                </div>
            </div>
            <div class="m-3 row">
                <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                <div class="col-md-7">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" wire:model="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="m-3 row">
                <label for="district" class="col-md-4 col-form-label text-md-end text-start">Select District</label>
                <div class="col-md-7">
                    <select name="district" id="district" class="form-control @error('district') is-invalid @enderror" wire:model="district">
                        <option value=""></option>
                        @foreach ($districtsList as $district)
                            <option value="{{ $district }}">{{ $district }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('district'))
                        <span class="text-danger">{{ $errors->first('district') }}</span>
                    @endif
                </div>
            </div>
            <div class="m-3 row">
                <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                <div class="col-md-7">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" wire:model="password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="m-3 row">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm
                    Password</label>
                <div class="col-md-7">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" wire:model="password_confirmation">
                </div>
            </div>
            <div class="m-3 row" style="display:inline;">
                <button type="submit" class="col-md-2 offset-md-5 btn btn-outline-success" wire:loading.attr="disabled">Register
                    <i class="fa fa-spinner fa-spin" wire:loading></i>
                </button>
            </div>

            <p style="text-align: center;">Already Have an Account Please <a href="{{ url('/login') }}" wire:navigate>Login In</a>
            </p>
        </form>
    </div>
    <div class="col-3"></div>
</div>
