
<section class="container">
    <table id="<?php echo $_SESSION['table-used'];?>" class="display" style="width:100%">
        <thead>
        <tr>
            <th>User_id</th>
            <th>Email</th>
            <th>Password</th>
            <th>Rol</th>
            <th>Tokens</th>
            <th>Telephone</th>
            <th>Delete</th>
        </tr>
        </thead>
    </table>
    <script type="text/javascript">
        let tableUsed = document.getElementById('<?php echo $_SESSION['table-used']?>').getAttribute('id');
        sessionStorage.setItem('table-used', tableUsed);
        </script>
    <script type="text/javascript" src="../../view/back-scripts/call-users.js">
 </section>
