<script>
    $(window).on("load",function () {
        $('.load').fadeOut('slow');
    });
</script>
<style>
    .load{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("fonts/loader.gif") 50% 50% no-repeat white ;
        opacity: .9;
    }
</style>