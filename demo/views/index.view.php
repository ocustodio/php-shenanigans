<?php require "partials/head.php";?>
<?php require "partials/nav.php"; ?>
<?php require "partials/banner.php";?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>! Welcome to the
            Home
            Page!</h1>
    </div>
</main>

<?php require "partials/foot.php"; ?>
