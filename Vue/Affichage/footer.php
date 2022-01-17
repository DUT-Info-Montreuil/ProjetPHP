<footer>
    <p>© Copyright 2021 - BasicFoot</p>
</footer>

<script src="./Vue/Affichage/JavaScript/photos.js"></script>
<script src="./Vue/Affichage/JavaScript/script.js"></script>

<script>
    $(document).ready(function() {
        $("#notifications").on("click", function() {
            $.ajax({
                url: "index.php?module=ModMatchs&action=Notifications",
                success: function(res2) {
                    console.log(res2);
                    $('#result-search2').append(res2);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
            $.ajax({
                url: "index.php?module=ModMatchs&action=NombreNotifications",
                success: function(res3) {
                    console.log(res3);
                    $('#result-comptage').append(res3);
                }
            });
    });
</script>
<script>
    $(document).ready(function() {
        $("#notifications").on("click", function() {
            $.ajax({
                url: "index.php?module=ModMatchs&action=lireNotifications",
                success: function(res) {
                    console.log(res);
                }
            });
        });
    });
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
</body>
</html>