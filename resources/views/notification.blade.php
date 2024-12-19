@if (session('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            $.notify({
                message: "{{ session('success') }}"
            }, {
                type: 'success',
                delay: 3000, // Auto close after 3 seconds
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: {
                    x: 20,
                    y: 70
                }
            });
        });
    </script>
@endif
