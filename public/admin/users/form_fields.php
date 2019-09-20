<div class="container">
    <table class="table mt-4">
        <tr>
            <td>First Name</td>
            <td><input type="text" name="user[first_name]" value="<?php echo $user->first_name ?? '';?>"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="user[last_name]"></td>
        </tr>

        <tr>
            <td>Gender:</td>
            <td><select name="user[gender]">
                <option value="" selected disabled>Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Otherk">Other</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Course :</td>
            <td>
                <select name="user[course]">
                <option value="select" disabled selected>Select</option>
                <option value="B.Tech Civil Engineering">B.Tech Civil Engineering</option>
                <option value="B.Tech Computer Science & Engineering">B.Tech Computer Science & Engineering</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Year</td>
            <td>
                <select name="user[year]">
                    <option value="" selected disabled>Select</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year ">Fourth Year</option>
                </select>
            </td>
        </tr>

        <tr>
            <td> Account Type</td>
            <td>
                <select name="user[level]">
                    <option value="" selected disabled>Select</option>
                    <option value="1">Admin</option>
                    <option value="2">Teacher</option>
                    <option value="3">Student</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Phone</td>
            <td>
                <input type="text" name="user[phone]" placeholder="Phone Number">
            </td>
        </tr>

        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="user[email]" placeholder="Email">
            </td>
        </tr>

        <tr>
            <td>username</td>
            <td>
                <input type="text" name="user[username]" placeholder="Username">
            </td>
        </tr>

        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="user[password]" placeholder="Password"><br><br>
            </td>
        </tr>

        <tr>
            <td>Confirm Password</td>
            <td>
                <input type="password" name="user[confirm_password]" placeholder="Retype Password">
            </td>
        </tr>
        <tr>
            <td></td>
        <td><input type="submit" class="btn btn-primary" value="Submit"></td>
        </tr>
    </table>

</div>
