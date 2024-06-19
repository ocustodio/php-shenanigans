<?php require base_path("views/partials/head.php");?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php");?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form method="POST" action="/note">
                <input type="hidden" name="__method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">

                <div class="space-y-12">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium
                        leading-6 text-gray-900">Edit your note</label>
                        <div class="mt-2">
                            <textarea
                                required
                                id="body"
                                name="body"
                                rows="3"
                                class="block w-full rounded-md border-0 py-1.5text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            ><?= $note['body'] ?></textarea>
                        </div>

                        <?php if (isset($errors['body'])) :  ?>
                            <p><?= $errors['body'] ?></p>
                        <?php endif ?>
                    </div>

                    <div class="col-span-full flex gap-x-4 justify-end">

                        <div class="mt-2 flex items-center gap-x-3">
                            <a href="/notes" class="text-grey-500 border
                            border-current px-4 py-2">Cancel</a>
                        </div>

                        <div class="mt-2 flex items-center gap-x-3">
                            <button type="submit" class="text-grey-500 border
                            border-current px-4 py-2">Update</button>
                        </div>
                    </div>
            </form>

        </div>
    </main>

<?php require base_path("views/partials/foot.php"); ?>