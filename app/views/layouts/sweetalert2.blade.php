@if(isset($_SESSION['success']))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: '<?php echo $_SESSION['success']; ?>',
                showConfirmButton: false,
                timer: 4000
            }).then(function() {
                <?php unset($_SESSION['success']); ?>
            });
        });
    </script>
@elseif(isset($_SESSION['error']))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: '<?php echo $_SESSION['error']; ?>',
                showConfirmButton: false,
                timer: 4000
            }).then(function() {
                <?php unset($_SESSION['error']); ?>
            });
        });
    </script>
@endif
