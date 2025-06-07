@stack('scripts')

<script src="{{ asset('assets/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stickOnScroll.js') }}"></script>
<script src="{{ asset('assets/js/tinycolor-min.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/d3.min.js') }}"></script>
<script src="{{ asset('assets/js/topojson.min.js') }}"></script>
<script src="{{ asset('assets/js/datamaps.all.min.js') }}"></script>
<script src="{{ asset('assets/js/datamaps-zoomto.js') }}"></script>
<script src="{{ asset('assets/js/datamaps.custom.js') }}"></script>
<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/gauge.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.custom.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.timepicker.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/uppy.min.js') }}"></script>
<script src="{{ asset('assets/js/quill.min.js') }}"></script>

<script>
    $(document).ready(function () {

        // Mark notifications as read
        $(document).on('click', '.notificationsIcon', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('notifications.read') }}",
                type: 'get',
                success: function (response) {
                    $('#notificationIconCounter').load("#notificationIconCounter > *");
                    $('#notificationsIconModal').load("#notificationsIconModal > *");
                },
                error: function () {
                    alert('Error marking notifications as read.');
                }
            });
        });

        // Clear notifications
        $(document).on('click', '.clearNotifications', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('notifications.clear') }}",
                type: 'get',
                success: function (response) {
                    $('#notificationIconCounter').load("#notificationIconCounter > *");
                    $('#notificationsIconModal').load("#notificationsIconModal > *");
                },
                error: function () {
                    alert('Error clearing notifications.');
                }
            });
        });

    });
</script>
