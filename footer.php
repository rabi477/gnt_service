<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    var btnContainer = document.getElementById("nav");

    var btns = btnContainer.getElementsByClassName("nav-link");

    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");

        if (current.length > 0) {
        current[0].className = current[0].className.replace(" active", "");
        }

        this.className += " active";
    });
    }
</script>

</body>

</html>