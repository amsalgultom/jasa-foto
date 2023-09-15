@extends('layouts.app')
@section('title', 'ART SPACE - Detail Order')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div width="100%">
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#fff;border:1px solid #dedede;border-radius:3px" bgcolor="#fff">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">

                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#7a6429;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0" bgcolor="#7a6429">
                                            <tbody>
                                                <tr>
                                                    <td class="p-4">
                                                        <h2>Upload Foto <span class="il">Order Id : </span> #{{ $order->id }}</h2>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_7158390659536495837template_body">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" id="m_7158390659536495837body_content" style="background-color:#fff" bgcolor="#fff">
                                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding:48px 48px 0px">
                                                                        <div id="m_7158390659536495837body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" align="left">
                                                                            <h2 style="color:#7a6429;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                <span class="il">Upload Foto URL Drive: </span>
                                                                            </h2>
                                                                            <!-- <form action="{{ route('orderupload.store') }}" method="POST" enctype="multipart/form-data"> -->
                                                                            <form action="{{ route('orderupload.store_drive') }}" method="POST">
                                                                                @csrf

                                                                                <div class="row">
                                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                        <div class="form-group">
                                                                                            <!-- <input type="file" name="images[]" class="form-control" multiple placeholder="Upload Foto"> -->
                                                                                            <input type="text" name="url_drive" class="form-control" placeholder="https://drive.google.com/drive/folders/...." value="{{ $order->result_drive }}">
                                                                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                        <div class="form-group">
                                                                                            @foreach ($itemResultImages as $img)
                                                                                            <a href="{{ asset('uploads-images/results/').'/'.$img->images }} "download><img src="{{ asset('uploads-images/results/').'/'.$img->images }}" alt="Upload Foto #{{ $order->id }}" width="100"></a>
                                                                                            
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div> -->
                                                                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                                    </div>
                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection