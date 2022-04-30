<?php
// $attributes is not empty anymore
echo "in header.php   ";
var_dump($attributes);
?>

<header class="page-header <?php if ($attributes['isFixed']) {
    echo 'fixed';
}
?>">

    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <div class="logo">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/logo.png' ?>" alt="">
                </div>
            </div>
            <div class="col-md-6 align-items-end">
                <nav class="main-nav">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li>
                            <button class="btn btn-primary">Call Us</button>
                        </li>
                        <li>
                            <i class="bi bi-search"></i>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>