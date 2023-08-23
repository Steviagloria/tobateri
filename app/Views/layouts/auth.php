<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <?= $this->include('components/headlink'); ?>
</head>

<body class="hold-transition login-page">

    <?= $this->renderSection('authContent');?>

</body>
</html>