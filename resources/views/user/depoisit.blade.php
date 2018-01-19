@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="row depoisit">
                <div class="depoisit-header">
                    <div class="btc-icon"><i class="fa fa-btc fa-2x"></i></div>
                    <div class="title"><h5>@lang('label.depoisit')</h5></div>
                </div>
                <div class="line">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="type-depoisit">
                    <div class="viettel">
                        <div class="logo-viettel">
                            <img src="{{ asset(config('setting.images_path') . 'logo_viettel.png') }}" alt="viettel">
                        </div>
                    </div>
                    <div class="atm">
                        <div class="logo-atm">
                            <img src="{{ asset(config('setting.images_path') . 'logo_atm.png') }}" alt="atm">
                        </div>
                    </div>
                    <div class="vinaphone"></div>
                </div>
            </div>
            <div class="row">
                <div class="row col-md-6">
                    <div class="table-cost">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('label.cost')</th>
                                    <th>@lang('label.coin')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $table_price as $item)
                                    <tr>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->coins_receive }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-depoisit">
                        <div class="title-support-dep"><li>@lang('label.fill_info_the_card')</li></div>
                        <div class="form">
                            {{ Form::open(['route' => 'login', 'method' => 'POST']) }}
                                <div>
                                    {{ Form::label('seri', trans('label.serial_number')) }}
                                    {{ Form::text('seri', null, ['class' => 'form-control input-sm']) }}
                                </div>
                                <div>
                                    {{ Form::label('email', trans('label.pin')) }}
                                    {{ Form::text('pin', null, ['class' => 'form-control input-sm']) }}
                                </div>
                                
                                {{ Form::submit(trans('label.depoisit'), ['class' => 'btn btn-primary btn-block']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
