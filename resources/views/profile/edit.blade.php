@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Address') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('address') }}" value="{{ old('address', auth()->user()->address) }}" required="true" aria-required="true"/>
                      @if ($errors->has('address'))
                        <span id="address-error" class="error text-danger" for="input-address">{{ $errors->first('address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">

        <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('My Accounts') }}</h4>
                <p class="card-category">{{ __('Account information') }}</p>
              </div>
              <div class="card-body ">
               @if(count($accounts) == 0)
                  <h4 class="text-center">
                    You do not have any bank account linked. Click <a class="btn btn-primary" data-toggle="modal" data-target="#modelId">
    Here
  </a> to add account.
                  </h4>
               @else
               <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <th>
                    Account Number
                  </th>
                  <th>
                    Routing Number
                  </th>
                  <th>
                    Balance
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Change Status
                  </th>
                </thead>
                <tbody>
                  @for ($i=0; $i<count($accounts); $i++)
                    <tr>
                      <td>
                        {{ $accounts[$i]->accountNumber }}
                      </td>
                      <td>
                        {{ $accounts[$i]->routingNumber }}
                      </td>
                      <td>
                        {{ $accounts[$i]->balance }}
                      </td>
                      <td>
                        {{ ($accounts[$i]->status == 0)?'Not Active':'Active' }}
                      </td>
                      <td>
                        {{ Form::open(array('url' => 'changeAccountStatus')) }}
                        {{ Form::token() }}
                          <input type="hidden" value="{{ $accounts[$i]->accountNumber }}" name="accountNumber" />
                          <button type="submit" class="btn btn-primary">Make Primary</button>
                        {{ Form::close() }}
                      </td>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
          <p class="text-center">
          Click <a style="color:#9932B1" class="" data-toggle="modal" data-target="#modelId">
    Here
  </a> to add account.
  </p>
               @endif

              </div>
            </div>

      </div>
    </div>
  </div>
  <!-- Button trigger modal -->
  
  
  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {{ Form::open(array('url' => 'addBankAccount')) }}
        {{ Form::token() }}

        <div class="modal-header">
          <h5 class="modal-title">Add Bank Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Account Number</label>
            <input type="text" name="account" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="">Routing Number</label>
            <input type="text" name="routing" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add account</button>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection