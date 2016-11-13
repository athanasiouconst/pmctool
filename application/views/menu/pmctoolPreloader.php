<script>

    $(window).on('load', function () { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#loader').delay(450).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(450).css({'overflow': 'visible'});
    })</script>
<style>


        #loader {
        border: 16px solid #3f3f3f; /*  */
        border-top: 16px solid #ff2a40; /*  */
        border-radius: 50%;
        width: 100px;
        height: 100px;
        animation: spin 2s linear infinite;
        position: absolute;
        left: 50%;
        /* centers the loading animation horizontally one the screen */
        top: 50%;
        /* centers the loading animation vertically one the screen */
        background-image: url("../img/preloader.png");
        /* path to your loading animation */
        background-repeat: no-repeat;
        background-position: center;
        margin: -100px 0 0 -100px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<!-- Preloader -->
<div id="loader">
    <div id="status">&nbsp;</div>
</div>