<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<form  id="formAgenda" action="index.php?module=ModMatchs&action=ConsulterMatchAmis" method="post">
    <h>Dates: <input name="dateMatchAmis" id="txtDate"></h>
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
<?php endif; ?>
