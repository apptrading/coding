<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="{{ route('home', ['lang' => session('langs')]) }}" class="logo d-flex align-items-center">
                    <span class="laos">ບໍ່ລິສັດ ດານິກາ ການຄ້າ ນຳເຂົ້າ-ສົ່ງອອກ ຈຳກັດຜູ້ດຽວ</span>
                </a>
                <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies
                    darta
                    donna mare fermentum iaculis eu non diam phasellus.</p>
                <div class="social-links d-flex mt-4">
                    <a href="#" class="twitter"><i class="fab fa-line"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="	fab fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4 class="laos">ເມນູ</h4>
                <ul class="laos ulfooter">
                    <li><a href="{{ route('home', ['lang' => session('langs')]) }}">ໜ້າຫຼັກ</a></li>
                    <li><a href="{{ route('tracking', ['lang' => session('langs')]) }}">ຕິດຕາມສີນຄ້າ</a></li>
                    <li><a href="{{ route('check-price', ['lang' => session('langs')]) }}">ຄຳນວນພັດສະດຸ</a></li>
                    <li><a
                            href="{{ route('condition', ['lang' => session('langs')]) }}">ຂໍ້ກຳໜົດແລະເງື່ອນໄຂການຂົນສົ່ງ</a>
                    </li>
                    <li><a href="{{ route('promotion', ['lang' => session('langs')]) }}">ໂປໂມຊັ້ນ</a></li>
                    <li><a href="{{ route('faq', ['lang' => session('langs')]) }}">ຄຳຖາມທີ່ພົບບ່ອຍ</a></li>
                    <li><a href="{{ route('contact', ['lang' => session('langs')]) }}">ຕິດຕໍ່</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4 class="laos">ບໍລີການຂອງເຮົາ</h4>
                <ul class="laos ulfooter">
                    <li><a href="#">ຮ້ານຂາຍເສື້ອຜ້າ</a></li>
                    <li>
                        <a href="{{ route('service.cod', ['lang' => session('langs')]) }}">ບໍລິການເກັບເງິນປາຍທາງ</a>
                    </li>
                    <li>
                        <a
                            href="{{ route('service.collection', ['lang' => session('langs')]) }}">ບໍລິການຮັບພັດສະດຸດ້ວຍຕົວເອງ</a>
                    </li>
                    <li>
                        <a
                            href="{{ route('service-three', ['lang' => session('langs')]) }}">ບໍລິການສົ່ງພັດສະດຸຮອດບ້ານທ່ານ</a>
                    </li>
                    <li>
                        <a href="{{ route('service.claim', ['lang' => session('langs')]) }}">ເຄມສີນຄ້າ</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4 class="laos">ຕິດຕໍ່ຫາພວກເຮົາ</h4>
                <p class="laos">
                    ບ້ານຄຳສະຫວາດ <br>
                    ເມືອງໄຊທານີ້<br>
                    ນະຄອນຫຼວງວຽງຈັນ <br><br>
                    <strong>Phone:</strong> (+856) 20 29 946 365<br>
                    <strong>Email:</strong> info@example.com<br>
                </p>

            </div>

        </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span role="button"
                    onclick="window.loaction.href='{{ route('home', ['lang' => session('langs')]) }}'">Danika
                    Trading Import &
                    Export</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://nsoftdev.com/">NSoftdev</a>
        </div>
    </div>

</footer><!-- End Footer -->
