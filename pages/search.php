<main class="flex flex-col min-h-screen bg-white my-14 h-full">
    <?php if(!isset($_SESSION['id'])): ?>
        <form action="login.php" class="bg-center h-80 w-auto bg-green-200 rounded border-1" style="background-image: url(./images/bg1.jpg);">
            <h1 class="flex flex-grow justify-center text-white text-7xl font-bold">Travel with ease</h1>
            <submit class="flex flex-col md:flex-row items-center justify-center ps-4 mt-8">
                <div class="my-auto">
                    <input type="text" name="source" size="50" maxlength="50" placeholder="From" class="border-x border-e-slate-200 rounded-l-lg h-16">
                </div>
                <div class="my-auto">
                    <input type="text" name="dest" size="50" maxlength="50" placeholder="To" class="border-e border-e-slate-200 h-16">
                </div>
                <div class="my-auto">
                    <input type="date" name="date" placeholder="DD-MM-YYYY" class="h-16">
                </div>
                <div>
                    <button type="submit" class="bg-green-500 h-16 w-16 rounded-r-lg">Search</button>
                </div>
            </submit>
        </form>
        <?php else: ?>
        <form action="login.php" class="bg-center h-80 w-auto bg-green-200 rounded border-1" style="background-image: url(./images/bg1.jpg);">
            <h1 class="flex justify-center text-white text-7xl font-bold">Travel with ease</h1>
            <submit class="flex flex-col md:flex-row items-center justify-center ps-4 mt-8">
                <div class="my-auto">
                    <input type="text" name="source" size="50" maxlength="50" placeholder="From" class="border-x border-e-slate-200 rounded-l-lg h-16">
                </div>
                <div class="my-auto">
                    <input type="text" name="dest" size="50" maxlength="50" placeholder="To" class="border-e border-e-slate-200 h-16">
                </div>
                <div class="my-auto">
                    <input type="date" name="date" placeholder="DD-MM-YYYY" class="h-16">
                </div>
                <div>
                    <button type="submit" class="bg-green-500 h-16 w-16 rounded-r-lg">Search</button>
                </div>
            </submit>
        </form>
        <?php endif; ?>
</main>