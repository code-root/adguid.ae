<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>, made with ❤️ by <a href="/" target="_blank"
                class="footer-link fw-medium">Code Root</a>
        </div>
    </div>
</footer>
<!-- / Footer -->


<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

</div>


<script src="{{ asset('assets') }}/dashboard/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('assets') }}/dashboard/vendor/js/bootstrap.js"></script>
<script src="{{ asset('assets') }}/dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ asset('assets') }}/dashboard/vendor/libs/hammer/hammer.js"></script>
<script src="{{ asset('assets') }}/dashboard/vendor/libs/i18n/i18n.js"></script>
<script src="{{ asset('assets') }}/dashboard/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{ asset('assets') }}/dashboard/vendor/js/menu.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{ asset('assets') }}/dashboard/js/main.js"></script>
<script src="{{ asset('assets') }}/dashboard/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@yield('footer-script')

<script>
        new DataTable('#data-admin', {
            "paging": true,
        "page": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
        "autoWidth": true,
        "fixedHeader": true,
        "colReorder": true,
        keys: true,
        "pageLength": 100 ,
        dom: 'Bfrtip',
    });


    document.addEventListener('DOMContentLoaded', () => {
    const path = window.location.pathname;
    const listItems = document.querySelectorAll('li.menu-item');
    listItems.forEach(item => {
        const link = item.querySelector('a.menu-link');
        const subMenu = item.querySelector('ul.menu-sub');
        const parentLi = item.closest('li.menu-item');
        if (link) {
            const itemPath = new URL(link.getAttribute('href'), window.location.origin).pathname;
            if (subMenu) {
                const subItems = subMenu.querySelectorAll('li.menu-item');
                subItems.forEach(subItem => {
                    const subLink = subItem.querySelector('a.menu-link');
                    const subItemPath = new URL(subLink.getAttribute('href'), window.location.origin).pathname;
                    if (path === subItemPath) {
                        parentLi.classList.add('open');
                        subItem.classList.add('active');
                    }
                });
            }
            else if (path === itemPath) {
                parentLi.classList.add('active');
                parentLi.classList.add('open');
            }
            if (parentLi.classList.contains('menu-toggle')) {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    parentLi.classList.toggle('open');
                });
            }
        }
    });
});


    document.addEventListener('DOMContentLoaded', function () {
      var addNewRecordButton = document.querySelector('.send-model');
      var addNewRecordModal = new bootstrap.Offcanvas(document.getElementById('add-new-record'));

      addNewRecordButton.addEventListener('click', function () {
         addNewRecordModal.show();
      });
   });
   
</script>
</body>

</html>