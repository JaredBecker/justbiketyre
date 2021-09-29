<?php
if (!$hide_footer) {
?>
    <footer <?php echo $sticky ? 'class="fixed-bottom"' : ""?>>
        Copyright © 2021 Just Bike Tyre. All Rights Reserved. All prices ZAR.
    </footer>
<?php
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#stock_table').DataTable({
            "iDisplayLength": 25,
            "aLengthMenu": [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ]
        });
        $('#stock-table').removeClass('dataTable');
    })
</script>
</body>

</html>

<?php
$db->UnsetErrors();
?>