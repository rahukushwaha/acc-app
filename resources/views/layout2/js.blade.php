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
        <script>
            function successMsgAutoClose(msg) {
                $('body').removeClass('timer-alert');
                swal({
                    title: "",
                    text: msg,
                    timer: 2000
                })?.then(
                    function() {},
                    // handling the promise rejection
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            console.log('I was closed by the timer')
                        }
                    }
                )
            }
            function successMsg(msg) {
                $('body').removeClass('timer-alert');
                swal({ title: "", text: msg });
            }
            function warningMsgAutoClose(msg) {
                $('body').removeClass('timer-alert');
                swal({
                    title: "",
                    text: msg,
                    type: "warning",
                    timer: 2000
                })?.then(
                    function() {},
                    // handling the promise rejection
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            console.log('I was closed by the timer')
                        }
                    }
                )
            }
            function warningMsg(msg) {
                $('body').removeClass('timer-alert');
                swal({ title: "", text: msg, type: "warning", });
            }
            function dangerMsgAutoClose(msg) {
                $('body').removeClass('timer-alert');
                swal({
                    title: "",
                    text: msg,
                    type: "error",
                    timer: 2000
                })?.then(
                    function() {},
                    // handling the promise rejection
                    function(dismiss) {
                        if (dismiss === 'timer') {
                            console.log('I was closed by the timer')
                        }
                    }
                )
            }
            function dangerMsg(msg) {
                $('body').removeClass('timer-alert');
                swal({ title: "", text: msg, type: "error", });
            }
            $('.select2').select2({
                selectOnClose: true,
            });
        </script>
        @stack('js')
