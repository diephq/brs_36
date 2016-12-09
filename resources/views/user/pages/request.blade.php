@extends('user.master')
@section('content')
<div class="freework">
    <div class="container1" >
        <h2 class="fleft">{{ trans('book_request.map') }}</h2>
        <h2 class="rq_h2">{{ trans('book_request.write_request') }}</h2>
        <div class="cclear"></div>
        <div class="row">
            <article class="col-sm-12 sm2">
                <figure class="map">
                    <iframe style="height: 300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1916.988351599994!2d108.21309848640844!3d16.06669867898974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142184a8d51d751%3A0xdbbd06648f589398!2sV%C4%A9nh+Trung+Plaza!5e0!3m2!1svi!2s!4v1480916588081"></iframe>
                </figure>
                <div class="cclear"></div>
                <section class="formBox" >
                    <div class="container">
                        <div class="row">
                            <article class="col-sm-4 sm4" >
                                <h2>{{ trans('book_request.find_us') }}</h2>
                                <div class="info">
                                    <p>{{ trans('book_request.myaddress') }}</p>
                                    <p><span>{{ trans('book_request.telephone') }}:</span>+1 959 603 6035</p>
                                    <p><span>FAX:</span>+1 504 889 9898</p>
                                    <p>E-mail: <a href="#">mail@demolink.org</a></p>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
            </article>
            <div class="list_request" >
                <article class="contactBox21">
                    <form id="contact-form1">
                        <textarea placeholder="{{ trans('book_request.write_here') }}..." class="re_area"></textarea>
                        <div class="btns">
                            <a href="#" data-type="submit" class="btn-default btn1">{{ trans('book_request.submit') }}</a>
                            <p>*{{ trans('book_request.required_fields') }}</p>
                        </div>
                    </form>
                </article>
                <div class="cclear"></div>
                <h2  class="rq1_h2">{{ trans('book_request.list_your_request') }}</h2>
                <div class="scrol" >
                    <table>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td> 1.</td>
                            <td>mua cuon </td>
                            <td> <a href="#" data-type="submit" class="btn-default btn1" >{{ trans('book_request.cancel') }}</a> </td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>cuon </td>
                            <td> <a href="#" data-type="submit" class="btn-default btn1">{{ trans('book_request.cancel') }}</a>  </td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>cuon s</td>
                            <td> <a href="#" data-type="submit" class="btn-default btn1">{{ trans('book_request.cancel') }}</a>  </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content1')
<div class="pgrequest timeacti">
    @include('user.blocks.time_follow')
</div>
@endsection