@extends('layouts.app')


@section('title') Sayfa Bulunamadı! | {!! env('APP_NAME') !!} @endsection

@section('content')
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="text-center">
                        <div class="error_txt">Ciddi misin!</div>
                        <div class="h4 mb-4">
                            ( ͡❛ ͜ʖ ͡❛)✌
                        </div>
                        <p class="sub_error_txt mb-2 mb-sm-4">
                            Wordpress kullanıcağımı mı sandın...
                        </p>
                        <a href="{{ route('index') }}" class="btn btn-default">Anasayfa'ya Git</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>

    .sub_error_txt {
        font-size: 20px;
        color: #000;
        white-space: nowrap;
        border-right: solid 3px #fff;
        overflow: hidden;
        margin-left: 5px;
    }



    @media only screen and (max-width: 1024px) {
        .sub_error_txt {
            font-size: 16px;
            margin-left: 10px;
        }
    }

    @media only screen and (max-width: 768px) {
        .sub_error_txt {
            font-size: 18px;
            margin-left: 45px;
        }
    }

    @media only screen and (max-width: 480px) {
        .sub_error_txt {
            font-size: 12px;
            margin-left: 12px;
        }
    }

</style>
