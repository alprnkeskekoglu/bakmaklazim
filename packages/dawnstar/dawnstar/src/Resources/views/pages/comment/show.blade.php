@extends('Dawnstar::layouts.app')

@section('content')
    <main id="main-container">
        @include('Dawnstar::layouts.breadcrumb')
        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-content">
                    <table class="table table-hover table-vcenter">
                        <thead>
                        <tbody>
                        <tr>
                            <td class="font-w600 w-25">Status</td>
                            <td class="font-w600">{!! getStatusText($comment->status) !!}</td>
                        </tr>
                        <tr>
                            <td class="font-w600 w-25">User Ip</td>
                            <td class="font-w600">{!! $comment->user_ip !!}</td>
                        </tr>
                        <tr>
                            <td class="font-w600 w-25">User Agent</td>
                            <td class="font-w600">{!! $comment->user_agent !!}</td>
                        </tr>
                        <tr>
                            <td class="font-w600 w-25">User Name</td>
                            <td class="font-w600">{!! $comment->user_name !!}</td>
                        </tr>
                        <tr>
                            <td class="font-w600 w-25">User Email</td>
                            <td class="font-w600">{!! $comment->user_email !!}</td>
                        </tr>
                        <tr>
                            <td class="font-w600 w-25">Message</td>
                            <td class="font-w600">{!! $comment->detail !!}</td>
                        </tr>
                        <tr>
                            <td class="font-w600 w-25">Sent Date</td>
                            <td class="font-w600">{!! $comment->created_at !!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

