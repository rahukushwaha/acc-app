        <!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- JQUERY JS -->
		<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<!-- INPUT MASK JS-->
		<script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
        <!-- SIDE-MENU JS -->
		<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>
		<!-- SIDEBAR JS -->
		<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
		<!-- Perfect SCROLLBAR JS-->
		<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
		<script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>
		<!-- CUSTOM JS-->
		<script src="{{ asset('assets/js/custom.js') }}"></script>
		<!-- Switcher js -->
		<script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>
        <!-- SELECT2 JS -->
		<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

        <!-- INTERNAL Notifications js -->
		<script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>

        <!-- JQUERY VALIDATION JS -->
        <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
        <!-- JQUERY loadingoverlay JS -->
        <script src="{{ asset('assets/js/loading-overlay/loadingoverlay2.1.7.min.js') }}"></script>
        <script>
            function successNotify(message){
                notif({
                    msg: message,
                    type: "success",
                    position: "right",
                    opacity: 0.8
                });
            }
            function dangerNotify(message){
                notif({
                    msg: message,
                    type: "error",
                    position: "right",
                    opacity: 0.8
                });
            }
            function warningNotify(message){
                notif({
                    type: "warning",
                    msg: message,
                    position: "right",
                    opacity: 0.8
                });
            }
            function infoNotify(message){
                notif({
                    type: "info",
                    msg: message,
                    //width: "all",
                    //height: 70,
                    position: "right",
                    opacity: 0.8
                });
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.select2').select2({
                selectOnClose: true,
            });
        </script>
        @stack('js')
