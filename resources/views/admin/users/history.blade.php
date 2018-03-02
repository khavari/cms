@extends('admin.layouts.master')

{{-------------------- Page Title --------------------}}
@section('title', 'جزئیات اطلاعات کاربری')

{{-------------------- Add Style File --------------------}}
@section('style')
@endsection

{{-------------------- Main Content --------------------}}
@section('content')

    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;داشبورد</a></li>
            <li><a href="{{route('admin.users.index')}}">لیست کاربران</a></li>
            <li><a href="javascript:void(0)">سوابق ورود کاربر </a></li>
        </ol>
    </section>

    <section class="content">
        @include('admin.layouts.messages')

        @if($logins->count())
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">سوابق ورود کاربر به سایت</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered">
                                <tr>
                                    <th>شناسه</th>
                                    <th>نام</th>
                                    <th class="hidden-xs">نام کاربری</th>
                                    <th class="hidden-xs">شماره تماس</th>
                                    <th>آی پی</th>
                                    <th>زمان ورود</th>
                                    <th>جزئیات</th>
                                </tr>
                                @foreach($logins as $login)
                                    <tr>
                                        <td>{{$login->user->id}}</td>
                                        <td>{{$login->user->name}}</td>
                                        <td class="hidden-xs">{{$login->user->username}}</td>
                                        <td class="hidden-xs">{{$login->user->mobile}}</td>
                                        <td>{{$login->ip}}</td>
                                        <td>{{ jdate($login->created_at)->format('datetime') }}</td>
                                        <td><a href="{{route('admin.users.show', ['id' => $login->user->id])}}" class="btn btn-xs btn-info btn-action">جزئیات</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            {{$logins->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
{{-------------------- Add Script File --------------------}}
@section('script')
@endsection