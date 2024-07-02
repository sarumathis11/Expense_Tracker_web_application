<?php 
include_once "../init.php";

// User login checker
if ($getFromU->loggedIn() === false) {
    header('Location: ../index.php');
}

if (isset($_POST['editrec'])) {
    $ID = $_POST['ID'];
    $expense = $getFromE->getExpenseById($ID);
}

if (isset($_POST['update'])) {
    $ID = $_POST['ID'];
    $Item = $_POST['Item'];
    $Cost = $_POST['Cost'];
    $Date = $_POST['Date'];
    $getFromE->updateExpense($ID, $Item, $Cost, $Date);

    echo "<script>
            Swal.fire({
                title: 'Done!',
                text: 'Record updated successfully',
                icon: 'success',
                confirmButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '6-Manage-Expenses.php';
                }
            });
          </script>";
}

include_once 'skeleton.php'; 
?>

<div class="wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="font-family:'Source Sans Pro'; font-size: 1.5em;">
                        Edit Expense
                    </h3>
                </div>
                <div class="card-content">
                    <form action="edit-expense.php" method="post">
                        <input type="hidden" name="ID" value="<?php echo $expense->ID; ?>">
                        <div class="form-group">
                            <label for="Item">Item:</label>
                            <input type="text" id="Item" name="Item" value="<?php echo $expense->Item; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Cost">Cost:</label>
                            <input type="number" id="Cost" name="Cost" value="<?php echo $expense->Cost; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="Date">Date:</label>
                            <input type="date" id="Date" name="Date" value="<?php echo $expense->Date; ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
