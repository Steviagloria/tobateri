<?= $this->extend('layouts/auth'); ?>
<?= $this->section('authContent'); ?>

<div class="login-box">

    <div class="card card-outline card-primary">
        <div class="mt-2 text-center">
            <img src="<?= base_url('dist/img/logo.png'); ?>" width="96" alt="">
        </div>
        <div class="card-body">
            <form method="POST" id="form_login">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email_admin" id="email_admin" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_admin" id="password_admin" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="button" id="btn_login" class="btn btn-primary btn-block">Login</button>
                    </div>

                </div>
            </form>
            </p>
        </div>
    </div>
</div>

<script>
    $(function() {

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        var btnClick = $('#btn_login');

        btnClick.click(function() {

            // console.log("BTNLOGIN CLICKED");

            const formData = new FormData(document.getElementById('form_login'));

            $.ajax({
                url: "<?= base_url('api/v1/auth/login'); ?>",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                success: function(res) {
                    // console.log(res);
                    let iconMsg;
                    switch (res.status) {
                        case 200:
                            btnClick.attr('disabled', 'disabled');
                            iconMsg = 'success';
                            setTimeout(() => {
                                window.location.replace('<?= base_url(); ?>');
                            }, 2000);
                            break;
                        case 404:
                            iconMsg = 'error';
                            break;
                        case 501:
                            iconMsg = 'warning';
                            break;
                        default:
                            break;
                    }
                    Toast.fire({
                        icon: iconMsg,
                        title: res.message
                    });
                }
            });
        });

    });
</script>

<?= $this->endSection(); ?>