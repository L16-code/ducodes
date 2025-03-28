<div id="loader" class="loader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function() {
        setTimeout(function() {
            document.getElementById('loader').style.display = 'none';
        }, 2000); // Delay of 500ms for smoother transition
    });
</script>
