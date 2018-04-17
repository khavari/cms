@if($images->count())
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="partial-downloads mb-3">
                <h6 class="caption"><i class="fa fa-file-o"></i>&nbsp;&nbsp;@lang('web.download')</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td>{{ $image->alt }}</td>
                                <td><i class="fa fa-image"></i></td>
                                <td class="ltr">1.3 Mb</td>
                                <td>
                                    <a href="" class="download"><i class="fa fa-download"></i> @lang('web.download')</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
