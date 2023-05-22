<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_bottm">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="fotb_left">
                                <li>
                                    <p> Copyrights <script>
                                            document.write(new Date().getFullYear())
                                        </script>

                                        © {{ config('app.name', 'Laravel') }} | Website by <a target="_blank" title="Click to visit" href="https://yogeemedia.com/">yogeemedia.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        // Initialize DataTables
        var table = $("#dataTable").DataTable();

        // Customize the search input
        $(".dataTables_filter input").attr(
            "placeholder",
            "Search"
        );
    });
</script>

<!-- jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Data table CDN -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>