 <!-- Modal -->
<div class="modal fade" id="logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Log Out</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Are you sure you want to log out?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
          <form action="logout.php" method="post">
            <button class="btn btn-primary" type="submit" name="logout_btn">Logout</button>
          </form>
      </div>
      </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="fWith" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">You are withdrawing all investment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
            <div class="card shadow" id="personal-info">
                
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Total available amount is: </label>
                    </div>
                    <div class="mb-3">
                        <span class="display-6"><span style="text-decoration-line: line-through; text-decoration-style: double;">N</span>100,000</span>
                    </div>
                    
                    <center>
                    <div class="form-group mb-3">
                        <button type="submit" name="send" class="btn btn-outline-primary">Withdraw</button>
                    </div>
                    </center>
                </div>
            </div>
        </div>
        
      </form>
    </div>
  </div>
</div>


