<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Links CSS -->
    <?= $this->include('components/headlink'); ?>
    <style>
        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Splashscreen -->

        <!-- Navbar -->
        <?= $this->include('components/navbar'); ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?= $this->include('components/brand-logo'); ?>
            <?= $this->include('components/sidebar'); ?>
        </aside>

        <!-- Content Wrapper: berisikan konten utama -->
        <div class="content-wrapper">

            <!-- Header Content -->
            <?= $this->include('components/content-header'); ?>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </section>
            <!-- / Main Content -->

        </div>

        <?= $this->include('components/footer'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <!-- / Control Sidebar -->

    </div>
    <!-- / Content Wraper -->

    <?= $this->include('components/footscript'); ?>

</body>

</html>