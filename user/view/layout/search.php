<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form" action="search.php" method="GET" enctype="multipart/form-data">
            <input type="text" name="search" placeholder="Searching key....." value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
            <input type="submit" name="submitTim" value="search">
        </form>
    </div>
</div>