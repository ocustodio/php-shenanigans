<?php require "partials/head.php";?>
<?php require "partials/nav.php"; ?>
<?php require "partials/banner.php";?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST">
        <div class="space-y-12">
            <div class="col-span-full">
                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Create a note</label>
                <div class="mt-2">
                    <textarea 
                        required 
                        id="body" 
                        name="body" 
                        rows="3" 
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    ><?= $postBody ?? '' ?></textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">Write some note for yourself!.</p>

                <?php if (isset($errors['body'])) :  ?>
                    <p><?= $errors['body'] ?></p>
                <?php endif ?>
            </div>

            <div class="col-span-full">
                <div class="mt-2 flex items-center gap-x-3">
                    <button type="submit" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Create</button>
                </div>
            </div>
        </form>

    </div>
</main>

<?php require "partials/foot.php"; ?>
