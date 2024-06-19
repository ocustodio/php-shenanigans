<?php require base_path("views/partials/head.php");?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php");?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="text-blue-500 hover:underline">
            <a href="/notes">
                go back.
            </a>
        </p>

        <p class="mt-6">
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <footer class="mt-6">
            <a class="text-grey-500 border border-current px-4 py-2"
               href="/note/edit?id=<?= $note['id'] ?>"> Edit </a>
        </footer>

    </div>
</main>

<?php require base_path("views/partials/foot.php"); ?>