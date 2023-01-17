<section class="container">
    <table id="<?php echo $_SESSION['table-used'];?>" class="display" style="width:100%">
    </table>
    <script type="text/javascript">
        let tableUsed = document.getElementById('<?php echo $_SESSION['table-used']?>').getAttribute('id');
        sessionStorage.setItem('table-used', tableUsed);
    </script>
    <script type="text/javascript" src="../../view/back-scripts/generate-table.js" >
    </script>
</section>