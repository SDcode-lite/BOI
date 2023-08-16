
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var timeout;

    $(document).on('mousemove keydown scroll', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function(){
            // Send an AJAX request to the server to reset the timeout
            $.ajax({
                url: 'reset_timeout.php',
                method: 'POST'
            });
        }, 5000); // Timeout after 5 seconds of inactivity
    });
</script>
    
    <script>
        function myFunction() {
        var input, filter, tables, tr, td, i, j, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        tables = document.getElementsByClassName("myTable");
        for (i = 0; i < tables.length; i++) {
            tr = tables[i].getElementsByTagName("tr");
            for (j = 0; j < tr.length; j++) {
            td = tr[j].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[j].style.display = "";
                } else {
                tr[j].style.display = "none";
                }
            }       
            }
        }
        }
    </script>
<script>
        // get references to the buttons and card elements
    const personalInfoBtn = document.querySelector('#personal-info button');
    const contactInfoBtns = document.querySelectorAll('#contact-info button');
    const NOKDetailsBtn = document.querySelectorAll('#nok-info button');
    const accountDetailsBtn = document.querySelectorAll('#account-details button');
    const personalInfoCard = document.querySelector('#personal-info');
    const contactInfoCard = document.querySelector('#contact-info');
    const NOKInfoCard = document.querySelector('#nok-info');
    const accountDetailsCard = document.querySelector('#account-details');

    // add event listeners to the buttons to toggle the visibility of the card elements
    personalInfoBtn.addEventListener('click', () => {
    personalInfoCard.style.display = 'none';
    contactInfoCard.style.display = 'block';
    });

    contactInfoBtns[0].addEventListener('click', () => {
    contactInfoCard.style.display = 'none';
    personalInfoCard.style.display = 'block';
    });

    contactInfoBtns[1].addEventListener('click', () => {
    contactInfoCard.style.display = 'none';
    NOKInfoCard.style.display = 'block';
    });

    NOKDetailsBtn[0].addEventListener('click', () => {
        NOKInfoCard.style.display = 'none';
        contactInfoCard.style.display = 'block';
    });

    NOKDetailsBtn[1].addEventListener('click', () => {
        NOKInfoCard.style.display = 'none';
    accountDetailsCard.style.display = 'block';
    });

    accountDetailsBtn[0].addEventListener('click', () => {
        NOKInfoCard.style.display = 'block';
    accountDetailsCard.style.display = 'none';
    });

    accountDetailsBtn[1].addEventListener('click', () => {
    // collect form data
    const firstName = document.querySelector('input[name="firstName"]').value;
    const middleName = document.querySelector('input[name="middleName"]').value;
    const lastName = document.querySelector('input[name="lastName"]').value;
    const address = document.querySelector('input[name="address"]').value;
    const phoneNumber = document.querySelector('input[name="phoneNumber"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const accountName = document.querySelector('input[name="accountName"]').value;
    const accountNumber = document.querySelector('input[name="accountNumber"]').value;
    const bankName = document.querySelector('input[name="bankName"]').value;

    // create an object with the form data
    const formData = {
        firstName,
        middleName,
        lastName,
        address,
        phoneNumber,
        email,
        accountName,
        accountNumber,
        bankName,
    };

    });

</script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var username = button.data('username');
        var modal = $(this);
        modal.find('#deleteUsername').val(username);
    })
</script>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/chart-area-demo.js"></script>
<script src="../assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
