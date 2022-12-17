<aside class="col-sm-12 col-lg-4 col-xl-3 px-0 h-100">

    <div class="panel-box rounded">
        <div class="titles no-margin bg-light">
            <h4><i class="fa fa-list-alt"></i>مطالب داغ</h4>
        </div>
        <div class="filters px-3 my-3">
            <ul class="list-filter d-flex justify-content-start">
                <li class="bg-navy rounded-pill px-2 mx-1 active">
                    <small><a href="#">دیدگاه</a></small></li>
                <li class="bg-navy rounded-pill px-2 mx-1"><small><a href="#">بازدید</a></small>
                </li>
                <li class="bg-navy rounded-pill px-2 mx-1"><small><a href="#">لایک</a></small>
                </li>
            </ul>
        </div>
        <div class="info-panel py-1">
            <ul class="list-news">
                @forelse($hotPosts as $hot)
                    <li>
                        <small><i class="fa fa-circle"></i><a href="{{ route('post.show', $hot) }}">{{ $hot->title }}</a></small>
                    </li>
                @empty
                    <li class="text-muted"><small>درحال حاضر خبری برای نمایش وجود ندارد! @admin
                            <a href="{{ route('admin.post') }}" class="btn-link links links-footer text-primary">وارد کردن خبر</a> @endadmin
                        </small></li>
                @endforelse

            </ul>
        </div>
    </div>

    {{--                    <div class="panel-box rounded ">--}}
    {{--                        <div class="titles bg-light">--}}
    {{--                            <h4><i class="fa fa-calendar"></i>خاطرات</h4>--}}
    {{--                        </div>--}}
    {{--                        <ul class="list-diary">--}}
    {{--                            <li>--}}
    {{--                                <h6>گروه a<span>14 ژوئن 2018 - 18:00</span></h6>--}}
    {{--                                <ul class="club-logo">--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/rusia.png') }}" alt="">--}}
    {{--                                        <span>روسیه</span>--}}
    {{--                                    </li>--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/arabia.png') }}" alt="">--}}
    {{--                                        <span>عربستان </span>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <h6>گروه e<span>22 ژوئن 2018 - 15:00</span></h6>--}}
    {{--                                <ul class="club-logo">--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/bra.png') }}" alt="">--}}
    {{--                                        <span>برزیل</span>--}}
    {{--                                    </li>--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/costa-rica.png') }}" alt="">--}}
    {{--                                        <span>کاستاریکا</span>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <h6>گروه h<span>19 ژوئن 2018 - 15:00</span></h6>--}}
    {{--                                <ul class="club-logo">--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/colombia.png') }}" alt="">--}}
    {{--                                        <span>کلمبیا</span>--}}
    {{--                                    </li>--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/japan.png') }}" alt="">--}}
    {{--                                        <span>ژاپن</span>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <h6>گروه c<span>از 16 jun 2018 - 15:00</span></h6>--}}
    {{--                                <ul class="club-logo">--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/fra.png') }}" alt="">--}}
    {{--                                        <span>فرانسه</span>--}}
    {{--                                    </li>--}}
    {{--                                    <li>--}}
    {{--                                        <img src="{{ asset('modules/home/img/clubs-logos/aus.png') }}" alt="">--}}
    {{--                                        <span>استرالیا</span>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}

    <div class="panel-box rounded">
        <div class="titles no-margin bg-light">
            <h4><i class="fa fa-link"></i>تبلیغات</h4>
        </div>
        <div class="mt-1 text-center">
            <a rel="nofollow noopener" href="https://ck.yektanet.com/b/click?VERSION=2&amp;impression=Wwd%2FFjVXOF1M8KHKz%2F9RRr9iKOdJiUEakvVshn26Y3%2FVKmzb2ByttJLiebbBkGqHXN59G3xl2h%2BcwXS9glo3%2ByZaSu5YKayurR709%2FU3CfEixIwC%2Fg1piYyBnrRrvVdniWbue6Oo4aeEJaLMx%2FYtewa0AuUxXf%2F48%2B%2F0POzAC0aqvHTf1jebKMIsNr2BJAV2%2F95bNsaUJx8lnJ6eubIv2FYBywR20V%2FpW1gQMJdXYn2%2BICvfsmKhYN9UxcDreyT%2F%2FIGtWB%2Bk66FaelUkrfkXJmhoRRN4VtZ4OKUmhfozHpQ5ugFuIWCYqYShFTM8KKQa%2BRzqBjHO44lfxEoflw7179%2FF5OC9hZ1ZfqbxFAzVcDrNkEoNPFPQy%2FgfY5%2BlOaNInLV%2BKvb28DJ2rjPnrEghqap2advuH4CjtOVGFLP8bVzixV5wEPiujL2emLX6L4qUeHbWGO1LLq0HoUUpks22lBJumgkrN9AT8TLIf3x5Srw%3D%3AiPjgKyjEqwPPdIXiN8VlrR5dd%2BH%2BZ1XN20rkHMK20%2BLrdQyV2L2elvBp8pTYY2UDiE12eU8zmg49j5F4lsAeAb2QKQMl41YoWkZkGEcb46m5hgX1BKBhctZO1HgQvotHufp7WKxvFBGFzyXN%2FMV3TR3PfF0XhZHIrX9wi4jf27fnghHGbjycoh9o4aMegsZI4oQkUefvqiKGST1B79IWOLCeQfX91XbkQzgNfWtOm8Z6oe7JE4W5PeLvNW8cpPiIlsioZFpFBdwJe4qLJnHEmm%2FJm0QhJQyrjk9G4b46qr8VM9iDhSdj%2FH2Oni4jW0F26Jh0hwBHvE0t%2BLNIEWXpkA%3D%3D&amp;redirect=https%3A%2F%2Ffaradars.org%2Flanding%2Fdsh55&amp;ab&amp;vts=1671025976.688" target="_blank" style="position: relative;display: inline-block;">
                <div style="background-color:transparent;">
                    <img class="bnr-img yn-bnr__img" onload="ynBnrImgOnLoad(13727);" data-src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars300250_fc6fa3c5-49d8-4904-ac06-ce42d20210d0__1ex2gpGp3A.gif" alt="" src="https://ad-management-cdn.yektanet.com/media/banner_ads/faradars300250_fc6fa3c5-49d8-4904-ac06-ce42d20210d0__1ex2gpGp3A.gif">
                </div>
            </a>
        </div>

        {{--                        <div class="adbox w-100 p-1" data-id="454">--}}
        {{--                            <a style="display: block;" class="adlink vrz-lazy" target="_blank" href="https://biz.varzesh3.com/events/click/454" rel="nofollow">--}}
        {{--                                <img class="adimage" id="img-454" src="https://biz-cdn.varzesh3.com/banners/2022/11/19/bec6c0d3-6ee5-4593-818a-b97206dc292d.gif" data-origin="https://biz-cdn.varzesh3.com/banners/2022/11/19/bec6c0d3-6ee5-4593-818a-b97206dc292d.gif" width="300">--}}
        {{--                            </a>--}}
        {{--                        </div>--}}
    </div>
</aside>