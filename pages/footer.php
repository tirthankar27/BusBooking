<footer>
    <div class="flex flex-col w-full h-fit bg-green-200 text-green-700 px-6 md:px-14 py-10 mt-5">
        <div class="flex flex-col md:flex-row m-1">
            <span class="text-lg">
                <?php
                    date_default_timezone_set('Asia/Kolkata');
                    $d=date("h:i A");
                    echo $d;
                ?>
            </span>
        </div>
    </div>
</footer>