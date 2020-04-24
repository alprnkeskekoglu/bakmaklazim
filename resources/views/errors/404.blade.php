@extends('layouts.app')


@section('title') Sayfa Bulunamadı! | {!! env('APP_NAME') !!} @endsection

@section('content')
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="text-center">
                        <div class="error_txt">Sayfa Bulunamadı!</div>
                        <h5> ¯\_(ツ)_/¯</h5>
                        <p class="sub_error_txt mb-2 mb-sm-4">Aradığınız sayfa silinmiş ve ya hiç var olmamış
                            olabilir.</p>
                        <div class="search_form pb-3 pb-sm-4">

                            <form action="{{ route('search') }}" method="get">
                                <input type="text" placeholder="Arama" class="form-control" name="q">
                                <button type="submit" class="btn icon_search"><i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
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
    }

    .sub_error_txt {
        animation: animated-text 1s steps(50) 1s 1 normal both, animated-cursor 600ms steps(50) infinite;
    }

    @keyframes animated-text {
        from {
            width: 0;
        }
        to {
            width: 539px;
        }
    }

    @keyframes animated-cursor {
        from {
            border-right-color: #fff;
        }
        to {
            border-right-color: transparent;
        }
    }

    @media only screen and (max-width: 1024px) {
        .sub_error_txt {
            font-size: 16px;
            margin-left: 10px;
        }

        @keyframes animated-text {
            from {
                width: 0;
            }
            to {
                width: 430px;
            }
        }
    }

    @media only screen and (max-width: 768px) {
        .sub_error_txt {
            font-size: 18px;
            margin-left: 45px;
        }

        @keyframes animated-text {
            from {
                width: 0;
            }
            to {
                width: 485px;
            }
        }
    }

    @media only screen and (max-width: 480px) {
        .sub_error_txt {
            font-size: 12px;
            margin-left: 10px;
        }

        @keyframes animated-text {
            from {
                width: 0;
            }
            to {
                width: 324px;
            }
        }
    }

</style>
