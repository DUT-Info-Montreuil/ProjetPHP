
<form  id="formAgenda" action="index.php?module=ModMatchs&action=ConsulterMatchAmis" method="post">
    <h2 id="h2_Dates">Dates: <input name="dateMatchAmis" id="txtDate"></h2>
    <button type="submit" name="ConsulterMatchAmis" class="btn btn-primary">Consulter ce match</button>
</form>
<?php
$liste = $data["liste"];
if (!empty($liste)): ?>
    <script>
    $(function() {
        var enableDays = [];
        <?php foreach ( $liste as $elements) : ?>
        enableDays.push('<?= $elements['dateMatch']?>');
        <?php endforeach; ?>
        console.log(enableDays);
        function enableAllTheseDays(date) {
            var fDate = $.datepicker.formatDate('yy-mm-dd', date);
            var result = [false, ""];
            $.each(enableDays, function(k, d) {
                if (fDate === d) {
                    result = [true, "highlight-green"];
                }
            });
            return result;
        }
        $("#txtDate").datepicker({
            dateFormat: "yy-mm-dd",
            beforeShowDay: enableAllTheseDays,
        });
    });

</script>
<?php else: ?>
        <div class="alert alert-danger mt-5">Vos amis na participent a aucun matchs</div>
<?php endif;?>

