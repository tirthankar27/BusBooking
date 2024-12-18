<main class="flex flex-col min-h-screen bg-white my-24 h-full">
    <form method="GET" action="pages/busBook.php" class="bg-center h-80 w-auto bg-green-200 rounded border-1" style="background-image: url(./images/bg1.jpg);">
        <h1 class="flex flex-grow justify-center text-white text-7xl font-bold">Travel with ease</h1>
        <submit class="flex flex-col md:flex-row items-center justify-center ps-1 mt-8">
            <div class="my-auto">
                <input type="text" name="source" size="50" maxlength="50" placeholder="From" required class="border-x border-e-slate-200 rounded-l-lg h-16">
            </div>
            <div class="my-auto">
                <input type="text" name="dest" size="50" maxlength="50" placeholder="To" required class="border-e border-e-slate-200 h-16">
            </div>
            <div class="my-auto">
                <input type="date" name="date" placeholder="DD-MM-YYYY" required class="h-16">
            </div>
            <div>
                <button type="submit" class="bg-green-500 h-16 w-16 rounded-r-lg">Search</button>
            </div>
        </submit>
    </form>
    <contents class="flex flex-row h-auto mt-16">
        <div class="flex justify-center items-end bg-cover b h-64 w-1/5 ms-12 rounded-lg shadow-md" style="background-image: url(./images/images4.png);">
            <h4 class="text-green-600 font-bold">Get 15% off on first booking*</h4>
        </div>
        <div class="flex justify-center items-end bg-cover h-64 w-1/5 ms-12 rounded shadow-md" style="background-image: url(./images/images2.png);">
        <h4 class="text-green-600 font-bold">Amazing cashbacks on card/UPI*</h4>
        </div>
        <div class="flex justify-center items-end bg-cover  h-64 w-1/5 ms-12 rounded shadow-md" style="background-image: url(./images/images3.png);">
        <h4 class="text-green-600 font-bold">Refer and earn*</h4>
        </div>
        <div class="flex justify-center items-end bg-cover bg h-64 w-1/5 ms-12 rounded shadow-md" style="background-image: url(./images/images1.png);">
        <h4 class="text-green-600 font-bold">Help us to go green</h4>
        </div>
    </contents>
</main>