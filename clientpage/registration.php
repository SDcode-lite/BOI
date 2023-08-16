<?php
include('../security.php');
include ("include/clientheader.php");
// include ("include/navbar-top.php");
?>

<?php
include ("include/clientsidebar.php");
// include ("include/navbar-top.php");
?>

<div class="justify-content-center col-md-8 col-lg-7 mb-5">
    <h1 class="mt-5 ps-3">Welcome, Mr. 
        <?php
            if(isset($_SESSION['fname'])) {
                echo $_SESSION['fname']."!";
            }else {
                echo $_SESSION['username']."!";
            }
        ?>
    </h1>
    <ol class="breadcrumb mb-4 ps-3">
        <li class="breadcrumb-item active">Dashboard</li>
        <?php
            if(isset($_SESSION['message']) && $_SESSION['message'] !='')
            {
                echo '<div class="alert alert-warning ms-3" role="alert">'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
        ?>
    </ol>
</div>
<div class="row">
    <div class="container justify-content-center col-md-8 col-lg-7 col-xl-6 col-xxl-5 mb-5">
        <form action="../codeSnippet/clientreg.php" method="post" class="needs-validation" novalidate id="forms">
            <div class="card shadow justify-content-center" id="personal-info">
                <div class="card-header">
                    <h4>Personal Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>First Name: </label>
                        <input required type="text" name="fname" placeholder="Enter FirstName" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Middle Name: </label>
                        <input  type="text" name="mname" placeholder="Enter MiddleName" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Last Name: </label>
                        <input required type="text" name="lname" placeholder="Enter LastName" class="form-control" required>
                    </div>
                    
                    <center>
                    <div class="form-group mb-3">
                        <button class="btn btn-outline-primary">Next</button>
                    </div>
                    </center>
                </div>
            </div>

            <div class="card shadow" id="contact-info" style="display:none">
                <div class="card-header">
                    <h4>Contact Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Address: </label>
                        <input type="text" name="address" placeholder="Enter Address" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>Phone Number: </label>
                        <input type="number" name="phone" min="11" max="11" placeholder="Enter Phone Number" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>email: </label>
                        <input type="email" name="email" placeholder="Enter email" class="form-control" required>
                    </div>
                    
                    <center>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-outline-primary">Previous</button>
                        <button type="submit" class="btn btn-outline-primary">Next</button>
                    </div>
                    </center>
                </div>
            </div>

            <div class="card shadow" id="nok-info" style="display:none">
                <div class="card-header">
                    <h4>Next of Kin Information</h4>
                </div>
                <div class="card-body">
                <div class="form-group mb-3">
                        <label>Name: </label>
                        <input type="text" name="kinname" placeholder="Surname First" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Phone Number: </label>
                        <input type="tel" name="kinphone" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="Enter Phone Number" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Address: </label>
                        <input name="kinaddress" type="text" placeholder="NOK Address" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Relationship: </label>
                        <select name="kinrel" id="rel">
                            <option>----select----</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                            <option value="Husband">Husband</option>
                            <option value="Wife">Wife</option>
                            <option value="Friend">Friend</option>
                            <option value="Fiance">Fiance</option>
                            <option value="Relative">Relative</option>
                        </select>
                    </div>
                    
                    <center>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-outline-primary">Previous</button>
                        <button type="submit" class="btn btn-outline-primary">Next</button>
                    </div>
                    </center>
                </div>
            </div>

            <div class="card shadow" id="account-details" style="display:none">
                <div class="card-header">
                    <h4>Account Details</h4>
                </div>
                <div class="card-body">
                <div class="form-group mb-3">
                        <label>Account Name: </label>
                        <input type="text" name="accname" placeholder="Account Name" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>Account Number: </label>
                        <input type="number" name="accno"  max="10" placeholder="Account Number" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Bank Name: </label>
                        <input type="text" name="bankname" placeholder="Bank Name" class="form-control" required>
                    </div>
                    
                    <center>
                    <div class="form-group mb-3">
                        
                        <button type="submit" class="btn btn-outline-primary">Previous</button>
                        <button type="submit" id="submit-btn" name="submit" class="btn btn-outline-primary">Submit</button>
                    </div>

                    </center>
                </div>
            </div>
        </form>
        
    </div>
</div> 



<?php
include ("include/clientfooter.php");
?>

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
    event.preventDefault(); // prevent the page from refreshing
    personalInfoCard.style.display = 'none';
    contactInfoCard.style.display = 'block';
    });

    contactInfoBtns[0].addEventListener('click', () => {
    event.preventDefault(); // prevent the page from refreshing
    contactInfoCard.style.display = 'none';
    personalInfoCard.style.display = 'block';
    });

    contactInfoBtns[1].addEventListener('click', () => {
    event.preventDefault(); // prevent the page from refreshing
    contactInfoCard.style.display = 'none';
    NOKInfoCard.style.display = 'block';
    });

    NOKDetailsBtn[0].addEventListener('click', () => {
    event.preventDefault(); // prevent the page from refreshing
    NOKInfoCard.style.display = 'none';
        contactInfoCard.style.display = 'block';
    });

    NOKDetailsBtn[1].addEventListener('click', () => {
    event.preventDefault(); // prevent the page from refreshing
    NOKInfoCard.style.display = 'none';
    accountDetailsCard.style.display = 'block';
    });

    accountDetailsBtn[0].addEventListener('click', () => {
    event.preventDefault(); // prevent the page from refreshing
    NOKInfoCard.style.display = 'block';
    accountDetailsCard.style.display = 'none';
    });

    // accountDetailsBtn[1].addEventListener('click', () => {
    // event.preventDefault(); // prevent the page from refreshing
// collect form data
    // const firstName = document.querySelector('input[name="firstName"]').value;
    // const middleName = document.querySelector('input[name="middleName"]').value;
    // const lastName = document.querySelector('input[name="lastName"]').value;
    // const address = document.querySelector('input[name="address"]').value;
    // const phoneNumber = document.querySelector('input[name="phoneNumber"]').value;
    // const email = document.querySelector('input[name="email"]').value;
    // const accountName = document.querySelector('input[name="accountName"]').value;
    // const accountNumber = document.querySelector('input[name="accountNumber"]').value;
    // const bankName = document.querySelector('input[name="bankName"]').value;

    // create an object with the form data
    // const formData = {
    //     firstName,
    //     middleName,
    //     lastName,
    //     address,
    //     phoneNumber,
    //     email,
    //     accountName,
    //     accountNumber,
    //     bankName,
    // };

    // });

</script>
<?php
include ("include/script.php");
?>