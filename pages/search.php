<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['dest'] = $_POST['dest'];
    $_SESSION['date'] = $_POST['date'];
    header('Location:pages/busBook.php');
}
?>
<main class="flex flex-col min-h-screen my-24 h-full px-4">
    <form method="POST" action="" class="bg-center w-full bg-green-200 rounded-lg border-1 h-80 sm:h-80 flex flex-col justify-center items-center" style="background-image: url(images/bg1.jpg);">
        <h1 class="text-white text-4xl sm:text-5xl md:text-7xl font-bold py-8 text-center">Travel with ease</h1>
        <div class="flex flex-col sm:flex-row justify-center items-center w-full mt-8 space-x-0 sm:space-x-0">
            <div class="flex w-full sm:w-1/4 justify-center px-0">
                <input type="text" name="source" id="source" size="50" maxlength="50" placeholder="From" required class="border-x border-slate-200 rounded-l-lg h-16 w-full">
            </div>
            <div class="flex w-full sm:w-1/4 justify-center px-0">
                <input type="text" name="dest" id="dest" size="50" maxlength="50" placeholder="To" required class="border-x border-slate-200 h-16 w-full">
            </div>
            <div class="flex w-full sm:w-1/4 justify-center px-0">
                <input type="date" name="date" id="date" placeholder="DD-MM-YYYY" required class="h-16 w-full">
            </div>
            <div class="flex w-full sm:w-auto justify-center px-0">
                <button type="submit" class="bg-green-600 h-16 w-full sm:w-32 rounded-r-lg text-white hover:bg-green-800 duration-300">Search</button>
            </div>
        </div>
    </form>
    <div class="flex flex-wrap justify-center items-center mt-16 space-y-4 sm:space-y-0 sm:space-x-4">
    <div class="flex flex-col justify-end bg-cover h-64 w-full sm:w-1/5 rounded-lg shadow-md hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background-image: url(images/images4.png);">
        <h4 class="text-green-600 font-bold p-2 text-center whitespace-nowrap">Get 15% off on first booking*</h4>
    </div>
    <div class="flex flex-col justify-end bg-cover h-64 w-full sm:w-1/5 rounded-lg shadow-md hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background-image: url(images/images2.png);">
        <h4 class="text-green-600 font-bold p-2 text-center whitespace-nowrap">Amazing cashbacks on card/UPI*</h4>
    </div>
    <div class="flex flex-col justify-end bg-cover h-64 w-full sm:w-1/5 rounded-lg shadow-md hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background-image: url(images/images3.png);">
        <h4 class="text-green-600 font-bold p-2 text-center whitespace-nowrap">Refer and earn*</h4>
    </div>
    <div class="flex flex-col justify-end bg-cover h-64 w-full sm:w-1/5 rounded-lg shadow-md hover:scale-105 hover:shadow-xl transition-all duration-300 ease-in-out" style="background-image: url(images/images1.png);">
        <h4 class="text-green-600 font-bold p-2 text-center whitespace-nowrap">Help us to go green</h4>
    </div>
</div>

</main>