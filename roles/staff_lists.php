<?php 

$css_page = "staff_list";
include("./header.php");

?>

    <link rel="stylesheet" href="../css/staff_list.css">


            <section class="main-section">
                <div class="title">
                    <span>
                        Staff Lists
                    </span>
                    <span class="btns">
                        <a href="#" class = "add-modal">
                            Add Staff
                        </a>
                    </span>
                </div>


                <div class="table-details">

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Contact No.</td>
                                <td>Role</td>
                                <td>Shift</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>ABC</td>
                                <td>9879879877</td>
                                <td>Cook</td>
                                <td>First Shift</td>
                                <td class = "actions">
                                    <div>
                                        <div>Remove</div>
                                        <div class = "add-modal">Edit</div>
                                    </div>
                                </td>
                            </tr>

                            
                            <tr>
                                <td>DEF</td>
                                <td>6546546544</td>
                                <td>Cook</td>
                                <td>Second Shift</td>
                                <td class = "actions">
                                    <div>
                                        <div>Remove</div>
                                        <div class = "add-modal">Edit</div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>GHI</td>
                                <td>3213213211</td>
                                <td>Dilivery Boy</td>
                                <td>First Shift</td>
                                <td class = "actions">
                                    <div>
                                        <div>Remove</div>
                                        <div class = "add-modal">Edit</div>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </section>

        </section>
        

        <section id="modal">
            <div class="modal-box">
                <div class="close-btn">
                    X
                </div>

                <div class="add-form">

                    <div class="title">
                        Add Food Item
                    </div>

                    <form action="">
                        
                        <div>
                            <label for="fname">First Name</label>
                            <input type="text" id = "fname">
                        </div>
                        
                        <div>
                            <label for="lname">Last Name</label>
                            <input type="text" id = "lname">
                        </div>

                        <div>
                            <label for="c_no">Contact No</label>
                            <input type="text" id = "c_no">
                        </div>
                    
                        <div>
                            <label for="role">Role</label>
                            <select name="role" id="role">
                                <option value="one">one</option>
                                <option value="one">one</option>
                                <option value="one">one</option>
                                <option value="one">one</option>
                            </select>
                        </div>

                        <div>
                            <label for="shift">Shift</label>
                            <input type="text" id = "shift">
                        </div>
                    
                        <div class="btns">
                            <input type="reset" value="Reset">
                            <input type="submit" name = "submitPersonalInfo" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <script>
        $(document).ready(function() {
            $("#modal").hide();

            $(".add-modal").on("click", function() {
                $("#modal").show();
            });


            $(".close-btn").on("click", function() {
                $("#modal").hide();
            });
        });
    </script>
    

</body>
</html>