<section class="container d-flex justify-content-end">
    <a href="./../../../mvc/index.php/admin/dashboard/categories/add" class="my-3"><button type="button" class="btn btn-success"><span class="mr-3">Add a new Category</span><i class="fas fa-plus-circle"></i></button></a>
</section>
<section class="container">
    <table id="<?php echo $_SESSION['table-used']; ?>" class="display" style="width:100%">
    </table>
    <script type="text/javascript">
        let tableUsed = document.getElementById('<?php echo $_SESSION['table-used']?>').getAttribute('id');
        sessionStorage.setItem('table-used', tableUsed);
    </script>
    <script type="text/javascript" src="../../view/back-scripts/generate-table.js">
</section>
