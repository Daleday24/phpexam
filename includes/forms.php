<div class="form-container" id="form-add">
            <button class="close" id="close" onclick="closeAdd();"><i class="fas fa-times"></i></button>
            <form action="#" method="POST">

                <div class="input-container">
                    <h1>Add Person Info</h1>
                </div>
                <div class="input-container">
                    <label for="firstname">first name:</label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <div class="input-container">
                    <label for="lastname">last name:</label>
                    <input type="text" name="lastname" id="lastname" required>
                </div>
                <div class="input-container">
                    <label for="middlename">middle name:</label>
                    <input type="text" name="middlename" id="middlename" maxlength="1" required>
                </div>
                <div class="input-container">
                    <label for="birthday">Birthday:</label>
                    <input type="date" name="birthday" id="birthday" required>
                </div>
                <div class="input-container">
                    <label for="gender">gender:</label>
                    <select name="gender" id="gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                </div>
                <div class="input-container">
                    <input type="submit" name="submit-add" id="submit-add">
                </div>
            </form>
        </div>
    
        <div class="form-container" id="form-edit">
            <button class="close" id="close" onclick="closeEdit();"><i class="fas fa-times"></i></button>
            <form action="#" method="POST">
                <div class="input-container">
                    <h1>Edit Person Info</h1>
                </div>
                <div class="input-container">
                    <label for="firstname">first name:</label>
                    <input type="text" name="firstname" id="firstname" value="<?php echo $edit_firstname; ?>" required>
                </div>
                <div class="input-container">
                    <label for="lastname">last name:</label>
                    <input type="text" name="lastname" id="lastname" value="<?php echo $edit_lastname; ?>" required>
                </div>
                <div class="input-container">
                    <label for="middlename">middle name:</label>
                    <input type="text" name="middlename" id="middlename" maxlength="1" value="<?php echo $edit_middlename; ?>" required>
                </div>
                <div class="input-container">
                    <label for="birthday">Birthday:</label>
                    <input type="date" name="birthday" id="birthday" value="<?php echo $edit_birthday; ?>" required>
                </div>
                <div class="input-container">
                    <label for="gender">gender:</label>
                    <select name="gender" id="gender">
                        <option value="1" <?php echo $op1; ?>>Male</option>
                        <option value="2" <?php echo $op2; ?>>Female</option>
                        <option value="3" <?php echo $op3; ?>>Other</option>
                    </select>
                </div>
                <div class="input-container">
                    <input type="submit" name="submit-edit" id="submit-edit">
                </div>
            </form>
        </div>