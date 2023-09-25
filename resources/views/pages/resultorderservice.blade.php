@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')
<!-- Begin Page Content -->

<main id="main">
    <section><br><br><br>
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
                                                                <h2>Hasil Foto <span class="il">Order Id : </span> #{{ $order->id }}</h2>
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
                                                                                    <!-- <h2 style="color:#7a6429;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                        <span class="il">Hasil Foto : </span>
                                                                                    </h2> -->
                                                                                    <h5>Silahkan Cek pada URL berikut : <a href="{{ $order->result_drive }}" target="_blank">{{ $order->result_drive }}</a></h5><br>
                                                                                    
                                                                                    <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                                                        <div class="form-group">
                                                                                            @foreach ($itemResultImages as $img)
                                                                                            <a href="{{ asset('uploads-images/results/').'/'.$img->images }}" download><img src="{{ asset('uploads-images/results/').'/'.$img->images }}" alt="Upload Foto #{{ $order->id }}" width="480"></a>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div> -->
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
    </section>
</main>
@endsection