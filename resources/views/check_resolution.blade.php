<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Resolusi Layar</title>
</head>
<body>
    <script>
        function checkScreenSize() {
            let width = window.innerWidth;

            // Cek apakah sebelumnya sudah redirect
            let lastWidth = sessionStorage.getItem('last_screen_width');

            if (lastWidth != width) { 
                sessionStorage.setItem('last_screen_width', width); // Simpan nilai baru

                if (width >= 720) {
                    window.location.href = "{{ route('home') }}"; 
                } else {
                    window.location.href = "{{ route('resolution-warning') }}";
                }
            }
        }

        checkScreenSize();
        window.onresize = checkScreenSize;
    </script>
</body>
</html>
