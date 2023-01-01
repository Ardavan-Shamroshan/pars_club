<!--Footer Start-->
<footer>
    <div class="container">
        <div class="footer-social">
            <ul class="d-flex flex-wrap">
                <li>
                    <a href="#">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-google"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-nav-menu mt-4">
            <ul class="d-flex flex-wrap">
                <li>
                    <a href="#">
                        <span>صفحه اصلی</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>جامعه</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>اقتصاد</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>بین الملل</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>سیاست</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>علم و پیشرفت</span>
                    </a>
                </li>
            </ul>
        </div>
        <hr>
      @include('home::layouts.copyright', ['copyright' => $setting->copyright])
    </div>
</footer>
<!--Footer End-->